<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Lab 5 Login</title>
    <?php include APP_DIR . 'views/lab5/_styles.php'; ?>
</head>
<body class="auth-page">
    <main class="auth-card">
        <span class="page-label">Laboratory Exercise No. 5</span>
        <p class="kicker">Product CRUD / Authentication</p>
        <h1>Login</h1>
        <p class="lead">Sign in to manage the product records stored in Aiven MySQL.</p>

        <?php if ($error): ?>
            <p class="alert" role="alert"><?= html_escape($error); ?></p>
        <?php endif; ?>

        <form class="form-grid" method="post" action="<?= html_escape(site_url('login')); ?>">
            <input type="hidden" name="csrf_token" value="<?= html_escape($csrf_token); ?>">

            <div>
                <label for="username">Username</label>
                <input id="username" name="username" required autocomplete="username">
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>

            <button class="primary" type="submit">Sign in</button>
        </form>
    </main>
</body>
</html>
