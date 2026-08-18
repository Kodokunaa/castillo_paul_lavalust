<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= html_escape($page_title); ?></title>
    <?php require __DIR__ . '/_styles.php'; ?>
</head>
<body class="home-page">
<div class="shell">
    <?php $active_page = 'home'; require __DIR__ . '/_nav.php'; ?>

    <?php if ($access_denied): ?>
        <div class="notice" role="alert">Access denied. Paul Castillo's student profile requires verified student access.</div>
    <?php endif; ?>

    <main>
        <section class="hero">
            <div>
                <div class="page-label">Student Home</div>
                <div class="kicker">Student Information / Laboratory Activity No. 3</div>
                <h1>Student Home</h1>
                <div class="actions">
                    <a class="button primary" href="<?= html_escape(site_url('student/profile')); ?>?access=castillo">Verify access and view profile</a>
                    <a class="button" href="<?= html_escape(site_url('student/profile')); ?>?test=denied">Test protected route</a>
                </div>
            </div>
        </section>

    </main>

    <footer><span>Laboratory Activity No. 3</span><span>&copy; <?= date('Y'); ?> Paul Castillo</span></footer>
</div>
</body>
</html>
