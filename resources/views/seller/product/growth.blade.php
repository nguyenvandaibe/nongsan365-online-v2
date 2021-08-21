@extends('layouts.seller')

@section('content')
    <div class="mt-3 d-flex justify-content-between">
        <span class="h4">{{$product->name}}</span>

        @include('components.nav.product-nav')
    </div>

    <hr>

    <div>
        @if($product->growth->count() > 0)
            {{$product->growth->count()}}
        @else
            <div class="alert alert-info" role="alert">
                Không có thông tin
            </div>
        @endif
    </div>

    <div class="text-center">
        <button
            type="button"
            data-toggle="modal"
            data-target="#insertGrowthModal"
            class="btn bg-main-color text-white">
            Thêm thông tin
        </button>
    </div>

    <div class="modal fade" id="insertGrowthModal" data-backdrop="static" aria-labelledby="insertGrowthModalLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-main-color text-white">
                    <h5 class="modal-title" id="insertGrowthModalLabel">
                        Quá trình phát triển của nông sản
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="insertGrowthForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tên nông sản: {{$product->name}}</label>
                        </div>
                        <div class="form-group">
                            <label for="">Chiều cao (đơn vị: cm)</label>
                            <input type="number" class="form-control form-control-sm" value="0" min="0">
                        </div>
                        <div class="form-group">
                            <label for="">Cân nặng trung bình (đơn vị: kg)</label>
                            <input type="number" class="form-control form-control-sm" value="0" min="0">
                        </div>
                        <div class="form-group">
                            <label for="">Hinh ảnh</label>
                            <input id="productGrowthPhotos" type="file" class="form-control form-control-sm" multiple>
                            <div class="d-flex gallery"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Đóng
                    </button>
                    <button type="button" class="btn bg-main-color text-white">
                        <i class="far fa-save"></i>
                        Lưu
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('seller-scripts')
    <script type="application/javascript" src="{{asset('js/pages/insert-growth.js')}}" defer></script>
@endpush
