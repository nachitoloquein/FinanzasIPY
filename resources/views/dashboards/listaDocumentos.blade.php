@extends('layouts.app')

@section('content')
<div class="input-group mb-3">
<div class="form-row">
    <div class="form-group col-md-4">
   <label style="min-width:200px;">Filtro por tipo</label>

      <select id='select'  class="form-control" style="min-width:200px;">
        <option selected >Seleccione...</option>
        @foreach($tipos as $tipos)
            <option value="{{ $tipos->idTipo_Documento }}">{{ $tipos->Descripcion }}</option>
        @endforeach
      </select>
      <input class="btn btn-primary " type="submit" value="Aplicar">
    </div>
  </div>
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
                <td>
                    <a class="btn btn-success" href="/crearCredito/"><i class="fa"></i>Crear nota de crédito</a>
                    <a class="btn btn-success" href="/crearDebito/"><i class="fa"></i>Crear nota de débito</a>
                </td>

            @endforeach
        </tr>
    </tbody>
</table>
@endsection