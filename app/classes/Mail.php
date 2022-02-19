<?php

namespace App\Classes;
use PHPMailer\PHPMailer\PHPMailer as PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail {
    protected $mail;

    public function __construct() {
        $this->mail = new PHPMailer;
        $this->setUp();

    }

    public function setUp() {
        $this->mail->isSMTP();
        $this->mail->Mailer = 'smtp';
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';
        
        $this->mail->Host = $_ENV['SMTP_HOST'];
        $this->mail->Port = $_ENV['SMTP_PORT'];

        $environment = $_ENV['APP_ENV'];
        if ($environment === 'local') { 
            $this->mail->SMTPDebug = ""; 
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
        }

        // auth info
        $this->mail->Username = $_ENV['EMAIL_USERNAME'];
        $this->mail->Password = $_ENV['EMAIL_PASSWORD'];

        $this->mail->isHTML(true);
        //$this->mail->SingleTo = true;

        // sender info
        $this->mail->From = $_ENV['ADMIN_EMAIL'];
        $this->mail->FromName = $_ENV['APP_NAME'];
    }

    public function send($data) {
        
        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = $data['subject'];
        $this->mail->Body = make($data['view'], array('data' => $data['body']));
        
        return $this->mail->send();
    }
}