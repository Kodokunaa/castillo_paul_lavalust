<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= html_escape($page_title); ?></title>
    <?php require __DIR__ . '/_styles.php'; ?>
</head>
<body class="profile-page">
<div class="shell">
    <?php $active_page = 'profile'; require __DIR__ . '/_nav.php'; ?>
    <main>
        <section class="hero">
            <div>
                <div class="page-label">Student Profile</div>
                <div class="kicker">Access verified</div>
                <h1>Student Profile</h1>
                <div class="actions"><a class="button primary" href="<?= html_escape(site_url('student')); ?>">Back to Student Home</a></div>
            </div>
        </section>

        <section class="grid" aria-label="Student profile details">
            <article class="card wide">
                <h2>Profile Description</h2>
                <p class="lead"><?= html_escape($student['bio']); ?></p>
            </article>
            <article class="card half">
                <h2>Technical Skills</h2>
                <div class="chips">
                    <?php foreach ($student['skills'] as $skill): ?>
                        <span class="chip"><?= html_escape($skill); ?></span>
                    <?php endforeach; ?>
                </div>
            </article>
            <article class="card half">
                <h2>Interests &amp; Hobbies</h2>
                <div class="chips">
                    <?php foreach ($student['hobbies'] as $hobby): ?>
                        <span class="chip"><?= html_escape($hobby); ?></span>
                    <?php endforeach; ?>
                </div>
            </article>
            <article class="card identity">
                <h2>Student Information</h2>
                <div class="facts">
                    <div class="fact"><span class="label">Student Name</span><span class="value"><?= html_escape($student['name']); ?></span></div>
                    <div class="fact"><span class="label">Student ID</span><span class="value"><?= html_escape($student['student_id']); ?></span></div>
                    <div class="fact"><span class="label">Email</span><span class="value"><?= html_escape($student['email']); ?></span></div>
                    <div class="fact"><span class="label">Location</span><span class="value"><?= html_escape($student['location']); ?></span></div>
                </div>
            </article>
            <article class="card academic">
                <h2>Academic Information</h2>
                <div class="facts">
                    <div class="fact"><span class="label">Course</span><span class="value"><?= html_escape($student['course']); ?></span></div>
                    <div class="fact"><span class="label">Year Level</span><span class="value"><?= html_escape($student['year']); ?></span></div>
                    <div class="fact"><span class="label">Section</span><span class="value"><?= html_escape($student['section']); ?></span></div>
                </div>
            </article>
        </section>
    </main>
    <footer><span>Protected by StudentMiddleware</span><span>&copy; <?= date('Y'); ?> Paul Castillo</span></footer>
</div>
</body>
</html>
