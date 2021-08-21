@extends('layouts.seller')

@section('content')
    <div class="mt-3 d-flex justify-content-between">
        <span class="h4">Thêm nông sản</span>
    </div>

    <hr>

    <div class="container-fluid">
        <form id="my-form" action="{{route('seller.products.store')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group row">
                <label for="productType" class="col-md-2 col-form-label">{{ __('Loại nông sản') }}</label>

                <div class="col-md-10">
                    <select
                        name="product_type"
                        id="productType"
                        class="form-control @error('product_type') is-invalid @enderror"
                        value="{{old('product_type')}}"
                    >
                        <option value="0">Cây trồng</option>
                        <option value="0">Vật nuôi</option>
                    </select>

                    @error('product_type')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="productName" class="col-md-2 col-form-label">{{ __('Tên nông sản') }}</label>

                <div class="col-md-10">
                    <input
                        id="productName"
                        type="text"
                        class="form-control @error('product_name') is-invalid @enderror"
                        name="product_name"
                        value="{{old('product_name')}}"
                    >

                    @error('product_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="productKind" class="col-md-2 col-form-label">{{ __('Tên giống') }}</label>

                <div class="col-md-10">
                    <input
                        id="productKind"
                        type="text"
                        class="form-control @error('product_kind') is-invalid @enderror"
                        name="product_kind"
                        value="{{old('product_kind')}}"
                    >

                    @error('product_kind')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-md-2 col-form-label">{{ __('Thời gian nuôi trồng') }}</label>

                <label for="productStartDate" class="col-md-1 col-form-label text-sm-right">{{ __('Từ') }}</label>

                <div class="col-md-4">
                    <input
                        id="productStartDate"
                        type="date"
                        class="form-control @error('product_start_date') is-invalid @enderror"
                        name="product_start_date"
                        value="{{old('product_start_date')}}"
                    >

                    @error('product_start_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="productFinishDate" class="col-md-1 col-form-label text-sm-right">{{ __('Đến') }}</label>

                <div class="col-md-4">
                    <input
                        id="productFinishDate"
                        type="date"
                        class="form-control @error('product_finish_date') is-invalid @enderror"
                        name="product_finish_date"
                        value="{{old('product_finish_date')}}"
                    >

                    @error('product_finish_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="productCrop" class="col-md-2 col-form-label">{{ __('Mùa vụ') }}</label>

                <div class="col-md-10">
                    <input
                        id="productCrop"
                        type="text"
                        class="form-control @error('product_crop') is-invalid @enderror"
                        name="product_crop"
                        value="{{old('product_crop')}}"
                    >

                    @error('product_crop')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-0 text-right">
                <button type="reset" class="btn btn-secondary">
                    <i class="far fa-undo"></i>
                    {{ __('Làm lại') }}
                </button>

                <button type="submit" class="btn bg-main-color text-white">
                    <i class="far fa-save"></i>
                    {{ __('Lưu') }}
                </button>
            </div>
        </form>
    </div>

    @include('components.toast-messages')

@endsection

@push('seller-scripts')
    <script type="application/javascript" src="{{asset('js/toaster.js')}}" defer></script>
@endpush
