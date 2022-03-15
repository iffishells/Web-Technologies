<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuitarsController;
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

Route::get('/',[HomeController::class , 'index'])->name('home.index');
Route::get('/about',[HomeController::class , 'about'])->name('home.about');
Route::get('contact',[HomeController::class,'contact'])->name('home.contact');

Route::resources(['guitars'=> GuitarsController::class]);

// url look like /store/category/items

Route::get('/store/{category?}/{items?}',function ($category=null,$items=null) {

    if (isset($category)){
        
        if (isset($items)){
            return "You are viewing category {$category} for {$items}";
        }

        return "You are viewing the category : ". strip_tags($category);
    }

    return "you are viewing the store";

});