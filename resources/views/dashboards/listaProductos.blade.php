@extends('layouts.app')

@section('content')
<table class="table table-responsive" style="text-align:center;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Peso</th>
      <th>Fecha elaboracion</th>
      <th>Precio</th>
      <th>Marca</th>
      <th>Descripcion</th>
      <th>stock</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($productos as $producto)
      <td>{{ $producto->idProducto }}</td>
      <td>{{ $producto->Nombre_producto }}</td>
      <td>{{ $producto->Peso }}</td>
      <td>{{ $producto->Fecha_Elaboracion }}</td>
      <td>{{ $producto->Precio }}</td>
      <td>{{ $producto->Marca }}</td>
      <td>{{ $producto->Descripcion }}</td>
      <td>{{ $producto->Stock }}</td>
      <td>
        <button class="btn btn-success"><i class="fa"></i>Modificar precio</button>
      </td>
    @endforeach
    </tr>

  </tbody>
</table>
@endsection