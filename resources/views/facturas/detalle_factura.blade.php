@extends('layouts.app')

@section('content')

@php
extract($data);
$total_compra=0;
$total_impuestos_factura=0;
$total_factura=0;
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Detalle factura #{{ $factura->numero }} </div>

                <div class="card-body">

                    <br>

                    <p>
                    Numero: {{ $factura->numero }} <br>
                    Fecha: {{ $factura->nice_date() }} <br>
                    Facturador: {{ $factura->user->name }} <br>
                    Cliente: {{ $factura->compras[0]->user->name }} <br>
                    </p>



                    <br>

                    <div class="pt-4">

                        @foreach ($factura->compras as $compra)

                        @php
                            $total_precio=0;
                            $total_impuesto=0;
                            $total_compra=0;
                        @endphp

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" colspan="2">Compra ID {{ $compra->id }} </th>
                                <th scope="col" colspan="4">Fecha {{ $compra->nice_date() }}</th>
                              </tr>
                              <tr>
                                <th scope="col">Nombre </th>
                                <th scope="col">Cantidad </th>
                                <th scope="col">Precio unitario </th>
                                <th scope="col">Impuesto </th>
                                <th scope="col">Costo (incluye impuesto) </th>
                                <th scope="col">Total </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($compra->comprasdetalles as $elemento)

                                @php
                                    $costo_total_producto=$elemento->cantidad * $elemento->costo_unitario;
                                    $total_compra+=$costo_total_producto;
                                    $total_factura+=$costo_total_producto;
                                    $precio_base=$elemento->precio_base();
                                    /* $total_precio+=$precio_base*$elemento->cantidad; */
                                    $total_impuesto+=$elemento->impuesto_puro()*$elemento->cantidad;
                                    $total_impuestos_factura+=$elemento->impuesto_puro()*$elemento->cantidad;
                                @endphp

                                <tr>
                                <td scope="row" id="n_e{{ $elemento->id }}" > {{ $elemento->producto->nombre }}</td>
                                <td> {{ $elemento->cantidad }} </td>
                                <td> {{ $precio_base }} </td>
                                <td> {{ $elemento->impuesto_fecha }} % </td>
                                <td> {{ $elemento->costo_unitario }} </td>
                                <td> {{ $costo_total_producto }} </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                  <td colspan="3">Total Impuestos: </td>
                                  <td> {{ $total_impuesto }} </td>
                                  <td> Total Compra:  </td>
                                  <td> {{ $total_compra }} </td>
                                </tr>
                              </tfoot>
                          </table>
                          <br>

                        @endforeach

                    </div>

                    <br>

                    <p>
                        Valor Total de impuestos: {{ $total_impuestos_factura }}
                        <br>
                        Valor Total de la factura: {{ $total_factura }}
                    </p>


                    <br>

                    <br>

                    <button class="btn btn-info" type="button" onClick="parent.location='/facturas'">Volver</button>

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
