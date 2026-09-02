<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= html_escape($page_title); ?></title>
    <style>
        :root {
            --black: #111111;
            --gray: #666666;
            --light-gray: #f5f5f5;
            --border: #dddddd;
            --white: #ffffff;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            background: var(--white);
            color: var(--black);
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.5;
        }

        .shell {
            width: min(1100px, calc(100% - 40px));
            margin: 0 auto;
        }

        header {
            padding: 64px 0 34px;
            border-bottom: 1px solid var(--border);
        }

        .label {
            margin-bottom: 12px;
            color: var(--gray);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            font-size: clamp(2.8rem, 7vw, 5.5rem);
            line-height: 1;
            letter-spacing: -0.05em;
        }

        .summary {
            display: inline-block;
            margin-top: 22px;
            padding: 8px 12px;
            background: var(--black);
            color: var(--white);
            font-weight: 700;
        }

        .table-wrap {
            margin: 36px 0 72px;
            overflow-x: auto;
            border: 1px solid var(--border);
        }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
        }

        th, td {
            padding: 16px 18px;
            border-bottom: 1px solid var(--border);
            text-align: left;
        }

        th {
            background: var(--black);
            color: var(--white);
            font-size: 0.76rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        tbody tr:nth-child(even) { background: var(--light-gray); }
        tbody tr:last-child td { border-bottom: 0; }
        .empty { color: var(--gray); text-align: center; }

        footer {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 24px 0 36px;
            border-top: 1px solid var(--border);
            color: var(--gray);
            font-size: 0.85rem;
        }

        @media (max-width: 600px) {
            .shell { width: min(100% - 28px, 1100px); }
            header { padding-top: 46px; }
            footer { flex-direction: column; }
        }
    </style>
</head>
<body>
<div class="shell">
    <header>
        <div class="label">Laboratory Exercise No. 4</div>
        <h1>User Management</h1>
        <div class="summary">Total users: <?= count($users); ?></div>
    </header>

    <main>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr><td class="empty" colspan="5">No users found in the database.</td></tr>
                    <?php else: ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= html_escape($user['id']); ?></td>
                                <td><?= html_escape($user['firstname']); ?></td>
                                <td><?= html_escape($user['lastname']); ?></td>
                                <td><?= html_escape($user['email']); ?></td>
                                <td><?= html_escape($user['username']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <span>Data source: MySQL / mydb.users</span>
        <span>&copy; <?= date('Y'); ?> Paul Castillo</span>
    </footer>
</div>
</body>
</html>
