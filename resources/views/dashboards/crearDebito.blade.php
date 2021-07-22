@extends('layouts.app')
@section('content')

<body>
  <div class="card" style="background-color:#eee;">
    <div class="card-body">
  <form action="{{route('AgregarNotaDebito',$doc)}}" method="POST" class="container">
    @csrf
    <div class="form-group">
      <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="cantidad antigua" name="Precio"
        value="{{$doc->Valor_Total}}" readonly>
    </div>
    <div class="form-group">
      <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="cantidad antigua"
        name="Fecha_emision" value="{{$fechaActual = date('d-m-Y')}}" readonly>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">Valor Restado</label>
      <input type="number" min="1" class="form-control" id="formGroupExampleInput" placeholder="Cantidad"
        name="Valor_Total" value="">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput" class="text-dark">Detalle</label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el motivo" name="Detalle"
        value="">
    </div>
    <input class="btn btn-primary " type="submit" value="Modificar Precio">
    <a class="btn btn-danger" href="/listaDocumentos/"><i class="fa"></i>Cancelar</a>
  </form>
    </div>
  </div>

</body>
@endsection