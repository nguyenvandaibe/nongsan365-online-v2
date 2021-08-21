@extends('layouts.seller')

@section('content')
    <div class="mt-3 d-flex justify-content-between">
        <span class="h4">{{$product->name}}</span>

        @include('components.nav.product-nav')
    </div>

    <hr>

    <div>
        @if($product->growth->count() > 0)

            <input type="hidden" value="{{$product}}" id="productData">

            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
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
                        @if($product->type == \App\Shared\Consts\ProductConst::TYPE_ANIMAL)
                            <div class="form-group row">
                                <label for="" class="col-sm-8 col-form-label">Cân nặng trung bình (đơn vị: kg)</label>
                                <div class="col-sm-4">
                                    <input type="number" id="productWeight" class="form-control form-control-sm"
                                           value="0"
                                           min="0">
                                </div>
                            </div>
                        @else
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Thời kỳ phát triển</label>
                                <div class="col-sm-8">
                                    <input type="text" id="productStep" class="form-control form-control-sm"
                                           placeholder="Gieo hạt, ra hoa,...">
                                </div>
                            </div>
                        @endif
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
    <script type="application/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script type="application/javascript" src="{{asset('js/shared/preview-photos.js')}}" defer></script>
    <script type="application/javascript" src="{{asset('js/pages/insert-growth.js')}}" defer></script>

    <script type="application/javascript">

        let productData = JSON.parse($('#productData').val());

        var points = new Array();

        $.each(productData.growth, function (index, item) {

            points.push({x: new Date(item.created_at), y: item.height});
        });

        window.onload = function () {

            var options = {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Chiêu cao của cây trồng"
                },
                axisX: {
                    valueFormatString: "DD MMM"
                },
                axisY: {
                    title: "Chiều cao",
                    suffix: "cm",
                    minimum: 0
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries
                },
                data: [
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Chiều cao",
                        markerType: "square",
                        xValueFormatString: "DD MMM, YYYY",
                        color: "#F08080",
                        yValueFormatString: "#cm",
                        dataPoints: points
                    }
                ]
            };
            $("#chartContainer").CanvasJSChart(options);

            function toogleDataSeries(e) {
                if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                e.chart.render();
            }

        }
    </script>
@endpush
