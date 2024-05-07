@extends('layouts.app')

@section('content')
    @foreach ($products as $key => $productsType)
        <section class="py-4">
            <div class="container w-75">
                <h2 class="text-center py-3 text-primary">
                    {{ $key }}.
                </h2>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($productsType as $product)
                        <div class="col ">
                            <div class="card border-0 h-100 m-auto">
                                <img class="h-25" src="{{ $product['thumb'] }}" class="card-img-top" alt="...">
                                <div class="card-body h-100 d-flex flex-column justify-content-between">
                                    <h5 class="card-title fw-bold"> {{ $product['title'] }}</h5>
                                    <h6 class="m-0 p-0">Descrizione:</h6>
                                    <p class=" card-text h-75 overflow-y-auto">{{ $product['description'] }}</p>
                                    <a href="#" class="btn btn-primary mb-0">BUY NOW</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
@endsection
