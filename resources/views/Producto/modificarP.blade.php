@extends('layouts.app')
@section('content')

<body>
  <form action="{{route('update',$producto)}}" method="POST" class="container">
    @csrf
    @method('patch')

    <div class="form-group">
      <label for="formGroupExampleInput2">Precio</label>
      <input type="number" min="1" class="form-control" id="formGroupExampleInput2" placeholder="Precio" name="Precio"
        value="{{$producto->Precio}}">
    </div>
    <input class="btn btn-primary " type="submit" value="Modificar Precio">
    <a class="btn btn-danger" href="/listaProductos/"><i class="fa"></i>Cancelar</a>
  </form>
</body>
@endsection