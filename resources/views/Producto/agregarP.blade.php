@extends('layouts.app')
@section('content')
<body>
    <form action="{{route('agregarp.lista')}}" method="POST" class="container">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre del producto</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre del producto" name="Nombre_producto">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Peso</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Peso" name="Peso">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Fecha Elavoracion (año-mes-dia)</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Fecha Elavoracion" name="Fecha_Elaboracion">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Precio</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Precio" name="Precio">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Marca</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Marca" name="Marca">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Descripción</label>
            <textarea type="text" class="form-control" id="formGroupExampleInput2" rows="3" placeholder="Descripción" name="Descripcion"></textarea>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Stock</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="Stock" placeholder="Stock">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Tipo de producto</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="Tipo_Producto_idTipo_Producto" placeholder="Tipo de producto">
          </div>
          
          <input class="btn btn-primary " type="submit" value="Agregar Precio">
    </form>
</body>
@endsection