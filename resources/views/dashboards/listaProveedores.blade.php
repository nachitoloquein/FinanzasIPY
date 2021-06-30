@extends('layouts.app')

@section('content')
<a style="margin:10px;" class="btn btn-success" href="{{route('agregarProveedor')}}"><i class="fa"></i>Agregar proveedor</a>
<div class = "card" style="background-color:#eee">
<div class = "card-body">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Rut</th>
        <th scope="col">Correo</th>
        <th scope="col">Razón social</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($proveedores as $prov)
        <tr>
            <th scope="row">{{$prov->Nombre}}</th>
            <td>{{$prov->Run}}</td>
            <td>{{$prov->Correo_Electronico}}</td>
            <td>{{$prov->Razon_Social}}</td>
          </tr>
        @endforeach
      
    </tbody>
  </table>
  </div>
  </div>
@endsection