<?php

use App\Http\Controllers\Admin\Prospects\ProspectsController;
use App\Http\Controllers\Admin\Prospects\ProspectContactsController;
use App\Http\Controllers\Admin\Prospects\Activities\ProspectActivitiesController;

//Prefix: prospects
//name: admin.prospects.create

Route::get('/',[ProspectsController::class,'index'])->name('dashboard');
Route::get('create',[ProspectsController::class,'create'])->name('create');
Route::get('{prospect}/edit',[ProspectsController::class,'edit'])->where('prospect','[0-9]+')->name('edit');
Route::get('{prospect}/show',[ProspectsController::class,'show'])->where('prospect','[0-9]+')->name('show');
Route::post('/',[ProspectsController::class,'store'])->name('store');
Route::put('{prospect}',[ProspectsController::class,'update'])->where('prospect','[0-9]+')->name('update');
Route::delete('{prospect}',[ProspectsController::class,'destroy'])->where('prospect','[0-9]+')->name('delete');
Route::put('{prospect}/profile-image',[ProspectsController::class,'updateProfileImage'])->where('prospect','[0-9]+')->name('update.profile-image');
Route::delete('{prospect}/profile-image',[ProspectsController::class,'destroyProfileImage'])->where('prospect','[0-9]+')->name('delete.profile-image');

Route::get('{prospect}/contact/create',[ProspectContactsController::class,'create'])->where('prospect','[0-9]+')->name('contacts.create');
Route::post('{prospect}/contact',[ProspectContactsController::class,'store'])->where('prospect','[0-9]+')->name('contacts.store');
Route::put('{prospect}/contact',[ProspectContactsController::class,'update'])->where('prospect','[0-9]+')->name('contacts.update');


//activities
Route::prefix('activities')->name('activities.')->group(base_path('routes/web/prospects/activities.php'));


