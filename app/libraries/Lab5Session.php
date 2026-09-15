<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Lab5Session
{
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return;
        }

        $path = ROOT_DIR . 'runtime' . DIRECTORY_SEPARATOR . 'session';
        if (!is_dir($path) && !mkdir($path, 0700, true) && !is_dir($path)) {
            throw new RuntimeException('Session storage is unavailable.');
        }
        session_save_path($path);

        $secure = str_starts_with((string) getenv('APP_URL'), 'https://')
            || (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'secure' => $secure,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
        session_start();
    }

    public static function token(): string
    {
        self::start();
        if (empty($_SESSION['lab5_csrf'])) {
            $_SESSION['lab5_csrf'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['lab5_csrf'];
    }

    public static function check_token(): void
    {
        self::start();
        $submitted = $_POST['csrf_token'] ?? '';
        if (!is_string($submitted) || !hash_equals(self::token(), $submitted)) {
            http_response_code(403);
            exit('Invalid form token. Reload the page and try again.');
        }
    }

    public static function authenticated(): bool
    {
        self::start();
        return !empty($_SESSION['lab5_authenticated']);
    }
}
