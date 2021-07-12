@extends('layouts.app')

@section('content')

<div class="input-group mb-3">
<div class="form-row d-flex">
<form class="form-group col-md-4" action="{{route('documentos')}}" method="GET">
    <div class="form-group col-md-4">
    <div class = "d-flex">
    <label style="min-width:200px;">Filtro por tipo de documento</label>
    <select name='select' id='select' value= "{{$tipo}}" class="form-control" style="min-width:200px;">
    <option selected >Seleccione...</option>
    @foreach($tipos as $tipos)
        <option value="{{ $tipos->idTipo_Documento }}">{{ $tipos->Descripcion }}</option>
    @endforeach
    </select>
    </div> 

    <div class = "d-flex">
    <label style="min-width:200px;">Filtro por tipo de movimiento</label>
    <select name='movimiento' id='mov' value= "{{$tipoM}}" class="form-control" style="min-width:200px;">
    <option selected >Seleccione...</option>
    @foreach($tiposM as $tiposM)
        <option value="{{ $tiposM->idTipo_Movimiento}}">{{ $tiposM->DescripcionM }}</option>
    @endforeach
    </select>
    </div>

    <div class = "d-flex">
    <label style="min-width:200px;">Filtro por estado</label>
    <select name='estado' id='estad' value= "{{$tipoE}}" class="form-control" style="min-width:200px;">
    <option selected >Seleccione...</option>
    @foreach($tiposE as $tiposE)
        <option value="{{ $tiposE->idEstado }}">{{ $tiposE->DescripcionE }}</option>
    @endforeach
    </select>
    </div>

    

    

    <input class="btn btn-primary " type="submit" value="Aplicar">

    </form>
    <a href="{{route('documentos.excel')}}">Exportar datos</a>
    </div>
  </div>
<div class="card" style="background-color:#eee">
<div class="card-body">
<table class="table table-responsive">
    <thead>
        <tr>
        <th>ID</th>
        <th>Número documento</th>
        <th>Fecha emisión</th>
        <th>Valor total</th>
        <th>IVA</th>
        <th>Tipo de documento</th>
        <th>Tipo de movimiento</th>
        <th>Estado documento</th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($documentos as $documento)
                <td>{{ $documento->idDocumento }}</td>
                <td>{{ $documento->Numero_Documento }}</td>
                <td>{{ $documento->Fecha_emision }}</td>
                <td>{{ $documento->Valor_Total }}</td>
                <td>{{ $documento->Iva }}</td>
                <td>{{ $documento->Descripcion }}</td>
                <td>{{ $documento->DescripcionM }}</td>
                <td>{{ $documento->DescripcionE }}</td>
                <td>
                    <a class="btn btn-success" href="/crearCredito/"><i class="fa"></i>Crear nota de crédito</a>
                    <a class="btn btn-success" href="/crearDebito/"><i class="fa"></i>Crear nota de débito</a>
                    
                    <?php
                        $id = $documento->idDocumento;
                        $doc = $documento->Numero_Documento;
                        $valor = $documento->Valor_Total;
                        $display = "d-none";
                        if( $documento->Estado_Venta_idEstado_Venta == 3 ){
                            $display = "d-inline-block";
                            
                        }
                    ?>
                    <a class="btn btn-primary {{$display}}" href="{{route ('Webpay', $id)}}"><i class="fa"></i>Pagar</a>
                </td>
                </tr>
            @endforeach
        
    </tbody>
</table>
</div>
</div>
@endsection