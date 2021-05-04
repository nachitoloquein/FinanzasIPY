@extends('layouts.app')

@section('content')
<div style="align-items:center;">
<div class = "card" style="align-items:center; margin:50px; width:50%;">
<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text" id="basic-addon1">ID</span>
  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3" style="width:50%">
<span class="input-group-text" id="basic-addon2">Número de boleta</span>
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text" id="basic-addon3">Fecha de emisión</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>

<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text">$</span>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
  <span class="input-group-text">.00</span>
</div>

<div class="input-group mb-3"style="width:50%">
  <input type="text" class="form-control" placeholder="Username" aria-label="Username">
  <span class="input-group-text">@</span>
  <input type="text" class="form-control" placeholder="Server" aria-label="Server">
</div>

<div class="input-group"style="width:50%">
  <span class="input-group-text">With textarea</span>
  <textarea class="form-control" aria-label="With textarea"></textarea>
</div>
<div style="margin:10px;">
<button type="button" class = "btn btn-success">Crear nota de crédito</button>
<button type="button" class = "btn btn-danger">Cancelar</button>
</div>
</div>
</div>

@endsection