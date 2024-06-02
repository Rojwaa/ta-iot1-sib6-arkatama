<?php

use App\Http\Controllers\LEDController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SensorController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;

Route::get('/', function () {
    return view('layouts.landing');
});

// Route::get('dashboard',function (){
//     return view('layouts.dashboard');
// })->Middleware(['auth','verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $data['title'] = 'Dashboard';
        $data['breadcrumbs'][]=[
            'title'=> 'Dashboard',
            'url'=> route('dashboard')
        ];
    return view('pages.dasboard', $data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/arkatama', function () {
    return view('pages.arkatama');
})->middleware(['auth', 'verified']);


Route::get('/LED-Control', function () {
    return view('pages.LED-Control');
})->middleware(['auth', 'verified']);

Route::get('/sensor', function () {
    return view('pages.sensor');
})->middleware(['auth', 'verified']);

Route::get('/User', function () {
    return view('pages.User');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //users
    Route::get('users',[UserController::class, 'index'])->name('users.index');
    //LED Control
    Route::get('LEDControllers',[LEDController::class, 'index'])->name('LEDControllers.index');
    //Sensor
    Route::get('sensors',[SensorController::class, 'index'])->name('sensors.index');
});



require __DIR__.'/auth.php';
