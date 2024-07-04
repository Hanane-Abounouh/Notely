<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CategoryController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    // Affiche la liste des notes
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index'); 
    // Affiche le formulaire de création de nouvelle note
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    // Stocke une nouvelle note dans la base de données
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    // Affiche le formulaire d'édition d'une note spécifique
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    // Met à jour une note spécifique dans la base de données
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
    // Supprime une note spécifique de la base de données
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
});



// Categories Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// routes/web.php

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
