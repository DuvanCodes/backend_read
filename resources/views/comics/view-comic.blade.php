@extends('layouts.p3app_inner')

@section('css')
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Información Comic</a></li>
                </ol>
            </div>
            <h4 class="page-title">Registro de Comic</h4>
            
        </div>
    </div>
</div>
<!-- end page title --> 


  
    <div class="row justify-content-md-center">


        <div class="col-xl-8">
           <div class="card mt-3">
                <div class="card-body">
                    <h4 class="mb-3 header-title">Registro de Comic</h4>

                    <form action="{{route('create-comic')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                       <div class="form-group mb-3">
                            <label for="subject">Nombre</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject">Autor</label>
                            <input type="text" id="author" name="author" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject">Descripción</label>
                            <textarea type="text" rows="3" id="description" name="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject">Estado</label>
                            <select class="form-control" name="status">
                                <option>Seleccione</option>
                                <option value="Publicándose">Publicándose</option>
                                <option value="Abandonado">Abandonado</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject">Scan</label>
                            <input type="text" id="scan" name="scan" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject">Enlace Scan</label>
                            <input type="text" id="url" name="url" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject">Categorias</label>
                            <select class="form-control js-example-basic-multiple-limit" name="multi_category[]" multiple="multiple">
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name_category}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group mb-3">
                            <label for="file">Seleccionar Portada (max 3Mb.)</label>
                            <input type="file" name="file" id="file" class="form-control-file" accept=".jpg, .png, .jpeg" required>
                        </div>

                        <button type="button submit" class="btn btn-block btn--md btn-primary waves-effect waves-light">Guardar</button>
                    </form>

                </div> <!-- end card-body-->
            </div>

            
        </div>
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="{{ asset('assets/libs/datatables/jszip.min.js')}}"></script>
        
        <script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js')}}"></script>

        <script>
            $(".js-example-basic-multiple-limit").select2({
                placeholder: 'Seleccione'
            });
        </script>

@endsection