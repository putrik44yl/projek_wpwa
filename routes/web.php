<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Import Controllers
|--------------------------------------------------------------------------
*/

// ADMIN
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\KehadiranController;
use App\Http\Controllers\Admin\IuranController;
use App\Http\Controllers\Admin\GaleriController;

// PENGURUS
use App\Http\Controllers\Pengurus\DashboardController as PengurusDashboardController;
use App\Http\Controllers\Pengurus\KegiatanController as PengurusKegiatanController;
use App\Http\Controllers\Pengurus\KehadiranController as PengurusKehadiranController;
use App\Http\Controllers\Pengurus\IuranController as PengurusIuranController;
use App\Http\Controllers\Pengurus\AnggotaController as PengurusAnggotaController;

// ANGGOTA
use App\Http\Controllers\Anggota\DashboardController as AnggotaDashboardController;
use App\Http\Controllers\Anggota\KegiatanController as AnggotaKegiatanController;
use App\Http\Controllers\Anggota\KehadiranController as AnggotaKehadiranController;
use App\Http\Controllers\Anggota\IuranController as AnggotaIuranController;
use App\Http\Controllers\Anggota\ProfileController as AnggotaProfileController;

/*
|--------------------------------------------------------------------------
| Public Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Auth Laravel
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| AUTO REDIRECT BERDASARKAN ROLE
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'pengurus') {
        return redirect()->route('pengurus.dashboard');
    } else {
        return redirect()->route('anggota.dashboard');
    }
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('users', UserController::class);
        Route::resource('pengurus', PengurusController::class);
        Route::resource('anggota', AnggotaController::class);
        Route::resource('kegiatan', KegiatanController::class);
        Route::resource('kehadiran', KehadiranController::class);
        Route::resource('iuran', IuranController::class);
        Route::resource('galeri', GaleriController::class);
    });

/*
|--------------------------------------------------------------------------
| PENGURUS ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pengurus'])
    ->prefix('pengurus')
    ->name('pengurus.')
    ->group(function () {

        Route::get('/dashboard', [PengurusDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('kegiatan', PengurusKegiatanController::class);
        Route::resource('kehadiran', PengurusKehadiranController::class);
        Route::resource('iuran', PengurusIuranController::class);

        Route::resource('anggota', PengurusAnggotaController::class)
            ->only(['index', 'show', 'edit', 'update']);
    });

/*
|--------------------------------------------------------------------------
| ANGGOTA ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:anggota'])->group(function () {

    // Dashboard anggota
    Route::get('/anggota/dashboard', [AnggotaProfileController::class, 'dashboard'])
        ->name('anggota.dashboard');

    // Membuat profil anggota
    Route::get('/anggota/profile/create', [AnggotaProfileController::class, 'create'])
        ->name('anggota.profile.create');

    Route::post('/anggota/profile/store', [AnggotaProfileController::class, 'store'])
        ->name('anggota.profile.store');

    // Edit profil anggota
    Route::get('/anggota/profile/edit', [AnggotaProfileController::class, 'edit'])
        ->name('anggota.profile.edit');

    Route::post('/anggota/profile/update', [AnggotaProfileController::class, 'update'])
        ->name('anggota.profile.update');
});
