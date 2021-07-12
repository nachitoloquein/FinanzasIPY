@extends('layouts.app')

@section('content')
<div>
  <a href="{{route('soap')}}" class = "btn btn-primary">Actualizar lista</a>
</div>
<div class="card" style="background-color:#eee; min-width: 900px; max-width:900px;">
<div class = "card-body">
<table class="table table-responsive" class="card" style="text-align:center; max-height: 600px" >
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
    @foreach($productos as $producto)
    <tbody class = "overflow-y: auto;">
      <tr>
      <td>{{ $producto->idProducto }}</td>
      <td>{{ $producto->Nombre_producto }}</td>
      <td>{{ $producto->Peso }}</td>
      <td>{{ $producto->Fecha_Elaboracion }}</td>
      <td>{{ $producto->Precio }}</td>
      <td>{{ $producto->Marca }}</td>
      <td>{{ $producto->Descripcion }}</td>
      <td>{{ $producto->Stock }}</td>
      <td>
        <button class="btn btn-success" style="min-width: 200px; max-width:200px" onclick="location.href = '{{ route('edit',$producto->idProducto) }}'"><i class="fa"></i>Modificar precio</button>
        <button class="btn btn-danger" style="min-width: 200px; max-width:200px" onclick="location.href = '{{ route('delete',$producto->idProducto) }}'"><i class="fa"></i>Eliminar producto</button>
      </td>
    </tr>
  </tbody>
      @endforeach
</table>
</div>
</div>
@endsection