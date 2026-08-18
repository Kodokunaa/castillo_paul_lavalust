<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    /**
     * Protect the profile with a small lab-only access challenge.
     * Supplying ?access=castillo grants access for the current session.
     */
    public function handle(Closure $next)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            $session_path = ROOT_DIR . 'runtime' . DIRECTORY_SEPARATOR . 'session';

            if (!is_dir($session_path)) {
                mkdir($session_path, 0755, TRUE);
            }

            session_save_path($session_path);
            session_start();
        }

        $access_code = isset($_GET['access']) ? strtolower(trim($_GET['access'])) : '';

        // Force a denied request for the laboratory middleware demonstration.
        if (isset($_GET['test']) && $_GET['test'] === 'denied') {
            unset($_SESSION['student_access']);
        }

        if (hash_equals('castillo', $access_code)) {
            $_SESSION['student_access'] = TRUE;
        }

        if (!empty($_SESSION['student_access'])) {
            return $next();
        }

        header('Location: ' . site_url('student') . '?access_denied=1', TRUE, 302);
        exit;
    }
}
