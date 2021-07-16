@extends('layouts.app')

@section('content')
   
    <body>
        <form action="{{route('agregarProveedor.lista')}}" style="background-color: #eee;" class="card" method="POST">
            @csrf
            <div class="form-group">
                <label for="razonSocial">Razon social</label>
                <input type="text" id="razonSocial" class="form-control" placeholder="Razon social de la empresa" name="razonSocialProveedor">
            </div>
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" id="Nombre" placeholder="Nombre del proveedor" name="Nombre">
            </div>
            <div class="form-group">
                <label for="Rut">Rut</label>
                <input type="text" class="form-control" id="Rut" placeholder="Rut del proveedor" name="RutProveedor">
            </div>
            <div class="form-group">
                <label for="Correo">Correo de contacto</label>
                <input type="text" class="form-control" id="Correo" placeholder="Correo de contacto" name="CorreoProveedor">
            </div>
            <div class="form-group">
                <label for="Direccion">Dirección</label>
                <input type="text" class="form-control" id="Direccion" placeholder="Dirección" name="DireccionProveedor">
            </div>

            <input class="btn btn-primary " type="submit" value="Agregar Proveedor">
            
            <a class="btn btn-danger" href="{{route('listaProveedores')}}"><i class="fa"></i>Cancelar</a>
        </form>
        
    </body>
@endsection