<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard ESGC</title>
        <style>
            body {
                margin: 0;
                font-family: Arial, sans-serif;
                background: #f3f7fb;
                color: #1d2a39;
            }

            .wrap {
                max-width: 1000px;
                margin: 80px auto;
                padding: 32px;
                background: white;
                border-radius: 20px;
                box-shadow: 0 18px 40px rgba(10, 32, 57, 0.08);
            }

            h1 {
                margin-top: 0;
                color: #0e2d4d;
            }

            .card {
                display: inline-block;
                padding: 14px 18px;
                background: #edf5ff;
                border-radius: 12px;
                margin-top: 16px;
            }

            a {
                color: #1a5f8a;
                font-weight: 700;
            }
        </style>
    </head>
    <body>
        <div class="wrap">
            <h1>Bienvenue {{ Auth::user()->name }}</h1>
            <p>Vous êtes connecté à votre espace ESGC.</p>
            <div class="card">
                <a href="{{ route('login') }}">Retour connexion</a>
            </div>
        </div>
    </body>
</html>
