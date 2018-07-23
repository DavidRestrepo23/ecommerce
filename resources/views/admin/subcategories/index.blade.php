@extends('layouts.admin')
@section('route')
<a href="{{ route('category.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('page_title', 'Subcategoría')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
            <h3 class="card-title pull-left">Categoría padre <b class="text-uppercase">{{ $category->name }}</b> </h3>
            <h3 class="card-title pull-right"><a href="{{ route('subcategory.create') }}" class="btn btn-default"> <i class="fa fa-plus-circle"></i> Nueva Subcategoría</a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>Subcategoría</th>
                <th>Descripción</th>
                <th>Visible</th>
                <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
                @foreach($subCategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->description }}</td>
                    <td style="width:120px">
                        <change-status-subcategory-component 
                            :status="{{ $subcategory->status }}"
                            :categoryId="{{ $category->id }}"
                            :subcategoryid="{{ $subcategory->id }}"
                        >
                        </change-status-subcategory-component>
                    </td>
                    <td style="width:120px">
                        <div class="dropdown">
                                <a class="btn btn-warning dropdown-toggle" style="width: 100%;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cogs"></i> Acciones
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('subcategory.edit', $subcategory->id) }}"><i class="fa fa-edit"></i> Modificar</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-times"></i> Eliminar</a>
                                </div>
                        </div>
                    </td>
                </tr>
                @endforeach
          </tbody>
        </table>
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