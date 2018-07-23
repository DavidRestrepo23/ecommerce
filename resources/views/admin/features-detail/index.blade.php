@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('route')
<a href="{{ route('features.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('page_title', 'Valores')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
            <h3 class="card-title pull-left">Valores para <b class="text-uppercase">{{ $feature->name }}</b> </h3>
            <h3 class="card-title pull-right"><a href="{{ route('features-details.create') }}" class="btn btn-default"> <i class="fa fa-plus-circle"></i> Nuevo Valor</a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                          @foreach($features_details as $feature_detail)
                          <tr>
                              <td>{{ $feature_detail->name }}</td>
                              <td style="width:180px">
                                  <div class="dropdown">
                                          <a class="btn btn-warning dropdown-toggle" style="width:100%" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fa fa-cogs"></i> Acciones
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('features-details.edit', $feature_detail->id) }}"><i class="fa fa-edit"></i> Modificar</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-times"></i> Eliminar</a>
                                          </div>
                                  </div>
                              </td>
                          </tr>
                          @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection
@section('scripts')
<script src="{{ asset('vendor/adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap4.js') }} "></script>
    <script>
        $('#example2').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            }
        });
    </script>
@endsection