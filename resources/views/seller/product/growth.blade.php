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

    <div class="modal fade" id="insertGrowthModal" data-backdrop="static" aria-labelledby="insertGrowthModalLabel"
         tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
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
                    <form
                        id="insertGrowthForm"
                        enctype="multipart/form-data"
                        data-action="{{route('api.v1.seller.products.growth.store', ['product' => $product->id])}}"
                    >
                        <div class="form-group">
                            <label for="">Tên nông sản: {{$product->name}}</label>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-8 col-form-label">Chiều cao (đơn vị: cm)</label>
                            <div class="col-sm-4">
                                <input type="number" id="productHeight" class="form-control form-control-sm" value="0"
                                       min="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-8 col-form-label">Cân nặng trung bình (đơn vị: kg)</label>
                            <div class="col-sm-4">
                                <input type="number" id="productWeight" class="form-control form-control-sm" value="0"
                                       min="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Hinh ảnh</label>
                            <input type="file" id="productPhotos" class="form-control form-control-sm input-photos"
                                   multiple>
                            <div class="d-flex gallery"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Đóng
                    </button>
                    <button
                        id="btnSubmit"
                        type="button"
                        class="btn bg-main-color text-white">
                        <i class="far fa-save"></i>
                        Lưu
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('seller-scripts')
    <script type="application/javascript" src="{{asset('js/shared/preview-photos.js')}}" defer></script>
    <script type="application/javascript" src="{{asset('js/pages/insert-growth.js')}}" defer></script>
@endpush
