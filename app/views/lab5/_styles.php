<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">
<style>
    :root {
        --black: #111111;
        --gray: #666666;
        --light: #f5f5f5;
        --border: #dddddd;
        --white: #ffffff;
        --danger: #7f1d1d;
        --content: 1100px;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        min-height: 100vh;
        background: var(--white);
        color: var(--black);
        font-family: "Montserrat", Arial, sans-serif;
        line-height: 1.6;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    a:focus-visible,
    button:focus-visible,
    input:focus-visible,
    textarea:focus-visible {
        outline: 2px solid var(--black);
        outline-offset: 3px;
    }

    h1,
    h2 {
        font-family: "Oswald", Arial, sans-serif;
        letter-spacing: 0;
        text-transform: uppercase;
    }

    h1 {
        margin: 0;
        font-size: clamp(3rem, 8vw, 5.5rem);
        line-height: 1;
    }

    h2 {
        margin: 0 0 18px;
        font-size: 1.2rem;
    }

    .shell {
        width: min(var(--content), calc(100% - 40px));
        margin-inline: auto;
    }

    .topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 72px;
        gap: 24px;
        border-bottom: 1px solid var(--border);
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
    }

    .brand-mark {
        display: grid;
        width: 34px;
        height: 34px;
        place-items: center;
        background: var(--black);
        color: var(--white);
        font-family: "Oswald", Arial, sans-serif;
        font-size: 0.78rem;
    }

    .hero,
    .panel {
        margin-top: 32px;
        padding: 56px;
        border: 1px solid var(--border);
        background: var(--white);
    }

    .page-label {
        display: inline-block;
        margin-bottom: 28px;
        padding: 6px 10px;
        border: 1px solid var(--black);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .kicker,
    .muted {
        color: var(--gray);
    }

    .kicker {
        margin: 0 0 12px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .lead {
        max-width: 680px;
        margin: 18px 0 0;
        color: var(--gray);
    }

    .actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 26px;
    }

    .button,
    button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 11px 16px;
        border: 1px solid var(--black);
        background: var(--white);
        color: var(--black);
        font: 700 0.9rem "Montserrat", Arial, sans-serif;
        cursor: pointer;
    }

    .button.primary,
    button.primary {
        background: var(--black);
        color: var(--white);
    }

    .button.danger,
    button.danger {
        border-color: var(--danger);
        background: var(--danger);
        color: var(--white);
    }

    .button:hover,
    button:hover {
        opacity: 0.72;
    }

    .form-grid {
        display: grid;
        gap: 18px;
        max-width: 680px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        color: var(--gray);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    input,
    textarea {
        width: 100%;
        padding: 13px 14px;
        border: 1px solid var(--border);
        background: var(--white);
        color: var(--black);
        font: 500 1rem "Montserrat", Arial, sans-serif;
    }

    textarea {
        min-height: 130px;
        resize: vertical;
    }

    .alert,
    .empty {
        margin-top: 24px;
        padding: 14px 16px;
        border: 1px solid var(--black);
        background: var(--light);
        font-weight: 700;
    }

    .alert {
        border-color: var(--danger);
        color: var(--danger);
    }

    .table-wrap {
        margin-top: 32px;
        overflow-x: auto;
        border: 1px solid var(--border);
    }

    table {
        width: 100%;
        min-width: 820px;
        border-collapse: collapse;
        background: var(--white);
    }

    th,
    td {
        padding: 15px;
        border-bottom: 1px solid var(--border);
        text-align: left;
        vertical-align: top;
    }

    th {
        background: var(--black);
        color: var(--white);
        font-size: 0.72rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    tr:last-child td {
        border-bottom: 0;
    }

    .row-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        min-width: 155px;
    }

    .inline {
        display: inline;
    }

    footer {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding-block: 24px 35px;
        border-top: 1px solid var(--border);
        color: var(--gray);
        font-size: 0.84rem;
    }

    .auth-page {
        display: grid;
        min-height: 100vh;
        place-items: center;
        padding: 20px;
    }

    .auth-card {
        width: min(480px, 100%);
        padding: 44px;
        border: 1px solid var(--border);
        background: var(--white);
    }

    @media (max-width: 700px) {
        .shell {
            width: min(100% - 28px, var(--content));
        }

        .topbar {
            align-items: flex-start;
            padding-block: 18px;
        }

        .hero,
        .panel,
        .auth-card {
            margin-top: 18px;
            padding: 34px 24px;
        }

        .actions,
        .button,
        button {
            width: 100%;
        }

        .topbar .actions {
            width: auto;
            margin-top: 0;
        }
    }
</style>
