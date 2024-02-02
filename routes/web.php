<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CompagnieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::fallback(function(){
    return redirect('/');
});

Route::get('/dashboard', [CompagnieController::class, 'index'])->name('Compagnies.index');
Route::get('Compagnies/Add', function () { return view('Compagnies.formCompagnie');  })->name('Compagnies.formCompagnies');
Route::post('Compagnies/create', [CompagnieController::class, 'store'])->name('compagnies.store'); 
Route::delete('Compagnies/{compagnie}' , [CompagnieController::class, 'destroy'])->name('compagnie.destroy');
Route::get('Compagnies/edit/{compagnie}' , [CompagnieController::class, 'edit'])->name('compagnie.edit');
Route::put('Compagnies/update/{compagnie}' , [CompagnieController::class, 'update'])->name('compagnies.update');


Route::get('Announcement/Add', [AnnouncementController::class, 'index'])->name('Announcement.formAnnouncement');
Route::post('Announcement/store', [AnnouncementController::class, 'store'])->name('Announcement.store');
Route::delete('Announcement/{announcement}' , [AnnouncementController::class, 'destroy'])->name('Announcement.destroy');
Route::get('Announcement/edit/{announcement}' , [AnnouncementController::class, 'edit'])->name('Announcement.edit');
Route::put('Announcement/update/{announcement}' ,  [AnnouncementController::class, 'update'])->name('Announcement.update');
