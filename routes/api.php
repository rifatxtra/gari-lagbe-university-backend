<?php

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user/login', [Customers::class, 'login']);
Route::post('/user/signup', [Customers::class, 'store']);
