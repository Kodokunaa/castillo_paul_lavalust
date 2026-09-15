<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
require_once APP_DIR . 'libraries/Lab5Session.php';

class Lab5Middleware
{
    public function handle(Closure $next)
    {
        if (!Lab5Session::authenticated()) {
            header('Location: ' . site_url('login'), true, 302);
            exit;
        }
        return $next();
    }
}
