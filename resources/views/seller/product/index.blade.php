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

    <table id="dataTable" class="display" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên nông sản</th>
            <th>Giống</th>
            <th>Mùa vụ</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày thu hoạch</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->kind}}</td>
                <td>{{$product->crop}}</td>
                <td>{{$product->plant_date}}</td>
                <td>{{$product->harvest_date}}</td>
                <td class="d-flex justify-content-around">
                    <a href="#" class="text-dark" title="Xem">
                        <i class="fal fa-eye"></i>
                    </a>

                    <a href="#" class="text-dark" title="Cập nhật">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <a href="#" class="text-danger" title="Xóa">
                        <i class="far fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>#</th>
            <th>Tên nông sản</th>
            <th>Giống</th>
            <th>Mùa vụ</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày thu hoạch</th>
            <th>Thao tác</th>
        </tr>
        </tfoot>
    </table>

    @include('components.toast-messages')

@endsection

@push('seller-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endpush

@push('seller-scripts')
    <script type="application/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js" defer></script>
    <script type="application/javascript" src="{{asset('js/toaster.js')}}" defer></script>
    <script type="application/javascript" src="{{asset('js/datatable.js')}}" defer></script>
@endpush
