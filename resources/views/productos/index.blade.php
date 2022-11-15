@extends('layouts.app')

@section('content')

@php
extract($data);
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Productos </div>

                <div class="card-body">

                    @include('layouts.status')


                    <div class="pt-4">

                        <button class="btn btn-info" type="button" onClick="parent.location='/productos/crear'">Crear Producto</button>

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID </th>
                                <th scope="col">Nombre </th>
                                <th scope="col">Precio</th>
                                <th scope="col">Impuesto</th>
                                <th scope="col">Accion</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                <td scope="row" id="n_p{{ $producto->id }}" >{{ $producto->id }}</td>
                                <td> {{ $producto->nombre }} </td>
                                <td> {{ $producto->precio }} </td>
                                <td> {{ $producto->impuesto }} % </td>
                                <td>

                                    <a class="text-decoration-none " href="/productos/ver/{{ $producto->id }}" title="Ver">
                                        <span class="material-symbols-outlined">
                                            visibility
                                        </span>
                                      </a>

                                    <a class="text-decoration-none " href="/productos/editar/{{ $producto->id }}" title="Editar">
                                        <span class="material-symbols-outlined text-warning">
                                            edit
                                        </span>
                                    </a>

                                    <a class="text-decoration-none text-danger" href="#" title="Borrar" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $producto->id }}">
                                        <span class="material-symbols-outlined">
                                            delete_forever
                                        </span>
                                    </a>

                                    {{ Form::model($producto, ['route' => ['productos_borrar', $producto->id], 'method'=>'delete']) }}

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal_{{ $producto->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Borrar Elemento</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <p id="delete_element_text">{{ $producto->nombre }}</p>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>


                                    {{ Form::close() }}

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
/*
 var deleteModal = document.getElementById('deleteModal')
deleteModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = deleteModal.querySelector('.modal-title')
  var modalBodyInput = deleteModal.querySelector('#').text('eliminar');

  modalTitle.textContent = 'New message to ' + recipient
  modalBodyInput.value = recipient
}) */

</script>

@endsection
