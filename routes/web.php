<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


//All listings
Route::get('/', [ListingController::class, 'index']);


//Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('web');

//Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('web');

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('web');

//Update Listing
Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('web');

//Delete Listing
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('web');


//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show register form
Route::get('/register', [UserController::class, 'signup'])->middleware('guest');

//Create a new user
Route::post('/users', [UserController::class, 'store']);

//Logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('web');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);