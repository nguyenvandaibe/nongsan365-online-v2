@extends('layouts.seller')

@section('content')
    <div class="my-3 d-flex justify-content-between">
        <span class="h3">Danh sách nông sản</span>

        <a href="{{route('seller.products.create')}}" role="button" class="btn bg-main-color text-white">
            <i class="fas fa-plus"></i>
            Thêm
        </a>
    </div>

    <hr>

    @include('components.toast-messages')

@endsection

@push('seller-scripts')
    <script type="application/javascript" src="{{asset('js/toaster.js')}}" defer></script>
@endpush
