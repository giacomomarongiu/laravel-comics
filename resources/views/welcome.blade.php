@extends('layouts.app')

@section('content')
    @foreach ($products as $key => $productsType)
        <section class="py-4">
            <div class="container">
                <h2 class="text-center">
                    {{ $key }}
                </h2>

                <div class="row g-4">
                    @foreach ($productsType as $product)
                        <div class="col-4 ">
                            <div class="card border-0">
                                <img src="{{$product['thumb']}}" class="card-img-top" alt="...">
                                <div class="card-title">
                                    {{ $product['title'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
@endsection
