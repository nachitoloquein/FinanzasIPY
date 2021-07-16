@extends('layouts.app')

@section('content')
<body>
<h1 class =" d-flex justify-content-center">Nota de crédito</h1>
<div class = "card d-flex align-items-center" style="padding:10px;">
<form action="{{route('AgregarNotaDebito', $doc->idDocumento)}}" method="POST">
  @method('PUT')
  @csrf
<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text" id="basic-addon3">Motivo</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>  

<div class="input-group mb-3"style="width:50%">
  <span class="input-group-text" id="basic-addon3">Descripcion</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>  

<div style="margin:10px;">
  <button type="submit" class = "btn btn-success">Crear nota de crédito</button>
  <button onclick="location.href='{{ route('documentos') }}'" type="button" class = "btn btn-danger">Cancelar</button>
</div>
</form>
</body>


@endsection