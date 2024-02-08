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
use App\Http\Controllers\VoicerecorderController;
use App\Http\Controllers\ProjectorController;
use App\Http\Controllers\MycardreaderController;
use App\Http\Controllers\BarcodescannerController;
use App\Http\Controllers\WalkietalkieController;
use App\Http\Controllers\UpowersuppController;
use App\Http\Controllers\HarddiskController;
use App\Http\Controllers\SoftController;
use App\Http\Controllers\CafeteriaController;
use App\Http\Controllers\PhotostatemacController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\ReserveditemController;// Add this line
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

    Route::resource('projectors', ProjectorController::class); // Add this line
    Route::get('/projectors/{id}/export', [ProjectorController::class, 'export'])->name('projectors.export'); // Add this line

    Route::resource('mycardreaders', MycardreaderController::class); // Add this line
    Route::get('/mycardreaders/{id}/export', [MycardreaderController::class, 'export'])->name('mycardreaders.export'); // Add this line

    Route::resource('barcodescanners', BarcodescannerController::class); // Add this line
    Route::get('/barcodescanners/{id}/export', [BarcodescannerController::class, 'export'])->name('barcodescanners.export'); // Add this line

    // Route::resource('walkietalkies', WalkietalkieController::class);
    Route::get('/walkietalkies/export/{id}', [WalkietalkieController::class, 'export'])->name('walkietalkies.export');
    Route::get('/walkietalkies/show/{id}', [WalkietalkieController::class, 'show'])->name('walkietalkies.show');
    Route::get('/walkietalkies/index', [WalkietalkieController::class, 'index'])->name('walkietalkies.index');
    Route::get('/walkietalkies/create', [WalkietalkieController::class, 'create'])->name('walkietalkies.create');
    Route::get('/walkietalkies/edit/{id}', [WalkietalkieController::class, 'edit'])->name('walkietalkies.edit');
    Route::get('/walkietalkies/destroy/{id}', [WalkietalkieController::class, 'destroy'])->name('walkietalkies.destroy');
    Route::put('/walkietalkies/update', [WalkietalkieController::class, 'update'])->name('walkietalkies.update');
    Route::post('/walkietalkies/store', [WalkietalkieController::class, 'store'])->name('walkietalkies.store');

    Route::resource('upowersupps', UpowersuppController::class); // Add this line
    Route::get('/upowersupps/{id}/export', [UpowersuppController::class, 'export'])->name('upowersupps.export'); // Add this line

    Route::resource('harddisks', HarddiskController::class); // Add this line
    Route::get('/harddisks/{id}/export', [HarddiskController::class, 'export'])->name('harddisks.export'); // Add this line
    
    Route::resource('softs', SoftController::class); // Add this line
    Route::get('/softs/{id}/export', [SoftController::class, 'export'])->name('softs.export'); // Add this line

    Route::resource('cafeterias', CafeteriaController::class); // Add this line
    Route::get('/cafeterias/{id}/export', [CafeteriaController::class, 'export'])->name('cafeterias.export'); // Add this line

    Route::resource('photostatemacs', PhotostatemacController::class); // Add this line
    Route::get('/photostatemacs/{id}/export', [PhotostatemacController::class, 'export'])->name('photostatemacs.export'); // Add this line

    Route::resource('others', OtherController::class); // Add this line
    Route::get('/others/{id}/export', [OtherController::class, 'export'])->name('others.export'); // Add this line

    Route::get('/reserveditems', [ReserveditemController::class, 'index'])->name('reserveditems.index');;


    // Moved user list route outside middleware group
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__ . '/auth.php';
