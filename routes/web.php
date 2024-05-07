<?php

use Illuminate\Support\Facades\Route;

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

    $products = config('mydb.products');
    $icons = config('mydb.icons');
    //dd($icons);
    $productsCollection = collect($products);

    $comicBooks = $productsCollection->filter(fn($product) => $product['type'] == 'comic book');
    //dd($movies);
    $graphicNovelS = $productsCollection->filter(fn($product) => $product['type'] == 'graphic novel');

    //dd($products);

    $data = [
        'products' => [
            'Comic Books' => $comicBooks,
            'Graphic Novels' => $graphicNovelS,
        ],
        'icons'=> $icons,
    ];

    return view('welcome', $data);
})->name('welcome');

Route::get('/comics', function () {

    $products = config('mydb.products');
    $icons = config('mydb.icons');
    //dd($icons);
    $productsCollection = collect($products);

    $comicBooks = $productsCollection->filter(fn($product) => $product['type'] == 'comic book');
    //dd($movies);
    $graphicNovelS = $productsCollection->filter(fn($product) => $product['type'] == 'graphic novel');

    //dd($products);

    $data = [
        'products' => [
            'Comic Books' => $comicBooks,
        ],
        'icons' => $icons,
    ];

    return view('comics', $data);
})->name('comics');

