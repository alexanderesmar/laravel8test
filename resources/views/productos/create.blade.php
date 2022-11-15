@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Crear Producto </div>

                <div class="card-body">

                    @include('layouts.status')

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

                        {{ Form::open(array('url' => '/productos/store', 'method' => 'post')) }}
                        @CSRF
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingrese Nombre" name="nombre" value="{{ old('nombre') }}" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" class="form-control" id="precio" placeholder="Ingrese precio" name="precio" step="any" value="{{ old('precio') }}" min="0" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="impuesto">Impuesto</label>
                                <input type="number" class="form-control" id="impuesto" placeholder="Ingrese impuesto" name="impuesto" step="any" value="{{ old('impuesto') }}" min="0" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Crear</button>
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
