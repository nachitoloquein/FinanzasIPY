@extends('layouts.app')

@section('content')
   
    <body>
        <form action="{{route('updateproveedor', $proveedor)}}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="razonSocial">Razon social</label>
                <input type="text" id="razonSocial" class="form-control" value="{{$proveedor->Razon_Social}}" name="razonSocialProveedor">
            </div>
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" id="Nombre" value="{{$proveedor->Nombre}}" name="Nombre">
            </div>
            <div class="form-group">
                <label for="Rut">Rut</label>
                <input type="text" class="form-control" id="Rut" value="{{$proveedor->Run}}" name="RutProveedor">
            </div>
            <div class="form-group">
                <label for="Correo">Correo de contacto</label>
                <input type="text" class="form-control" id="Correo" value="{{$proveedor->Correo_Electronico}}" name="CorreoProveedor">
            </div>
            <div class="form-group">
                <label for="Direccion">Dirección</label>
                <input type="text" class="form-control" id="Direccion" value="{{$proveedor->Direccion}}" name="DireccionProveedor">
            </div>

            <input class="btn btn-primary " type="submit" value="Modificar Proveedor">
            
            <a class="btn btn-danger" href="{{route('listaProveedores')}}"><i class="fa"></i>Cancelar</a>
        </form>
        
    </body>
@endsection