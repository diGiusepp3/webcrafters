<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    Route::get('/', function () {
        return view('index', [
            'pagetitle' => 'Welkom bij Webcrafters.be',
            'description' => 'Waar uw idee digitaal gaat',
            'keywords' => 'Webcrafters, website, digitaal, applicaties'
        ]);
    });

    Route::get('/about', function () {
        return view('/menu/about', [
            'pagetitle' => 'Over ons',
            'description' => 'Over ons.', //todo: inhoud over ons invoegen.
            'keywords' => 'Webcrafters, Over ons, digitaal, applicaties'
        ]);
    });

    Route::get('/services', function () {
        return view('/menu/services', [
            'pagetitle' => 'Onze Diensten',
            'description' => 'Onze diensten.', // Voeg hier de beschrijving van je diensten toe.
            'keywords' => 'Webcrafters, Diensten, digitaal, applicaties'
        ]);
    });

    Route::get('/contact', function () {
        return view('/menu/contact', [
            'pagetitle' => 'Contacteer Ons',
            'description' => 'Contacteer ons.', // Voeg hier de contactinformatie of een contactformulier toe.
            'keywords' => 'Webcrafters, Contact, digitaal, applicaties'
        ]);
    });

