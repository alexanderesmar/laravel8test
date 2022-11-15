@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Actualizar Producto </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="pt-4">

                        {{ Form::model($producto, ['route' => ['productos_actualizar', $producto->id], 'method'=>'put']) }}
                        @CSRF
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                {{ Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Ingrese Nombre', 'required', 'id'=>'nombre' ] ) }}

                            </div>
                            <br>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                {{ Form::number('precio', null, ['class'=>'form-control','placeholder'=>'Ingrese precio', 'min'=>'0', 'required', 'id'=>'precio','step'=>'any' ] ) }}
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="impuesto">Impuesto</label>
                                {{ Form::number('impuesto', null, ['class'=>'form-control','placeholder'=>'Ingrese impuesto', 'min'=>'0', 'required', 'id'=>'impuesto', 'step'=>'any' ] ) }}
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        {{ Form::close() }}

                        <br>
                        <button class="btn btn-info" type="button" onClick="parent.location='/productos'">Volver</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
/*
$(document).ready(function(){


  $(".number_input").change(function(e) {

console.log(e.value);
});

});

 */

</script>
@endsection
