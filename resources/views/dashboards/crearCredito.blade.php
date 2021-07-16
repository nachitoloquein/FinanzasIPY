@extends('layouts.app')

@section('content')
<body>
<h1 class =" d-flex justify-content-center">Nota de crédito</h1>
<div class = "card d-flex align-items-center" style="padding:10px;">
<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text" id="basic-addon1">Referencia</span>
  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3" style="width:50%">
<span class="input-group-text" id="basic-addon2">Fecha</span>
  <input type="date" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

<div class="input-group mb-3" style="width:50%">
<span class="input-group-text" id="basic-addon2">Razón Social</span>
  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text" id="basic-addon3">Descripcion</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>

<div style="margin:10px;">
  <button type="button" class = "btn btn-success">Crear nota de crédito</button>
  <button onclick="location.href='{{ route('documentos') }}'" type="button" class = "btn btn-danger">Cancelar</button>
</div>

</body>


@endsection