@extends('layouts.app')

@section('content')
    <form>
        <div class="mb-3">
        <label for="" class="form-label">Nombre proveedor</label>
        <input type="text" class="form-control" value="{{$idDocumento}}" id="nombreProveedor" aria-describedby="basic-addon2">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">RUT</label>
        <input type="text" class="form-control" id="rutProveedor" aria-describedby="basic-addon2">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Valor total</label>
        <input type="text" class="form-control" id="valorTotal" aria-describedby="basic-addon2">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">fechaVencimiento</label>
        <input type="text" class="form-control" id="fechaVencimiento" aria-describedby="basic-addon2">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input type="text" class="form-control" id="precio" aria-describedby="basic-addon2">
        </div>
    </from>

@endsection