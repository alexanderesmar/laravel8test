@extends('layouts.app')

@section('content')

@php
extract($data);
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Comprar </div>

                <div class="card-body">

                    {{-- {{ 'Bienvenido '. Auth::user()->name }} --}}


                    @include('layouts.status')


                    {{ Form::open(array('url' => '/buy', 'method' => 'post')) }}
                    @CSRF

                    <div class="pt-4">

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio (incluye iva) </th>
                                <th scope="col">Cantidad a comprar</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                <td scope="row" id="n_p{{ $producto->id }}" >
                                    {{ $producto->nombre }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td> <input class="number_input" id="c_p{{ $producto->id }}" name="producto[{{ $producto->id }}]" type="number" value="0" min="0" max="99"> </td>
                                </tr>

                                @endforeach

                            </tbody>
                          </table>

                          <button class="btn btn-success" type="submit">Comprar</button>

                    </div>


                    {{ Form::close() }}

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
