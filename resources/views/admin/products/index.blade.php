@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('page_title', 'Productos')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
            <h3 class="card-title pull-left">Listado de productos </h3>
            <h3 class="card-title pull-right"><a href="{{ route('product.create') }}" class="btn btn-default"> <i class="fa fa-plus-circle"></i> Nuevo Producto</a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Referencia</th>
                <th>Categoria</th>
                <th>Existencia</th>
                <th>Precio <small>sin imp. inc.</small>  / Precio Final</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
                @foreach($products as $key => $product)
                <tr class="text-center">
                    <td>{{ $key+1 }}</td>
                    <td class="text-center"><img src="{{ $product->first_image->url }}" width="60px" alt=""></td>
                    <td><a href="">{{ $product->title }}</a></td>
                    <td>{{ $product->reference }}</td>
                    <td>{{ $product->if_exist_category }}</td>
                    <td><span class="badge badge-dark">{{ $product->stock }} </span></td>
                    <td> <b>$ {{ number_format($product->price) }} / $ {{ number_format($product->price_tax_include) }}</b> </td>
                    <td>{{ $product->status }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-warning dropdown-toggle" style="width: 100%;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cogs"></i> Acciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('product.edit', $product->id) }}"><i class="fa fa-edit"></i> Modificar</a>
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