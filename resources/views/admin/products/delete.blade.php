@auth
{!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@endauth