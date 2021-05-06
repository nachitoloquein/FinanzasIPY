@extends('layouts.app')

@section('content')

<div class="input-group mb-3">
    <div class="form-row">
        <form class="form-group col-md-4" action="{{route('historial')}}" method="GET">
       <label style="min-width:200px;">Filtro por tipo de movimiento</label>
    
          <select   class="form-control" name="buscar" value="{{$datas}}" style="min-width:200px;">
            <option selected >Seleccione...</option>
            @foreach($mov as $mov)
                <option value="{{ $mov->idTipo_Movimiento }}" id={{ $mov->DescripcionM }} >{{ $mov->DescripcionM }}</option>
            @endforeach
          </select>
          <input class="btn btn-primary " type="submit" >
        </form>
      </div>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>idDocumento</th>
                <th>Numero_Documento</th>
                <th>Valor_Total</th>
                <th>Precio</th>
                <th>Fecha_emision</th>
                <th>Tipo_Movimiento_idTipo_Movimiento</th>
                <th>Tipo_Documento_idTipo_Documento</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($movimiento as $datos)
                    <td>{{$datos->idDocumento}}</td>
                    <td>{{$datos->Numero_Documento}}</td>
                    <td>{{$datos->Valor_Total}}</td>
                    <td>{{$datos->Precio}}</td>
                    <td>{{$datos->Fecha_emision}}</td>
                    <td>{{$datos->DescripcionM}}</td>
                    <td>{{$datos->Tipo_Documento_idTipo_Documento}}</td>
                
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection