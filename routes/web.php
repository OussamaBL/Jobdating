<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CompagnieController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UsersController;

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;
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


Auth::routes();

Route::get('/', [CompagnieController::class, 'home'])->name('home');
Route::get('/home', [CompagnieController::class, 'home'])->name('home');

Route::fallback(function(){
    return redirect('/');
});
Route::get('/announce/details/{id}', [AnnouncementController::class, 'details'])->name('announce.details');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    
    Route::get('/dashboard', [CompagnieController::class, 'index'])->name('Compagnies.index');
    Route::get('/compagnies', [CompagnieController::class, 'compagnies'])->name('Compagnies.compagnies');
    Route::get('/announcements', [AnnouncementController::class, 'announcements'])->name('Announcements.announcements');

    Route::get('Compagnies/Add', function () { return view('Compagnies.formCompagnie');  })->name('Compagnies.formCompagnies');
    Route::post('Compagnies/create', [CompagnieController::class, 'store'])->name('compagnies.store'); 
    Route::delete('Compagnies/{compagnie}' , [CompagnieController::class, 'destroy'])->name('compagnie.destroy');
    Route::get('Compagnies/edit/{compagnie}' , [CompagnieController::class, 'edit'])->name('compagnie.edit');
    Route::put('Compagnies/update/{compagnie}' , [CompagnieController::class, 'update'])->name('compagnies.update');

    Route::get('skill/list' , [SkillController::class, 'index'])->name('skill.index');
    Route::get('skill/Add', function () { return view('skills.add');  })->name('skill.add');
    Route::post('skill/Add', [SkillController::class, 'store'])->name('skill.store'); 
    Route::delete('skill/{skill}' , [SkillController::class, 'destroy'])->name('skill.destroy');
    Route::get('skill/edit/{skill}' , [SkillController::class, 'edit'])->name('skill.edit');
    Route::put('skill/update/{skill}' , [SkillController::class, 'update'])->name('skill.update');

    
    Route::get('Announcement/Add', [AnnouncementController::class, 'add'])->name('Announcement.formAnnouncement');
    Route::post('Announcement/store', [AnnouncementController::class, 'store'])->name('Announcement.store');
    Route::delete('Announcement/delete/{announcement}' , [AnnouncementController::class, 'destroy'])->name('Announcement.destroy');
    Route::get('Announcement/edit/{announcement}' , [AnnouncementController::class, 'edit'])->name('Announcement.edit');
    Route::put('Announcement/update/{announcement}' ,  [AnnouncementController::class, 'update'])->name('Announcement.update');

});

Route::middleware(['auth', 'role:apprenant'])->group(function () {
    Route::get('/profile', [UsersController::class, 'profile'])->name('users.profile');
    Route::put('/user/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::put('/postuler/{id}', [AnnouncementController::class, 'postuler'])->name('postuler');
});

// Route::middleware(['auth', 'verified','role:admin'])->name('admin.')->prefix('admin')->group(function(){  
//     Route::get('/',[IndexController::class,'index'])->name('index'); 
//     Route::resource('roles',RoleController::class); 
//     Route::resource('permissions',PermissionController::class);   
// });