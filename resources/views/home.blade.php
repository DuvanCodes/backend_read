@extends('layouts.p3app_inner')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title --> 

<!--<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div id="cardCollpase5" class="collapse pt-1 show" dir="ltr">
                </div>
            </div>
        </div>
    </div>-->
@endsection



@section('scripts')
  
    <!-- Third Party js-->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
    <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>

    <!-- init js -->
    <!--<script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>-->

@endsection


