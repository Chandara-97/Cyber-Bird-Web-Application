<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/')->group(function(){
    Route::get('/',function(){
        return view('UserInterface.home');
    });
    Route::get('/source',function(){
        return view('UserInterface.source');
    });
    Route::prefix('/scholarship')->group(function(){
        Route::get('/highschool',[\App\Http\Controllers\ScholarshipHighschoolController::class,'show']);
        Route::get('/bachelor',[\App\Http\Controllers\ScholarshipBachelorController::class,'show']);
        Route::get('/master',[\App\Http\Controllers\ScholarshipmasterController::class,'show']);
        Route::get('/phd',[\App\Http\Controllers\ScholarshipphdController::class,'show']);

        Route::get('/',[\App\Http\Controllers\ScholarshipPhdController::class,'allcontent']);

    });

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/product')->group(function (){
    Route::get("/",[ProductController::class,'index'])->name('products.index');
    Route::get("/index",[ProductController::class,'index'])->name('products.index');
    Route::get("/scholarship",[ProductController::class,'scholarship'])->name('products.scholarship');
    Route::get("/create",[ProductController::class,'create'])->name('products.create');
    Route::post("/store",[ProductController::class,'store'])->name('products.store');
    Route::get("/edit/{id}",[ProductController::class,'edit'])->name('products.edit');
    Route::put("/update/{id}",[ProductController::class,'update'])->name('products.update');
    Route::get("/delete/{id}",[ProductController::class,'delete'])->name('products.delete');
});

Route::middleware(['auth'])->prefix('/admin')->group(function(){
    Route::get("/",[\App\Http\Controllers\ScholarshipHighschoolController::class,'index'])->name('highschool.index');

    Route::prefix('/scholarship')->group(function(){
        Route::prefix('/highschool')->group(function(){
            Route::get('/index',[\App\Http\Controllers\ScholarshipHighschoolController::class,'index'])->name('highschool.index');
            Route::get('/show',[\App\Http\Controllers\ScholarshipHighschoolController::class,'show'])->name('highschool.show');
            Route::get('/create',[\App\Http\Controllers\ScholarshipHighschoolController::class,'create'])->name('highschool.create');
            Route::post('/store',[\App\Http\Controllers\ScholarshipHighschoolController::class,'store'])->name('highschool.store');
            Route::get('/edit/{id}',[\App\Http\Controllers\ScholarshipHighschoolController::class,'edit'])->name('highschool.edit');
            Route::put('/update/{id}',[\App\Http\Controllers\ScholarshipHighschoolController::class,'update'])->name('highschool.update');
            Route::get('/delete/{id}',[\App\Http\Controllers\ScholarshipHighschoolController::class,'delete'])->name('highschool.delete');
        });

        Route::prefix('/bachelor')->group(function(){
            Route::get('/index',[\App\Http\Controllers\ScholarshipBachelorController::class,'index'])->name('bachelor.index');
            Route::get('/show',[\App\Http\Controllers\ScholarshipBachelorController::class,'show'])->name('bachelor.show');
            Route::get('/',[\App\Http\Controllers\ScholarshipBachelorController::class,'bachelorsallcontent'])->name('bachelor.bachelorsallcontent');
            Route::get('/create',[\App\Http\Controllers\ScholarshipBachelorController::class,'create'])->name('bachelor.create');
            Route::post('/store',[\App\Http\Controllers\ScholarshipBachelorController::class,'store'])->name('bachelor.store');
            Route::get('/edit/{id}',[\App\Http\Controllers\ScholarshipBachelorController::class,'edit'])->name('bachelor.edit');
            Route::put('/update/{id}',[\App\Http\Controllers\ScholarshipBachelorController::class,'update'])->name('bachelor.update');
            Route::get('/delete/{id}',[\App\Http\Controllers\ScholarshipBachelorController::class,'delete'])->name('bachelor.delete');
        });

        Route::prefix('/master')->group(function(){
            Route::get('/index',[\App\Http\Controllers\ScholarshipmasterController::class,'index'])->name('master.index');
            Route::get('/show',[\App\Http\Controllers\ScholarshipmasterController::class,'show'])->name('master.show');
            Route::get('/create',[\App\Http\Controllers\ScholarshipmasterController::class,'create'])->name('master.create');
            Route::post('/store',[\App\Http\Controllers\ScholarshipmasterController::class,'store'])->name('master.store');
            Route::get('/edit/{id}',[\App\Http\Controllers\ScholarshipmasterController::class,'edit'])->name('master.edit');
            Route::put('/update/{id}',[\App\Http\Controllers\ScholarshipmasterController::class,'update'])->name('master.update');
            Route::get('/delete/{id}',[\App\Http\Controllers\ScholarshipmasterController::class,'delete'])->name('master.delete');
        });
        Route::prefix('/phd')->group(function(){
            Route::get('/index',[\App\Http\Controllers\ScholarshipphdController::class,'index'])->name('phd.index');
            Route::get('/show',[\App\Http\Controllers\ScholarshipphdController::class,'show'])->name('phd.show');
            Route::get('/create',[\App\Http\Controllers\ScholarshipphdController::class,'create'])->name('phd.create');
            Route::post('/store',[\App\Http\Controllers\ScholarshipphdController::class,'store'])->name('phd.store');
            Route::get('/edit/{id}',[\App\Http\Controllers\ScholarshipphdController::class,'edit'])->name('phd.edit');
            Route::put('/update/{id}',[\App\Http\Controllers\ScholarshipphdController::class,'update'])->name('phd.update');
            Route::get('/delete/{id}',[\App\Http\Controllers\ScholarshipphdController::class,'delete'])->name('phd.delete');
        });

    });
});

Route::get("users", [\App\Http\Controllers\ScholarshipBachelorController::class, "datable"]);


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




