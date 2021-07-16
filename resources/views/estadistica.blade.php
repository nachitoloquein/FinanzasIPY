@extends('layouts.app')
@section('content')
    
<div class="container">

<a type="button" href="{{route('estadistica.exel')}}">Reporte estadistica</a>

<div class="card border-success mb-3" style="max-width: 18rem;">
  <div class="card-header">Total Ventas</div>
  <div class="card-body text-success">
    <p class="card-text"><span id="idVendidos">
      @foreach($Cantidad as $Cantida)
     <tbody>
     <tr>
     <td>{{ $Cantida->detalle_documento}}</td>
     </tr>
     </tbody>
     @endforeach</span></p>
  </div>
</div>

<div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Total productos</div>
  <div class="card-body text-primary">
    <p class="card-text"><span id="idAlmacen">@foreach($Cantidad as $Cantida)
      <tbody>
      <tr>
      <td>{{ $Cantida->Stock}}</td>
      </tr>
      </tbody>
      @endforeach</span></p>
  </div>
</div>

<div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Total Ingresos</div>
  <div class="card-body text-primary">
    <p class="card-text"><span id="idAlmacen">@foreach($Cantidad as $Cantida)
      <tbody>
      <tr>
      <td>{{ $Cantida->Ventas}}</td>
      </tr>
      </tbody>
      @endforeach</span></p>
  </div>
</div>

<div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Cantidad proveedores</div>
  <div class="card-body text-primary">
    <p class="card-text"><span id="idAlmacen">@foreach($Proveedor as $proveedor)
      <tbody>
      <tr>
      <td>{{ $proveedor->Cantidad_Proveedor}}</td>
      </tr>
      </tbody>
      @endforeach</span></p>
  </div>
</div>


@endsection