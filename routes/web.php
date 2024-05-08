<?php

use Illuminate\Support\Facades\Route;

// Home/Welcome Route
Route::get('/', function () {

    // get some data from my db
    $products = config('mydb.products');
    $icons = config('mydb.icons');
    // let's see it
    // dd($icons);
    // dd($products);

    //helper function that creates a collection instance from the given array
    $productsCollection = collect($products);

    //i can utilize various collection methods
    //in this case i'm using filter
    $comicBooks = $productsCollection->filter(fn($product) => $product['type'] == 'comic book');
    $graphicNovelS = $productsCollection->filter(fn($product) => $product['type'] == 'graphic novel');


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
    $productsCollection = collect($products);

    $comicBooks = $productsCollection->filter(fn($product) => $product['type'] == 'comic book');

    $data = [
        'products' => [
            'Comic Books' => $comicBooks,
        ],
        'icons' => $icons,
    ];

    return view('comics', $data);
})->name('comics');

