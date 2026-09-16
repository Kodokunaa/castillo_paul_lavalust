<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Delete Product</title>
    <?php include APP_DIR . 'views/lab5/_styles.php'; ?>
</head>
<body>
    <div class="shell">
        <header class="topbar">
            <a class="brand" href="<?= html_escape(site_url('products')); ?>">
                <span class="brand-mark">PC</span>
                <span>Castillo / Product Management</span>
            </a>
        </header>

        <main>
            <section class="panel">
                <span class="page-label">Delete Product</span>
                <p class="kicker">Laboratory Exercise No. 5</p>
                <h1>Delete?</h1>
                <p class="lead">This will permanently remove <strong><?= html_escape($product['product_name']); ?></strong> from the product table.</p>

                <form method="post" action="<?= html_escape(site_url('products/delete/' . $product['id'])); ?>">
                    <input type="hidden" name="csrf_token" value="<?= html_escape($csrf_token); ?>">
                    <div class="actions">
                        <button class="danger" type="submit">Delete product</button>
                        <a class="button" href="<?= html_escape(site_url('products')); ?>">Cancel</a>
                    </div>
                </form>
            </section>
        </main>

        <footer>
            <span>Laboratory Exercise No. 5</span>
            <span>&copy; <?= date('Y'); ?> Paul Castillo</span>
        </footer>
    </div>
</body>
</html>
