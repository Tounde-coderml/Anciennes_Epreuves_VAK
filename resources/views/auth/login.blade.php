<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ESGC VAK | Connexion</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <style>
            :root {
                --esgc-blue: #1a5f8a;
                --esgc-blue-dark: #0e2d4d;
                --esgc-red: #e63946;
                --esgc-red-soft: #fbe5e8;
                --esgc-text: #1d2a39;
                --esgc-muted: #6c757d;
                --esgc-input: #e8eef7;
                --esgc-line: #d5dde8;
                --esgc-illustration: #dbe8f2;
                --esgc-shadow: 0 14px 40px rgba(10, 32, 57, 0.12);
            }

            * { box-sizing: border-box; }

            html, body {
                margin: 0;
                min-height: 100%;
                background: #ffffff;
                color: var(--esgc-text);
                font-family: 'Poppins', 'Segoe UI', sans-serif;
            }

            body {
                min-height: 100vh;
            }

            a {
                text-decoration: none;
            }

            .auth-layout {
                display: grid;
                grid-template-columns: 1.15fr 0.85fr;
                min-height: 100vh;
                background: #ffffff;
            }

            .visual-panel {
                position: relative;
                overflow: hidden;
                min-height: 100vh;
                background: linear-gradient(135deg, #0a223e 0%, #153d6b 100%);
            }

            .visual-slider {
                position: relative;
                width: 100%;
                height: 100%;
                min-height: 100vh;
            }

            .visual-slide {
                position: absolute;
                inset: 0;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.8s ease, visibility 0.8s ease;
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: flex-end;
                padding: 68px 56px;
            }

            .visual-slide.active {
                opacity: 1;
                visibility: visible;
            }

            .visual-slide::before {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(5, 15, 27, 0.18) 0%, rgba(5, 15, 27, 0.68) 100%);
            }

            .visual-content {
                position: relative;
                z-index: 1;
                max-width: 440px;
                color: #ffffff;
            }

            .visual-badge {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 9px 15px;
                border-radius: 999px;
                border: 1px solid rgba(255,255,255,0.26);
                background: rgba(255,255,255,0.12);
                font-size: 0.7rem;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                font-weight: 700;
            }

            .visual-content h2 {
                margin: 18px 0 12px;
                font-size: clamp(2rem, 2.9vw, 3.3rem);
                line-height: 1.06;
                letter-spacing: -0.04em;
                font-weight: 800;
            }

            .visual-content p {
                margin: 0;
                color: rgba(255,255,255,0.82);
                line-height: 1.7;
                font-size: 0.98rem;
            }

            .visual-dots {
                position: absolute;
                left: 56px;
                bottom: 30px;
                z-index: 2;
                display: flex;
                gap: 10px;
            }

            .visual-dot {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background: rgba(255,255,255,0.42);
                transition: all 0.3s ease;
            }

            .visual-dot.active {
                width: 30px;
                border-radius: 999px;
                background: #ffffff;
            }

            .login-panel {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 52px 36px;
                background: #ffffff;
            }

            .login-card {
                width: min(100%, 500px);
                background: #ffffff;
                padding: 10px 6px;
            }

            .brand-logo {
                display: block;
                width: min(100%, 280px);
                height: auto;
                margin: 0 0 22px;
            }

            h1 {
                margin: 0 0 10px;
                color: var(--esgc-blue-dark);
                font-size: clamp(2.2rem, 3vw, 3.1rem);
                line-height: 1.08;
                letter-spacing: -0.04em;
                font-weight: 800;
            }

            .subtitle {
                margin: 0 0 24px;
                color: var(--esgc-muted);
                font-size: 1.05rem;
                line-height: 1.6;
            }

            .field-group {
                margin-bottom: 18px;
            }

            .input-wrap {
                position: relative;
                width: 100%;
            }

            .form-control {
                width: 100%;
                min-height: 58px;
                border: 1px solid var(--esgc-line);
                background: var(--esgc-input);
                border-radius: 999px;
                padding: 16px 18px;
                font-size: 1rem;
                color: var(--esgc-text);
                font-family: 'Poppins', 'Segoe UI', sans-serif;
                outline: none;
                transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            }

            .form-control::placeholder {
                color: var(--esgc-muted);
            }

            .form-control:focus {
                border-color: rgba(26, 95, 138, 0.4);
                box-shadow: 0 0 0 4px rgba(26, 95, 138, 0.08);
                background: #ffffff;
            }

            .form-control--password {
                padding-right: 54px;
            }

            .password-toggle {
                position: absolute;
                right: 16px;
                top: 50%;
                transform: translateY(-50%);
                width: 30px;
                height: 30px;
                border: none;
                background: transparent;
                cursor: pointer;
                color: var(--esgc-muted);
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0;
            }

            .password-toggle svg {
                width: 20px;
                height: 20px;
                display: block;
            }

            .is-invalid {
                border-color: #dc3545 !important;
                background: #fff !important;
            }

            .error-message {
                margin-top: -10px;
                margin-bottom: 14px;
                color: #d93025;
                font-size: 0.8rem;
                font-weight: 500;
            }

            .btn-submit {
                width: 100%;
                min-height: 58px;
                border: none;
                border-radius: 999px;
                background: linear-gradient(135deg, var(--esgc-blue) 0%, #214e78 100%);
                color: #ffffff;
                font-family: 'Poppins', 'Segoe UI', sans-serif;
                font-size: 1.05rem;
                font-weight: 700;
                letter-spacing: 0.02em;
                box-shadow: 0 18px 24px rgba(26, 95, 138, 0.18);
                cursor: pointer;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .btn-submit:hover {
                transform: translateY(-1px);
                box-shadow: 0 20px 26px rgba(26, 95, 138, 0.22);
            }

            .meta-line {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                gap: 10px;
                margin-top: 20px;
                color: var(--esgc-muted);
                font-size: 0.92rem;
                line-height: 1.5;
            }

            .meta-lock {
                display: inline-flex;
                width: 18px;
                height: 18px;
                align-items: center;
                justify-content: center;
                color: var(--esgc-muted);
            }

            .meta-lock svg {
                width: 16px;
                height: 16px;
                display: block;
            }

            .password-link {
                color: var(--esgc-red);
                font-weight: 600;
                text-decoration: underline;
                text-underline-offset: 3px;
            }

            @media (max-width: 960px) {
                .auth-layout {
                    grid-template-columns: 1fr;
                }

                .visual-panel {
                    min-height: 320px;
                }

                .visual-slider {
                    min-height: 320px;
                }

                .login-panel {
                    padding: 26px 18px 42px;
                }
            }
        </style>
    </head>
    <body>
        <div class="auth-layout">
            <aside class="visual-panel" aria-label="Galerie ESGC VAK">
                <div class="visual-slider">
                    <div class="visual-slide active" style="background-image: url('{{ asset('images/esgcvak.jpg') }}');">
                        <div class="visual-content">
                            <span class="visual-badge">ESGC VAK</span>
                            <h2>Bibliothèque des épreuves</h2>
                            <p>Accédez à vos examens, devoirs et rattrapages en quelques clics.</p>
                        </div>
                    </div>

                    <div class="visual-slide" style="background-image: url('{{ asset('images/gc.jpeg') }}');">
                        <div class="visual-content">
                            <span class="visual-badge">Génie Civil</span>
                            <h2>Préparez-vous mieux</h2>
                            <p>Télécharger tout les épreuves dont vous avez besoin.</p>
                        </div>
                    </div>

                    <div class="visual-slide" style="background-image: url('{{ asset('images/gi.png') }}');">
                        <div class="visual-content">
                            <span class="visual-badge">Génie informatique</span>
                            <h2>Réviser avec faciliter </h2>
                            <p>Toutes les fillière GC - GI - GT.</p>
                        </div>
                    </div>

                    <div class="visual-slide" style="background-image: url('{{ asset('images/gt.png') }}');">
                        <div class="visual-content">
                            <span class="visual-badge">Génie Topographe</span>
                            <h2>Une communauté qui avance</h2>
                            <p>Une plateforme conçue pour aider chaque étudiant à aller plus loin.</p>
                        </div>
                    </div>

                    <div class="visual-dots" aria-label="Diaporama">
                        <span class="visual-dot active"></span>
                        <span class="visual-dot"></span>
                        <span class="visual-dot"></span>
                        <span class="visual-dot"></span>
                    </div>
                </div>
            </aside>

            <main class="login-panel">
                <div class="login-card">
                    <img src="{{ asset('images/logo-esgc-vak.png') }}" alt="ESGC VAK" class="brand-logo">

                    <h1>Voulez vous les épreuves  ?<br>Connectez-vous !</h1>
                    <p class="subtitle">Entrez vos identifiants</p>

                    <form method="POST" action="{{ route('login.submit') }}" novalidate>
                        @csrf

                        <div class="field-group">
                            <div class="input-wrap">
                                <input id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email', '') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Entrez vôtre email"
                                    autocomplete="email"
                                    aria-label="Adresse e-mail">
                            </div>
                            @error('email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field-group">
                            <div class="input-wrap">
                                <input id="password"
                                    name="password"
                                    type="password"
                                    value=""
                                    class="form-control form-control--password @error('password') is-invalid @enderror"
                                    placeholder="Entrez vôtre mot de passe "
                                    autocomplete="current-password"
                                    aria-label="Mot de passe">
                                <button type="button" class="password-toggle" aria-label="Afficher le mot de passe">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M2 2L22 22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        <path d="M10.58 10.58A2 2 0 0013.42 13.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        <path d="M9.88 5.08A10.44 10.44 0 0112 5c4.97 0 8.5 4.35 9.5 7-1.03 2.41-2.6 4.5-4.61 5.69M6.61 6.61C4.52 7.82 2.95 9.9 2 12c1 2.65 4.53 7 10 7a11.37 11.37 0 004.36-1.03" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn-submit">Se connecter</button>
                    </form>

                    <div class="meta-line">
                        <span class="meta-lock" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 10V7a5 5 0 0110 0v3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                <rect x="5" y="10" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            </svg>
                        </span>
                        <span>Vos informations sont sécurisées</span>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="password-link">Mot de passe oublié ?</a>
                        @else
                            <a href="#" class="password-link">Mot de passe oublié ?</a>
                        @endif
                    </div>
                </div>
            </main>
        </div>

        <script>
            const slides = Array.from(document.querySelectorAll('.visual-slide'));
            const dots = Array.from(document.querySelectorAll('.visual-dot'));
            let activeIndex = 0;

            setInterval(() => {
                activeIndex = (activeIndex + 1) % slides.length;

                slides.forEach((slide, index) => {
                    slide.classList.toggle('active', index === activeIndex);
                });

                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === activeIndex);
                });
            }, 2000);

            const toggleButtons = document.querySelectorAll('.password-toggle');

            toggleButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const input = button.parentElement.querySelector('input');
                    const isPassword = input.type === 'password';
                    input.type = isPassword ? 'text' : 'password';
                    button.setAttribute('aria-label', isPassword ? 'Masquer le mot de passe' : 'Afficher le mot de passe');
                });
            });
        </script>
    </body>
</html>
