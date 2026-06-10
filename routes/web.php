<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.home')->name('home');

Route::view('/about', 'pages.about')->name('about');

Route::view('/companies', 'pages.companies')->name('companies');

Route::view('/companies/academy', 'companies.academy')->name('companies.academy');

Route::view('/companies/masharket', 'companies.masharket')->name('companies.masharket');

Route::view('/companies/festival', 'companies.festival')->name('companies.festival');

Route::view('/contact', 'pages.contact')->name('contact');
