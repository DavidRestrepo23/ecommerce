@extends('layouts.admin')
@section('page_title', 'Error 404 - Pagína no encontrada')
@section('content')
    <section class="container-fluid">
        <div class="col-xs-12">

            <div class="error-page" style="margin-top:80px">
                <h2 class="headline text-warning"> 404 </h2>
                <br>
                <div class="error-content">
                    <h3><i class="fa fa-warning text-warning"></i> Oops! Pagína no encontrada.</h3>
                    <p>
                    La página a la cual intentas acceder no esta disponible. <br>
                    <a href="../../index.html">Volver al inicio</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection