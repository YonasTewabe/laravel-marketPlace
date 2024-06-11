<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


//All listings
Route::get('/', [ListingController::class, 'index']);


//Show create form
Route::get('/listings/create', [ListingController::class, 'create']);

//Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update Listing
Route::put('listings/{listing}', [ListingController::class, 'update']);

//Delete Listing
Route::delete('listings/{listing}', [ListingController::class, 'destroy']);


//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show register form
Route::get('/register', [UserController::class, 'signup']);

//Create a new user
Route::post('/users', [UserController::class, 'store']);

//Logout user
Route::post('/logout', [UserController::class, 'logout']);

//show login form
Route::get('/login', [UserController::class, 'login']);

//login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);