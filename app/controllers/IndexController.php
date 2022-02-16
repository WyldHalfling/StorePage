<?php

namespace App\Controllers;
use App\Classes\Mail;

class IndexController extends BaseController {
    
    public function show() {
        echo "Inside Homepage from controller class";

        $mail = new Mail();
        $data = [
            'to' => 'philkonsor@hotmail.com',
            'subject' => 'Welcome to PK Store',
            'view' => 'welcome',
            'name' => 'John Doe',
            'body' => 'Testing email template'
        ];

        if ($mail->send($data)) {
            echo "Email sent successfully.";
        } else {
            echo "Email failed to send";
        }
    }
}