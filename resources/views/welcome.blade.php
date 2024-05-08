@extends('layouts.app')

@section('content')
    <section class="py-4">
        <div class="container w-75">
            <h2 class="text-center py-3 text-primary">
                All Products.
            </h2>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($products as $index => $product)
                    <div class="col ">
                        <div class="card border-0 h-100 m-auto">
                            <img class="h-75" src="{{ $product['thumb'] }}" class="card-img-top" alt="...">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title fw-bold"> {{ $product['title'] }}</h5>
                                <a href="{{ route('product', ['page' => Route::currentRouteName(),'id' => $index]) }}" class="btn btn-primary mb-0">MORE
                                    INFO</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
