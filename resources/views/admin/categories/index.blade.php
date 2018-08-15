@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('page_title', 'Categorias')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
            <h3 class="card-title pull-left">Listado de Categorias </h3>
            <h3 class="card-title pull-right"><a href="{{ route('categories.create') }}" class="btn btn-default"> <i class="fa fa-plus-circle"></i> Nueva Categoría</a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>Categoria</th>
                <th>Descripción</th>
                <th>Valores asociados</th>
                <th>Visible</th>
                <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->sub_categories->count() }}</td>
                    <td><change-status-category-component :status="{{ $category->status }}" :categoryid="{{ $category->id }}"></change-status-category-component></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-warning dropdown-toggle" style="width: 100%;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cogs"></i> Acciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('subcategory.show', $category->id) }}"><i class="fa fa-plus"></i> Subcategorías</a>
                                <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}"><i class="fa fa-edit"></i> Modificar</a>
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