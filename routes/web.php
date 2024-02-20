<?php

use App\Http\controllers\EtudiantController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
    return view('admin.etudiant.liste');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

/*
etudiant admin
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/delete/{id}',[EtudiantController::class,'delete_etudiant'])->name('etudiant.delete');
Route::get('/update/{id}',[EtudiantController::class,'edit'])->name('etudiant.update');
Route::post('/update/traitement',[EtudiantController::class,'update'])->name('update.traitement');
Route::get('/etudiant',[EtudiantController::class,'index'])->name('etudiant.liste');
Route::get('/ajouter',[EtudiantController::class,'create'])->name('etudiant.ajouter');
Route::post('/ajouter/traitement',[EtudiantController::class,'store'])->name('etudiant.traitement');
//les route de posts
 Route::get('/delete_post/{id}',[PostController::class,'delete_post'])->name('post.delete_post');
 Route::get('/update_post/{id}',[PostController::class,'edit_post'])->name('post.update_post');
 Route::post('/update_post/traitement_post',[PostController::class,'update_post'])->name('update_post.traitement_post');
 Route::get('/post',[PostController::class,'index_post'])->name('post.liste_post');
 Route::get('/ajouter_posts',[PostController::class,'create_post'])->name('post.ajouter_post');
 Route::post('/ajouter_post/traitement_post',[PostController::class,'store_post'])->name('post.traitement_post');
//les route de user
// Route::get('/delete/{id}',[EtudiantController::class,'delete_etudiant'])->name('etudiant.delete');
// Route::get('/update/{id}',[EtudiantController::class,'edit'])->name('etudiant.update');
// Route::post('/update/traitement',[EtudiantController::class,'update'])->name('update.traitement');
// Route::get('/etudiant',[EtudiantController::class,'index'])->name('etudiant.liste');
// Route::get('/ajouter',[EtudiantController::class,'create'])->name('etudiant.ajouter');
// Route::post('/ajouter/traitement',[EtudiantController::class,'store'])->name('etudiant.traitement');






//fin user et etudiant
Route::prefix('admin')->group(function () {
});

Route::get('/layout', function () {
    return view('layouts.admin.master');
});








