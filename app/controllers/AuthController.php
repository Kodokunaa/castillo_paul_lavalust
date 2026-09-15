<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
require_once APP_DIR . 'libraries/Lab5Session.php';

class AuthController extends Controller
{
    public function index()
    {
        header('Location: ' . site_url(Lab5Session::authenticated() ? 'products' : 'login'), true, 302);
        exit;
    }

    public function login()
    {
        if (Lab5Session::authenticated()) {
            header('Location: ' . site_url('products'), true, 302);
            exit;
        }
        $this->call->view('lab5/login', [
            'csrf_token' => Lab5Session::token(),
            'error' => null,
        ]);
    }

    public function authenticate()
    {
        Lab5Session::check_token();
        $username = trim((string) ($_POST['username'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');
        $expected = (string) getenv('LAB5_USERNAME');
        $hash = (string) getenv('LAB5_PASSWORD_HASH');

        if ($expected !== '' && $hash !== '' && hash_equals($expected, $username)
            && password_verify($password, $hash)) {
            session_regenerate_id(true);
            $_SESSION['lab5_authenticated'] = true;
            $_SESSION['lab5_username'] = $expected;
            $_SESSION['lab5_csrf'] = bin2hex(random_bytes(32));
            header('Location: ' . site_url('products'), true, 303);
            exit;
        }

        $this->call->view('lab5/login', [
            'csrf_token' => Lab5Session::token(),
            'error' => 'Invalid username or password.',
        ]);
    }

    public function logout()
    {
        Lab5Session::check_token();
        unset($_SESSION['lab5_authenticated'], $_SESSION['lab5_username'], $_SESSION['lab5_csrf']);
        session_regenerate_id(true);
        header('Location: ' . site_url('login'), true, 303);
        exit;
    }
}
