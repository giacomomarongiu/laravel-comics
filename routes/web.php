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

    $data = [
        'products' => $products,
        'icons' => $icons,
    ];

    return view('welcome', $data);
})->name('welcome');


//All comics route 
Route::get('/comics', function () {

    // get some data from my db
    $products = config('mydb.products');
    $icons = config('mydb.icons');
    // let's see it
    // dd($icons);
    // dd($products);

    //helper function that creates a collection instance from the given array
    $productsCollection = collect($products);
    //dd($productsCollection);

    //i can utilize various collection methods
    //in this case i'm using filter
    $comicBooks = $productsCollection->filter(fn($product) => $product['type'] == 'comic book');

    $data = [
        'products' => [
            'Comic Books' => $comicBooks,
        ],
        'icons' => $icons,
    ];

    return view('comics', $data);
})->name('comics');


//Sigle comic Route
Route::get('/comics/{id}', function ($id) {

    $products = config('mydb.products');
    $icons = config('mydb.icons');

    /*     $productsCollection = collect($products);
        $comicBooks = $productsCollection->filter(fn($product) => $product['type'] == 'comic book');
        $graphicNovels = $productsCollection->filter(fn($product) => $product['type'] == 'graphic novel');
     */

     //404 if is not correct
    abort_unless($id >= 0 && $id < count($products), 404);
    $product= $products[$id];
    //dd($product);

    $data = [
        'product' => $product,
        'icons' => $icons,
    ];

    return view('product', $data);
})->name('product');