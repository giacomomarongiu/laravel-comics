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


//All Novels route 
Route::get('/collectibles', function () {

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
    $graphicNovels = $productsCollection->filter(fn($product) => $product['type'] == 'graphic novel');
    //dd($graphicNovels);
    $data = [
        'products' => [
            'Graphic Novels' => $graphicNovels,
        ],
        'icons' => $icons,
    ];

    return view('collectibles', $data);
})->name('collectibles');


//Sigle Route
//Passing dinamically my route i can use the same view "product" for all the router with info buttons
Route::get('/{page}/{id}', function ($category,$id) {

    $products = config('mydb.products');
    $icons = config('mydb.icons');

     //404 if is not correct
    abort_unless($id >= 0 && $id < count($products), 404);
    //product assignment
    $product= $products[$id];
    //dd($product);

    $data = [
        'product' => $product,
        'icons' => $icons,
    ];

    return view('product', $data);
})->name('product');