@extends('layouts.admin')
@section('page_title', 'Error 500 - Error')
@section('content')
    <section class="container-fluid">
        <div class="col-xs-12">
            
            <div class="error-page" style="margin-top:80px">
                <h2 class="headline text-danger"> 500 </h2>
                <br>
                <div class="error-content">
                    <h3><i class="fa fa-times text-danger"></i> Houston tenemos un problema :'c </h3>
                    <p>
                    Ha ocurrido un error inesperado, intenta más tarde o contacte al desarrollador <br> <hr> David Restrepo <a href="">+573194891019</a> <br>
                    <a href="../../index.html">Volver al inicio</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection