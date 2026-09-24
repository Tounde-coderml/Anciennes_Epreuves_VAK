<?php

use App\Http\Controllers\Admin\FiliereController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (! Auth::attempt($credentials, $request->boolean('remember'))) {
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    $request->session()->regenerate();

    if (Auth::user()?->is_admin) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('dashboard');
})->name('login.submit');

Route::post('/logout', function (Request $request) {
    Auth::guard()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');

Route::middleware('auth')->group(function (): void {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user?->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::get('/admin-filieres-preview', function () {
    $makePreviewFiliere = function (string $id, string $nom, string $slug, string $description, int $matieresCount) {
        return new class($id, $nom, $slug, $description, $matieresCount) {
            public function __construct(
                public string $id,
                public string $nom,
                public string $slug,
                public string $description,
                public int $matieres_count,
            ) {}

            public function __toString(): string
            {
                return (string) $this->id;
            }
        };
    };

    $filieres = collect([
        $makePreviewFiliere('1', 'Génie Civil', 'genie-civil', 'Formation dédiée aux ouvrages de construction et de patrimoine.', 8),
        $makePreviewFiliere('2', 'Génie Informatique', 'genie-informatique', 'Programmation, réseaux, systèmes et développement logiciel.', 10),
        $makePreviewFiliere('3', 'Génie Topographe', 'genie-topographe', 'Cartographie, géodésie et mesures du terrain.', 6),
    ]);

    return view('admin.filieres.index', compact('filieres'));
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function (): void {
    Route::resource('filieres', FiliereController::class);
});
