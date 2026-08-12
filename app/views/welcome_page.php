<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eden Kite — Digital Portfolio</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --black: #080808;
            --black-2: #0e0e0e;
            --gray-1: #161616;
            --gray-2: #222;
            --gray-3: #383838;
            --gray-4: #777;
            --gray-5: #aaa;
            --white: #f5f5f3;
            --white-soft: #d8d8d4;
            --line: rgba(255,255,255,.10);
            --line-soft: rgba(255,255,255,.055);
            --display: 'Oswald', sans-serif;
            --body: 'Poppins', sans-serif;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--body);
            background: var(--black);
            color: var(--white);
            min-height: 100vh;
            overflow-x: hidden;
        }

        body::selection { background: var(--white); color: var(--black); }

        a { color: inherit; text-decoration: none; }

        .grain {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 20;
            opacity: .035;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 220 220' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        }

        .container {
            width: min(1180px, calc(100% - 48px));
            margin: 0 auto;
        }

        .top-line {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--white);
            transform-origin: left;
            z-index: 30;
            animation: lineIn 1.2s cubic-bezier(.22,1,.36,1);
        }

        @keyframes lineIn {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }

        /* NAVIGATION */
        nav {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 28px 0;
            border-bottom: 1px solid var(--line-soft);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-mark {
            width: 34px;
            height: 34px;
            border: 1px solid var(--white);
            display: grid;
            place-items: center;
            font-family: var(--display);
            font-size: 16px;
            letter-spacing: .04em;
            transition: .3s ease;
        }

        .brand:hover .brand-mark {
            background: var(--white);
            color: var(--black);
            transform: rotate(45deg);
        }

        .brand-name {
            font-family: var(--display);
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: .13em;
            color: var(--gray-5);
        }

        .nav-links a { transition: color .25s ease; }
        .nav-links a:hover { color: var(--white); }

        .nav-contact {
            border: 1px solid var(--gray-3);
            padding: 10px 16px;
            color: var(--white);
        }

        .nav-contact:hover {
            border-color: var(--white);
            background: var(--white);
            color: var(--black) !important;
        }

        /* HERO */
        .hero {
            min-height: calc(100vh - 91px);
            display: grid;
            align-items: center;
            padding: 90px 0 110px;
            position: relative;
        }

        .hero::before {
            content: 'EK';
            position: absolute;
            right: -30px;
            top: 50%;
            transform: translateY(-50%);
            font-family: var(--display);
            font-size: clamp(180px, 31vw, 430px);
            line-height: .7;
            font-weight: 700;
            color: transparent;
            -webkit-text-stroke: 1px rgba(255,255,255,.045);
            pointer-events: none;
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--gray-5);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .2em;
            margin-bottom: 28px;
        }

        .eyebrow::before {
            content: '';
            width: 34px;
            height: 1px;
            background: var(--white);
        }

        .hero h1 {
            position: relative;
            z-index: 1;
            font-family: var(--display);
            font-size: clamp(76px, 13vw, 172px);
            line-height: .82;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: -.025em;
            max-width: 950px;
        }

        .hero h1 .outline {
            color: transparent;
            -webkit-text-stroke: 1px var(--white);
        }

        .hero-bottom {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: end;
            gap: 50px;
            margin-top: 65px;
            max-width: 820px;
        }

        .hero-copy {
            max-width: 520px;
            color: var(--gray-5);
            font-size: 15px;
            line-height: 1.9;
            font-weight: 300;
        }

        .hero-copy strong {
            color: var(--white);
            font-weight: 500;
        }

        .hero-links {
            display: flex;
            gap: 10px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            border: 1px solid var(--gray-3);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .15em;
            font-weight: 600;
            transition: all .3s ease;
        }

        .button.primary {
            background: var(--white);
            border-color: var(--white);
            color: var(--black);
        }

        .button:hover {
            transform: translateY(-3px);
            border-color: var(--white);
        }

        .button.primary:hover {
            background: transparent;
            color: var(--white);
        }

        /* MARQUEE */
        .marquee {
            overflow: hidden;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            padding: 18px 0;
            background: var(--black-2);
        }

        .marquee-track {
            display: flex;
            width: max-content;
            animation: marquee 22s linear infinite;
        }

        .marquee-item {
            display: flex;
            align-items: center;
            gap: 26px;
            padding-right: 26px;
            white-space: nowrap;
            font-family: var(--display);
            font-size: 17px;
            text-transform: uppercase;
            letter-spacing: .1em;
            color: var(--gray-4);
        }

        .marquee-item span { color: var(--white); font-size: 10px; }

        @keyframes marquee {
            to { transform: translateX(-50%); }
        }

        /* SECTIONS */
        section { padding: 120px 0; }

        .section-head {
            display: grid;
            grid-template-columns: 170px 1fr;
            gap: 50px;
            margin-bottom: 55px;
        }

        .section-number {
            font-family: var(--display);
            color: var(--gray-4);
            font-size: 14px;
            letter-spacing: .08em;
        }

        .section-number span { color: var(--white); }

        .section-title {
            font-family: var(--display);
            font-size: clamp(45px, 6vw, 82px);
            text-transform: uppercase;
            line-height: .92;
            font-weight: 500;
            letter-spacing: -.02em;
        }

        .section-subtitle {
            color: var(--gray-4);
            max-width: 570px;
            margin-top: 24px;
            line-height: 1.8;
            font-size: 14px;
        }

        /* ABOUT */
        .about-grid {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 80px;
            border-top: 1px solid var(--line);
            padding-top: 35px;
        }

        .about-text {
            font-size: clamp(24px, 3vw, 39px);
            line-height: 1.25;
            font-weight: 300;
            letter-spacing: -.02em;
        }

        .about-text em {
            font-style: normal;
            color: var(--white);
        }

        .about-meta {
            display: grid;
            gap: 28px;
        }

        .meta-block {
            padding-bottom: 24px;
            border-bottom: 1px solid var(--line);
        }

        .meta-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .18em;
            color: var(--gray-4);
            margin-bottom: 8px;
        }

        .meta-value {
            font-size: 14px;
            color: var(--white-soft);
        }

        /* PROJECTS */
        .projects { border-top: 1px solid var(--line); }

        .project {
            display: grid;
            grid-template-columns: 90px 1fr 180px;
            align-items: center;
            gap: 30px;
            padding: 32px 0;
            border-bottom: 1px solid var(--line);
            transition: padding .35s ease;
        }

        .project:hover { padding-left: 18px; padding-right: 18px; }

        .project-index {
            font-family: var(--display);
            font-size: 15px;
            color: var(--gray-4);
        }

        .project-main h3 {
            font-family: var(--display);
            font-size: clamp(28px, 4vw, 50px);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: -.01em;
        }

        .project-main p {
            color: var(--gray-4);
            font-size: 12px;
            margin-top: 8px;
        }

        .project-type {
            justify-self: end;
            text-align: right;
            color: var(--gray-4);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .14em;
            line-height: 1.8;
        }

        .project-arrow {
            display: inline-block;
            margin-left: 8px;
            color: var(--white);
            transition: transform .25s ease;
        }

        .project:hover .project-arrow { transform: translate(5px,-5px); }

        /* SKILLS */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            border-top: 1px solid var(--line);
            border-left: 1px solid var(--line);
        }

        .skill {
            min-height: 160px;
            padding: 24px;
            border-right: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: background .3s ease;
        }

        .skill:hover { background: var(--gray-1); }

        .skill-no {
            font-family: var(--display);
            color: var(--gray-4);
            font-size: 12px;
        }

        .skill-name {
            font-family: var(--display);
            text-transform: uppercase;
            font-size: 25px;
            line-height: 1;
        }

        .skill-detail {
            color: var(--gray-4);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .1em;
            margin-top: 8px;
        }

        /* CONTACT */
        .contact {
            border-top: 1px solid var(--line);
            padding-bottom: 150px;
        }

        .contact-inner {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 60px;
            align-items: end;
        }

        .contact-title {
            font-family: var(--display);
            font-size: clamp(60px, 10vw, 135px);
            text-transform: uppercase;
            line-height: .82;
            letter-spacing: -.03em;
        }

        .contact-title .outline {
            color: transparent;
            -webkit-text-stroke: 1px var(--white);
        }

        .contact-side {
            max-width: 300px;
            color: var(--gray-4);
            font-size: 13px;
            line-height: 1.8;
        }

        .contact-side .button {
            margin-top: 24px;
        }

        /* FOOTER */
        footer {
            border-top: 1px solid var(--line);
            padding: 28px 0;
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .footer-brand {
            font-family: var(--display);
            text-transform: uppercase;
            letter-spacing: .1em;
            font-size: 14px;
        }

        .footer-meta {
            color: var(--gray-4);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .12em;
        }

        .footer-links {
            display: flex;
            gap: 20px;
            color: var(--gray-4);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .12em;
        }

        .footer-links a:hover { color: var(--white); }

        /* REVEAL */
        .reveal {
            animation: reveal .9s cubic-bezier(.22,1,.36,1) both;
        }

        .delay-1 { animation-delay: .1s; }
        .delay-2 { animation-delay: .2s; }
        .delay-3 { animation-delay: .3s; }

        @keyframes reveal {
            from { opacity: 0; transform: translateY(28px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {
            .container { width: min(100% - 32px, 1180px); }

            nav { padding: 20px 0; }
            .nav-links a:not(.nav-contact) { display: none; }

            .hero {
                min-height: auto;
                padding: 100px 0 90px;
            }

            .hero h1 { font-size: clamp(65px, 19vw, 130px); }
            .hero-bottom { grid-template-columns: 1fr; margin-top: 45px; }
            .hero::before { right: -100px; opacity: .6; }

            section { padding: 80px 0; }

            .section-head {
                grid-template-columns: 1fr;
                gap: 15px;
                margin-bottom: 40px;
            }

            .about-grid,
            .contact-inner { grid-template-columns: 1fr; gap: 45px; }

            .project {
                grid-template-columns: 45px 1fr;
                gap: 15px;
            }

            .project-type {
                grid-column: 2;
                justify-self: start;
                text-align: left;
            }

            .skills-grid { grid-template-columns: repeat(2, 1fr); }

            .contact-title { font-size: clamp(65px, 18vw, 125px); }

            .footer-inner {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            .brand-name { font-size: 17px; }
            .hero-links { flex-direction: column; align-items: flex-start; }
            .button { width: 100%; justify-content: center; }
            .skills-grid { grid-template-columns: 1fr 1fr; }
            .skill { min-height: 135px; padding: 18px; }
            .skill-name { font-size: 20px; }
            .project-main h3 { font-size: 30px; }
        }
    </style>
</head>

<body>
<div class="top-line"></div>
<div class="grain"></div>

<div class="container">
    <nav>
        <a class="brand" href="#">
            <span class="brand-mark">EK</span>
            <span class="brand-name">Eden Kite</span>
        </a>

        <div class="nav-links">
            <a href="#about">About</a>
            <a href="#work">Work</a>
            <a href="#skills">Skills</a>
            <a href="#contact" class="nav-contact">Let's Talk</a>
        </div>
    </nav>
</div>

<main>
    <!-- HERO -->
    <header class="hero container">
        <div>
            <div class="eyebrow reveal">Independent Developer / Creative</div>

            <h1 class="reveal delay-1">
                Eden<br>
                <span class="outline">Kite.</span>
            </h1>

            <div class="hero-bottom reveal delay-2">
                <p class="hero-copy">
                    I build <strong>clean digital experiences</strong> where design, technology,
                    and function meet. Focused on thoughtful interfaces, reliable systems,
                    and work that feels deliberately made.
                </p>

                <div class="hero-links">
                    <a href="#work" class="button primary">View Work <span>↘</span></a>
                    <a href="#contact" class="button">Contact <span>↗</span></a>
                </div>
            </div>
        </div>
    </header>

    <!-- MARQUEE -->
    <div class="marquee">
        <div class="marquee-track">
            <div class="marquee-item">Design <span>✦</span> Development <span>✦</span> Systems <span>✦</span> Digital Experiences <span>✦</span></div>
            <div class="marquee-item">Design <span>✦</span> Development <span>✦</span> Systems <span>✦</span> Digital Experiences <span>✦</span></div>
            <div class="marquee-item">Design <span>✦</span> Development <span>✦</span> Systems <span>✦</span> Digital Experiences <span>✦</span></div>
        </div>
    </div>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="section-head">
                <div class="section-number">01 / <span>About</span></div>
                <div>
                    <h2 class="section-title">Built with<br>intention.</h2>
                    <p class="section-subtitle">
                        A personal portfolio focused on the intersection of technical execution
                        and polished visual design.
                    </p>
                </div>
            </div>

            <div class="about-grid">
                <p class="about-text">
                    I'm Eden Kite — a developer who cares about the details between
                    <em>an idea and the finished product.</em> I like interfaces that feel
                    simple, systems that stay organized, and projects that have a clear point of view.
                </p>

                <div class="about-meta">
                    <div class="meta-block">
                        <div class="meta-label">Approach</div>
                        <div class="meta-value">Minimal / Functional / Intentional</div>
                    </div>
                    <div class="meta-block">
                        <div class="meta-label">Focus</div>
                        <div class="meta-value">Web Development & Digital Products</div>
                    </div>
                    <div class="meta-block">
                        <div class="meta-label">Based</div>
                        <div class="meta-value">Philippines</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WORK -->
    <section id="work" class="projects">
        <div class="container">
            <div class="section-head">
                <div class="section-number">02 / <span>Selected Work</span></div>
                <div>
                    <h2 class="section-title">Things I've<br>built.</h2>
                    <p class="section-subtitle">
                        A selection of digital projects spanning applications, systems,
                        interfaces, and experimental builds.
                    </p>
                </div>
            </div>

            <div class="project">
                <div class="project-index">01</div>
                <div class="project-main">
                    <h3>StayFinder</h3>
                    <p>Rental platform / Web application / Full-stack</p>
                </div>
                <div class="project-type">React + Vite<br>MySQL / Node<br><span class="project-arrow">↗</span></div>
            </div>

            <div class="project">
                <div class="project-index">02</div>
                <div class="project-main">
                    <h3>Capstone API</h3>
                    <p>Research utility / API architecture / Student-focused</p>
                </div>
                <div class="project-type">REST API<br>Data Systems<br><span class="project-arrow">↗</span></div>
            </div>

            <div class="project">
                <div class="project-index">03</div>
                <div class="project-main">
                    <h3>Interface Lab</h3>
                    <p>UI experiments / Interaction / Visual systems</p>
                </div>
                <div class="project-type">Frontend<br>Creative Code<br><span class="project-arrow">↗</span></div>
            </div>

            <div class="project">
                <div class="project-index">04</div>
                <div class="project-main">
                    <h3>Digital Systems</h3>
                    <p>Custom tools / Dashboards / Practical automation</p>
                </div>
                <div class="project-type">Systems<br>Productivity<br><span class="project-arrow">↗</span></div>
            </div>
        </div>
    </section>

    <!-- SKILLS -->
    <section id="skills">
        <div class="container">
            <div class="section-head">
                <div class="section-number">03 / <span>Capabilities</span></div>
                <div>
                    <h2 class="section-title">Tools of<br>the trade.</h2>
                    <p class="section-subtitle">
                        Technologies and disciplines I use to turn concepts into working digital products.
                    </p>
                </div>
            </div>

            <div class="skills-grid">
                <div class="skill">
                    <span class="skill-no">01</span>
                    <div>
                        <div class="skill-name">React</div>
                        <div class="skill-detail">Frontend</div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-no">02</span>
                    <div>
                        <div class="skill-name">JavaScript</div>
                        <div class="skill-detail">Development</div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-no">03</span>
                    <div>
                        <div class="skill-name">PHP</div>
                        <div class="skill-detail">Backend</div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-no">04</span>
                    <div>
                        <div class="skill-name">MySQL</div>
                        <div class="skill-detail">Database</div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-no">05</span>
                    <div>
                        <div class="skill-name">Node</div>
                        <div class="skill-detail">Backend</div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-no">06</span>
                    <div>
                        <div class="skill-name">UI / UX</div>
                        <div class="skill-detail">Interface</div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-no">07</span>
                    <div>
                        <div class="skill-name">Git</div>
                        <div class="skill-detail">Workflow</div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-no">08</span>
                    <div>
                        <div class="skill-name">Motion</div>
                        <div class="skill-detail">Interaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="contact-inner">
                <h2 class="contact-title">
                    Let's<br>
                    <span class="outline">make</span><br>
                    something.
                </h2>

                <div class="contact-side">
                    <p>
                        Have a project, idea, or collaboration in mind?
                        Let's turn it into something clear, useful, and memorable.
                    </p>
                    <a href="mailto:hello@edenkite.dev" class="button primary">
                        Get in touch <span>↗</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container footer-inner">
        <div class="footer-brand">Eden Kite</div>
        <div class="footer-meta">© <?php echo date('Y'); ?> / All rights reserved</div>
        <div class="footer-links">
            <a href="#">GitHub</a>
            <a href="#">LinkedIn</a>
            <a href="mailto:hello@edenkite.dev">Email</a>
        </div>
    </div>
</footer>

</body>
</html>