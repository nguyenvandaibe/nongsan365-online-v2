@extends('layouts.seller')

@section('content')
    <div class="mt-3 d-flex justify-content-between">
        <span class="h4">{{$product->name}}</span>

        @include('components.nav.product-nav')
    </div>

    <hr>

@endsection
