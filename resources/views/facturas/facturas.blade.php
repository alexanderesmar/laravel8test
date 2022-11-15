@extends('layouts.app')

@section('content')

@php
extract($data);
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Facturas </div>

                <div class="card-body">

                    @include('layouts.status')


                    <div class="pt-4">

                        <button class="btn btn-info" type="button" onClick="parent.location='/facturar'">Facturar</button>

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Numero </th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Facturador</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Detalle</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($facturas as $factura)
                                <tr>
                                <td scope="row" id="n_f{{ $factura->id }}" >{{ $factura->numero }}</td>
                                <td> {{ $factura->nice_date() }} </td>
                                <td> {{ $factura->user->name }} </td>
                                <td> {{ $factura->compras[0]->user->name }} </td>
                                <td>
                                  <a href="/factura/{{ $factura->id }}" title="Ver detalle">
                                    <span class="material-symbols-outlined">
                                        search
                                        </span>
                                  </a>
                                </td>
                                </tr>

                                @endforeach

                            </tbody>
                          </table>

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
