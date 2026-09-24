<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'ESGC VAK Admin')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                --esgc-bg: #f5f7fb;
                --esgc-shadow: 0 14px 40px rgba(10, 32, 57, 0.12);
            }

            body {
                background: var(--esgc-bg);
                color: var(--esgc-text);
                font-family: 'Poppins', 'Segoe UI', sans-serif;
            }

            .sidebar {
                background: linear-gradient(180deg, var(--esgc-blue-dark) 0%, #163c68 100%);
            }

            .sidebar a {
                color: rgba(255,255,255,0.8);
                text-decoration: none;
                border-radius: 12px;
            }

            .sidebar a:hover {
                color: white;
                background: rgba(255,255,255,0.08);
            }

            .card {
                border: none;
                border-radius: 20px;
                box-shadow: var(--esgc-shadow);
            }

            .table td,
            .table th {
                border-radius: 0;
            }

            .form-control,
            .form-select,
            .btn,
            .badge {
                border-radius: 999px;
            }

            textarea.form-control,
            textarea.form-select {
                border-radius: 0;
            }

            .form-control,
            .form-select {
                border: 1px solid var(--esgc-line);
                background: var(--esgc-input);
                color: var(--esgc-text);
            }

            .form-control:focus,
            .form-select:focus {
                border-color: rgba(26, 95, 138, 0.4);
                box-shadow: 0 0 0 4px rgba(26, 95, 138, 0.08);
            }

            .btn {
                padding: 0.65rem 1.2rem;
                font-weight: 600;
                transition: all 0.2s ease;
            }

            .btn-primary {
                background: linear-gradient(135deg, var(--esgc-blue) 0%, #214e78 100%);
                border: none;
                box-shadow: 0 18px 24px rgba(26, 95, 138, 0.18);
            }

            .btn-primary:hover {
                background: linear-gradient(135deg, #194d76 0%, #1a5f8a 100%);
            }

            .btn-outline-primary {
                color: var(--esgc-blue);
                border-color: rgba(26, 95, 138, 0.35);
            }

            .btn-outline-primary:hover {
                background: var(--esgc-blue);
                border-color: var(--esgc-blue);
            }

            .badge {
                background: var(--esgc-red-soft);
                color: var(--esgc-blue-dark);
            }
        </style>
    </head>
    <body>
        <div class="container-fluid p-0">
            <div class="row g-0 min-vh-100">
                <aside class="sidebar col-md-3 col-lg-2 p-4 text-white">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; font-weight: 700;">
                            E
                        </div>
                        <div>
                            <div class="fw-bold">ESGC VAK</div>
                            <small class="text-white-50">Admin</small>
                        </div>
                    </div>

                    <nav class="nav flex-column gap-2">
                        <a href="{{ route('admin.filieres.index') }}" class="px-3 py-2 rounded">Filières</a>
                        <a href="#" class="px-3 py-2 rounded">Niveaux</a>
                        <a href="#" class="px-3 py-2 rounded">Années</a>
                        <a href="#" class="px-3 py-2 rounded">Matières</a>
                        <a href="#" class="px-3 py-2 rounded">Épreuves</a>
                    </nav>
                </aside>

                <main class="col-md-9 col-lg-10 p-4 p-lg-5">
                    @if (session('success'))
                        <div class="alert alert-success rounded-pill border-0 shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-4 border-0">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
