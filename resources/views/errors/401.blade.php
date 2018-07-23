@extends('layouts.admin')
@section('page_title', 'Error 401 - Accesso Denegado')
@section('content')
    <section class="container-fluid">
        <div class="col-xs-12">

            <div class="error-page" style="margin-top:80px">
                <h2 class="headline text-danger"> 401 </h2>
                <br>
                <div class="error-content">
                    <h3><i class="fa fa-warning text-danger"></i> Oops! Accesso Denegado.</h3>
                    <p>
                    No tienes permisos para acceder a este sitio. <br>
                    <a href="../../index.html">Salir de acá!</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection