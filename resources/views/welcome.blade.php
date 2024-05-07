@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3 py-3">
                    <div class="card border-0">
                        <div class="card-title">
                            {{ $product['name'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
