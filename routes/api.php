<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('posts', PostController::class);
