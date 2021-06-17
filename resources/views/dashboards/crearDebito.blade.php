@extends('layouts.app')

@section('content')
<h1 class =" d-flex justify-content-center">Nota de débito</h1>
<div class = "card d-flex align-items-center" style="padding:10px;">
<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text" id="basic-addon1">Número de nota</span>
  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name=idD>
</div>

<div class="input-group mb-3" style="width:50%">
<span class="input-group-text" id="basic-addon2">Número de documento</span>
  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name=nDocumento>
</div>

<div class="input-group mb-3" style="width:50%">
<span class="input-group-text" id="basic-addon2">precio </span>
  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name=precio>
</div>

<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text" id="basic-addon3">Fecha de emisión</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name=fecEmision>
</div>

<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text">Proveniente de</span>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
</div>

<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text">Con destino a</span>
  <input type="text" class="form-control" aria-label="Server">
</div>

<div>
<span class = "input-group-text mb-3">Información</span>
  <table class = "table table-responsive">
    <thead>
    <tr>
      <th>Id producto</th>
      <th>Nombre producto</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>
      Aqui va la información de la factura en cuanto a los productos
    </td>
      </tr>
    </tbody>
  </table>
</div>
<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text">Total Debito</span>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"name=vTotal>

</div>
<div style="margin:10px;">
<input class="btn btn-primary " type="submit" value="Crear nota de debito">
<button type="button" class = "btn btn-danger">Cancelar</button>
</div>
</div>

@endsection