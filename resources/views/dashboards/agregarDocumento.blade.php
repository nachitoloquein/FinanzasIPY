@extends('layouts.app')

@section('content')

<body>
    <form action="{{route('agregarD')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="numDoc"> Número de documento</label>
            <input type="number" id="numDoc" class="form-control" placeholder="Número de documento" name="numDoc">
        </div>
        <div class="form-group">
            <label for="fechaE"> Fecha de emisión</label>
            <input type="date" id="valTot" class="form-control" name="fechaE">
        </div>
        <div class="form-group">
            <label for="valTot"> Valor total </label>
            <input type="number" id="valTot" class="form-control" placeholder="Valor total" name="valTot">
        </div>
        <div class="form-group">
            <label for="iva"> IVA</label>
            <input type="number" id="iva" class="form-control" placeholder="Iva" name="iva">
        </div>
        <div class="form-group">
            <label for="tDoc"> Tipo de documento:</label>
            <select name="tDoc">
                <option value="1">Factura</option>
                <option value="2">Boleta</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tMov"> Tipo de movimiento:</label>
            <select name="tMov">
                <option value="1">Compra</option>
                <option value="2">Venta</option>
            </select>
        </div>
        <div class="form-group">
            <label for="est"> Estado:</label>
            <select name="est">
                <option value="1">Pagado</option>
                <option value="2">Cancelado</option>
                <option value="3">Pendiente</option>
            </select>
        </div>
        <input class= "btn btn-primary" type="submit" value="Agregar documento" >
        <a class="btn btn-danger" href="{{route('documentos')}}"><i class="fa"></i>Cancelar</a>
    </form>
</body>

@endsection