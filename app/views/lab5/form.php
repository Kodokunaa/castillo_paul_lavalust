<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
$editing = $mode === 'edit';
$action = $editing ? 'products/edit/' . $product['id'] : 'products/create';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $editing ? 'Edit' : 'Add'; ?> Product</title>
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
                <span class="page-label"><?= $editing ? 'Edit Product' : 'Add Product'; ?></span>
                <p class="kicker">Laboratory Exercise No. 5</p>
                <h1><?= $editing ? 'Edit' : 'Add'; ?> Product</h1>

                <?php if ($errors): ?>
                    <ul class="alert">
                        <?php foreach ($errors as $error): ?>
                            <li><?= html_escape($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <form class="form-grid" method="post" action="<?= html_escape(site_url($action)); ?>">
                    <input type="hidden" name="csrf_token" value="<?= html_escape($csrf_token); ?>">

                    <div>
                        <label for="product_name">Product name</label>
                        <input id="product_name" name="product_name" maxlength="100" required value="<?= html_escape($product['product_name'] ?? ''); ?>">
                    </div>

                    <div>
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required><?= html_escape($product['description'] ?? ''); ?></textarea>
                    </div>

                    <div>
                        <label for="price">Price</label>
                        <input id="price" name="price" inputmode="decimal" required value="<?= html_escape($product['price'] ?? ''); ?>">
                    </div>

                    <div>
                        <label for="quantity">Quantity</label>
                        <input id="quantity" name="quantity" inputmode="numeric" required value="<?= html_escape($product['quantity'] ?? ''); ?>">
                    </div>

                    <div class="actions">
                        <button class="primary" type="submit">Save product</button>
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
