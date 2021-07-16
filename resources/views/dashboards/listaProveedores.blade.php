@extends('layouts.app')

@section('content')
<a style="margin:10px;" class="btn btn-success" href="{{route('agregarProveedor')}}"><i class="fa"></i>Agregar proveedor</a>
<div class = "card" style="background-color:#eee; max-width:800px; min-width: 800px;">
<div class = "card-body">
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Rut</th>
        <th scope="col">Correo</th>
        <th scope="col">Razón social</th>
        <th>Dirección</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($proveedores as $prov)
        <tr>
            <th>{{$prov->idPersona}}</th>
            <td>{{$prov->Nombre}}</td>
            <td>{{$prov->Run}}</td>
            <td>{{$prov->Correo_Electronico}}</td>
            <td>{{$prov->Razon_Social}}</td>
            <td>{{$prov->Direccion}}</td>
            <td>
              <button class="btn btn-success" style="min-width: 200px; max-width:200px" onclick="location.href = '{{ route('editproveedor',$prov->idPersona) }}'"><i class="fa"></i>Modificar proveedor</button>
            </td>
          </tr>
        @endforeach
      
    </tbody>
  </table>
  </div>
  </div>
@endsection