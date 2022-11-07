@extends('layouts.p3app_inner')

@section('css')
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Comics</a></li>
                </ol>
            </div>
            <h4 class="page-title">Lista de Comics</h4>
            
        </div>
    </div>
</div>
<!-- end page title --> 


  
    <div class="row justify-content-md-center">
        @foreach ($comics as $item)
            <div class="col-xl-3">
                <div class="card" >
                    <img class="card-img-top" src="{{$item->filename}}" height="300" alt="Card image cap">
                    <div class="card-body">
                    <p class="card-text">{{$item->name}}</p>
                    <hr style="border-top: 1px solid #3d3d3d !important;">
                        @foreach ($item->names_categories($item->id) as $collections)
                            <span class="badge badge-primary">{{$collections->name_category}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    

<!-- end row-->
@endsection



@section('scripts')
    <!-- third party js -->
        <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.flash.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.print.min.js')}}"></script>

        <script src="{{ asset('assets/libs/datatables/jszip.min.js')}}"></script>
        
        <script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js')}}"></script>


@endsection