<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Models\Product;

class AuthController extends BaseController {

    public function showRegisterForm() {
        return view('register');
    }

    public function showLoginForm() {
        return view('login');
    }

    public function register() {

    }

    public function login() {

    }

}