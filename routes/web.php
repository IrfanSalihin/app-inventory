<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ITUserController;
use App\Http\Controllers\GAUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotebookController;
use App\Http\Controllers\DesktopController;
use App\Http\Controllers\PrinterController; 
use App\Http\Controllers\SmartphoneController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\IpadController;
use App\Http\Controllers\VoicerecorderController;// Add this line
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Custom registration route without 'auth' middleware
Route::get('/users/register', [UserController::class, 'showRegistrationForm'])->name('users.register');
Route::post('/users/register', [UserController::class, 'register'])->name('users.register.submit');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Check for IT Admin middleware directly in the route
    Route::middleware(['auth', 'check.it.admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    // Check for IT User middleware directly in the route
    Route::middleware(['auth', 'check.it.user'])->group(function () {
        Route::get('/it/user/dashboard', [ITUserController::class, 'index'])->name('it.user.dashboard');
    });

    // Check for GA User middleware directly in the route
    Route::middleware(['auth', 'check.ga.user'])->group(function () {
        Route::get('/ga/user/dashboard', [GAUserController::class, 'index'])->name('ga.user.dashboard');
    });

    Route::resource('notebooks', NotebookController::class);
    Route::get('/notebooks/{id}/export', [NotebookController::class, 'export'])->name('notebooks.export');

    Route::resource('desktops', DesktopController::class); // Add this line
    Route::get('/desktops/{id}/export', [DesktopController::class, 'export'])->name('desktops.export');
    // Routes for PrinterController
    Route::resource('printers', PrinterController::class); // Add this line
    Route::get('/printers/{id}/export', [PrinterController::class, 'export'])->name('printers.export'); // Add this line

    Route::resource('smartphones', SmartphoneController::class); // Add this line
    Route::get('/smartphones/{id}/export', [SmartphoneController::class, 'export'])->name('smartphones.export'); // Add this line

    Route::resource('cameras', CameraController::class); // Add this line
    Route::get('/cameras/{id}/export', [CameraController::class, 'export'])->name('cameras.export'); // Add this line
    
    Route::resource('ipads', IpadController::class); // Add this line
    Route::get('/ipads/{id}/export', [IpadController::class, 'export'])->name('ipads.export'); // Add this line

    Route::resource('voicerecorders', VoicerecorderController::class); // Add this line
    Route::get('/voicerecorders/{id}/export', [VoicerecorderController::class, 'export'])->name('voicerecorders.export'); // Add this line


    // Moved user list route outside middleware group
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__ . '/auth.php';
