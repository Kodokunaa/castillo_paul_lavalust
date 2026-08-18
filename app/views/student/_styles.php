<style>
    :root {
        --color-black: #111111;
        --color-gray: #666666;
        --color-light-gray: #f5f5f5;
        --color-border: #dddddd;
        --color-white: #ffffff;
        --content-width: 960px;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    html {
        background: var(--color-white);
    }

    body {
        min-height: 100vh;
        margin: 0;
        background: var(--color-white);
        color: var(--color-black);
        font-family: Arial, Helvetica, sans-serif;
        line-height: 1.6;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    a:focus-visible {
        outline: 2px solid var(--color-black);
        outline-offset: 3px;
    }

    .shell {
        width: min(var(--content-width), calc(100% - 40px));
        margin-inline: auto;
    }

    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 72px;
        gap: 24px;
        border-bottom: 1px solid var(--color-border);
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
        background: var(--color-black);
        color: var(--color-white);
        font-size: 0.78rem;
    }

    .hero {
        margin-top: 32px;
        padding: 56px;
        border: 1px solid var(--color-border);
    }

    .page-label {
        display: inline-block;
        margin-bottom: 28px;
        padding: 6px 10px;
        border: 1px solid var(--color-black);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .kicker {
        margin-bottom: 12px;
        color: var(--color-gray);
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    h1 {
        max-width: 760px;
        margin: 0 0 20px;
        font-size: clamp(2.7rem, 7vw, 5.3rem);
        line-height: 1;
        letter-spacing: -0.045em;
    }

    h1 em {
        font-style: normal;
    }

    .lead {
        max-width: 680px;
        margin: 0;
        color: var(--color-gray);
        font-size: 1rem;
    }

    .actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 26px;
    }

    .button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 16px;
        border: 1px solid var(--color-black);
        font-size: 0.9rem;
        font-weight: 700;
        transition: opacity 150ms ease;
    }

    .button.primary {
        background: var(--color-black);
        color: var(--color-white);
    }

    .button:hover {
        opacity: 0.72;
    }

    .notice {
        margin-top: 24px;
        padding: 12px 15px;
        border: 1px solid var(--color-black);
        background: var(--color-light-gray);
        font-weight: 700;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(12, minmax(0, 1fr));
        gap: 18px;
        padding-block: 38px 70px;
    }

    .card {
        padding: 24px;
        border: 1px solid var(--color-border);
        background: var(--color-white);
    }

    .card h2 {
        margin: 0 0 18px;
        font-size: 1.1rem;
    }

    .identity {
        grid-column: span 7;
    }

    .academic {
        grid-column: span 5;
        background: var(--color-light-gray);
    }

    .academic .facts {
        grid-template-columns: 1fr;
    }

    .wide {
        grid-column: span 12;
    }

    .half {
        grid-column: span 6;
    }

    .facts {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        border-top: 1px solid var(--color-border);
        border-left: 1px solid var(--color-border);
    }

    .fact {
        min-width: 0;
        padding: 15px;
        border-right: 1px solid var(--color-border);
        border-bottom: 1px solid var(--color-border);
        background: var(--color-white);
        overflow-wrap: anywhere;
    }

    .label {
        display: block;
        margin-bottom: 4px;
        color: var(--color-gray);
        font-size: 0.7rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .value {
        font-weight: 700;
    }

    .chips {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .chip {
        padding: 7px 11px;
        border: 1px solid var(--color-black);
        font-size: 0.84rem;
    }

    footer {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding-block: 24px 35px;
        border-top: 1px solid var(--color-border);
        color: var(--color-gray);
        font-size: 0.84rem;
    }

    /* Student Home: bright academic dashboard. */
    .home-page .academic {
        border-color: var(--color-black);
    }

    /* Student Profile: dark introduction and personal profile cards. */
    .profile-page .hero {
        border-color: var(--color-black);
        background: var(--color-black);
        color: var(--color-white);
    }

    .profile-page .page-label {
        border-color: var(--color-white);
    }

    .profile-page .kicker,
    .profile-page .hero .lead {
        color: #cccccc;
    }

    .profile-page .hero .button.primary {
        border-color: var(--color-white);
        background: var(--color-white);
        color: var(--color-black);
    }

    .profile-page .grid {
        gap: 24px;
        padding-top: 48px;
    }

    .profile-page .wide {
        padding-block: 34px;
        border-width: 2px;
    }

    .profile-page .half h2 {
        padding-bottom: 12px;
        border-bottom: 1px solid var(--color-border);
    }

    @media (max-width: 700px) {
        .shell {
            width: min(100% - 28px, var(--content-width));
        }

        nav {
            align-items: flex-start;
            padding-block: 18px;
        }

        .brand {
            max-width: 170px;
        }

        .hero,
        .profile-page .hero {
            margin-top: 18px;
            padding: 34px 24px;
        }

        .identity,
        .academic,
        .half {
            grid-column: span 12;
        }

        .facts {
            grid-template-columns: 1fr;
        }

        footer {
            flex-direction: column;
        }
    }

    @media (max-width: 420px) {
        h1 {
            font-size: 2.6rem;
        }

        .actions,
        .button {
            width: 100%;
        }

        .card {
            padding: 18px;
        }
    }
</style>
