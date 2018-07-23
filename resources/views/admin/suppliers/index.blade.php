@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('page_title', 'Marcas y proveedores')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
            <h3 class="card-title pull-right"><a href="{{ route('suppliers.create') }}" class="btn btn-default"> <i class="fa fa-plus-circle"></i> Nuevo Proveedor</a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>ID</th>
                <th>Logotipo</th>
                <th>Contacto directo</th>
                <th>Empresa</th>
                <th>Información</th>
                <th>Productos</th>
                <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
                @foreach($suppliers as $key => $supplier) 
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td style="width:120px">
                            <img src="{{ $supplier->logo }}" width="150" height="24" alt="">
                        </td>
                        <td>{{ $supplier->contactName }}</td>
                        <td>{{ $supplier->companyName }}</td>
                        <td style="width:600px">
                            <p class="text-center">           
                            <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample{{ $supplier->id }}" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-plus-circle"></i>
                            </button>
                            </p>
                            <div class="collapse" id="collapseExample{{ $supplier->id }}">
                            <div class="card card-body">
                                <ul>
                                    <li><b>Tel:</b> {{ $supplier->telephone }} / <b>Cel:</b> {{ $supplier->mobile }}</li>
                                    <li><b>Dirección:</b> {{ $supplier->address }}</li>
                                    <li><b>Ubicación:</b> {{ $supplier->country." - ".$supplier->city." - ".$supplier->municipaly }}</li>
                                    <li><b>Descripción:</b> {{ $supplier->description }}</li>
                                    <li><b>Observaciones:</b> {{ $supplier->observations }}</li>
                                </ul>
                            </div>
                            </div>
                        </td>
                        <td>
                        {{ $supplier->products->count() }}
                        </td>
                        <td style="width:120px">
                            <div class="dropdown">
                                <a class="btn btn-warning dropdown-toggle" style="width: 100%;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cogs"></i> Acciones
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('suppliers.show', $supplier->id) }}"><i class="fa fa-eye"></i> Productos relacionados</a>
                                    <a class="dropdown-item" href="{{ route('suppliers.edit', $supplier->id) }}"><i class="fa fa-edit"></i> Modificar</a>
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