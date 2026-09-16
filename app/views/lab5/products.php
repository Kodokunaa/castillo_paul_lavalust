<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Products | Lab 5</title>
    <?php include APP_DIR . 'views/lab5/_styles.php'; ?>
</head>
<body>
    <div class="shell">
        <header class="topbar">
            <a class="brand" href="<?= html_escape(site_url('products')); ?>">
                <span class="brand-mark">PC</span>
                <span>Castillo / Product Management</span>
            </a>

            <form class="inline" method="post" action="<?= html_escape(site_url('logout')); ?>">
                <input type="hidden" name="csrf_token" value="<?= html_escape($csrf_token); ?>">
                <button type="submit">Log out</button>
            </form>
        </header>

        <main>
            <section class="hero">
                <span class="page-label">Product List</span>
                <p class="kicker">Laboratory Exercise No. 5</p>
                <h1>Products</h1>
                <p class="lead">Create, read, update, and delete product records from the Aiven MySQL database.</p>
                <div class="actions">
                    <a class="button primary" href="<?= html_escape(site_url('products/create')); ?>">Add product</a>
                </div>
            </section>

            <?php if (empty($products)): ?>
                <p class="empty">No products yet. Add your first product.</p>
            <?php else: ?>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?= html_escape($product['product_name']); ?></td>
                                    <td><?= html_escape($product['description']); ?></td>
                                    <td><?= html_escape(number_format((float) $product['price'], 2)); ?></td>
                                    <td><?= html_escape($product['quantity']); ?></td>
                                    <td><?= html_escape($product['created_at']); ?></td>
                                    <td>
                                        <div class="row-actions">
                                            <a class="button" href="<?= html_escape(site_url('products/edit/' . $product['id'])); ?>">Edit</a>
                                            <a class="button danger" href="<?= html_escape(site_url('products/delete/' . $product['id'])); ?>">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </main>

        <footer>
            <span>Laboratory Exercise No. 5</span>
            <span>&copy; <?= date('Y'); ?> Paul Castillo</span>
        </footer>
    </div>
</body>
</html>
