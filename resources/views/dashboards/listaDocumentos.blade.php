@extends('layouts.app')

@section('content')

<div class="input-group mb-3 col-md-auto">
    <div class="card form-row d-flex col-md-auto" style="background-color: #eee; ">
        <form class="form-group col-md-4" action="{{route('documentos')}}" method="GET">
            <div class="form-group col-md-4">
                <div class="d-flex">
                    <label style="min-width:200px;">Filtro por tipo de documento</label>
                    <select name='select' id='select' value="{{$tipo}}" class="form-control" style="min-width:200px;">
                        <option selected>Seleccione...</option>
                        @foreach($tipos as $tipos)
                        <option value="{{ $tipos->idTipo_Documento }}">{{ $tipos->Descripcion }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex">
                    <label style="min-width:200px;">Filtro por tipo de movimiento</label>
                    <select name='movimiento' id='mov' value="{{$tipoM}}" class="form-control"
                        style="min-width:200px; ">
                        <option selected>Seleccione...</option>
                        @foreach($tiposM as $tiposM)
                        <option value="{{ $tiposM->idTipo_Movimiento}}">{{ $tiposM->DescripcionM }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex">
                    <label style="min-width:200px;">Filtro por estado</label>
                    <select name='estado' id='estad' value="{{$tipoE}}" class="form-control" style="min-width:200px;">
                        <option selected>Seleccione...</option>
                        @foreach($tiposE as $tiposE)
                        <option value="{{ $tiposE->idEstado }}">{{ $tiposE->DescripcionE }}</option>
                        @endforeach
                    </select>
                </div>





                <input class="btn btn-primary " type="submit" value="Aplicar">

        </form>
        <a href="{{route('documentos.excel')}}" style="display: grid; ">Exportar datos</a>
    </div>
</div>

<div>
    <a href="{{route('boleta')}}" class = "btn btn-primary">Actualizar documentos</a>
  </div>

<div class="card" style="background-color:#eee; ">
    <div class="card-body">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Número documento</th>
                    <th>Fecha emisión</th>
                    <th>Valor total</th>
                    <th>Detalle</th>
                    <th>Tipo de documento</th>
                    <th>Tipo de movimiento</th>
                    <th>Estado documento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($documentos as $documento)
                    <td>{{ $documento->Numero_Documento }}</td>
                    <td>{{ $documento->Fecha_emision }}</td>
                    <td>{{ $documento->Valor_Total }}</td>
                    <td>{{ $documento->Detalle }}</td>
                    <td>{{ $documento->Descripcion }}</td>
                    <td>{{ $documento->DescripcionM }}</td>
                    <td>{{ $documento->DescripcionE }}</td>
                    <td style="display: grid;">
                        <?php
                        $id = $documento->idDocumento;
                        $doc = $documento->Numero_Documento;
                        $valor = $documento->Valor_Total;
                        $Fecha_emision=$documento->Fecha_emision;
                        $debicredi = "d-none";
                        $pago = "d-none";
                        if( $documento->Estado_Venta_idEstado_Venta == 1 && ($documento->Tipo_Documento_idTipo_Documento == 1 or $documento->Tipo_Documento_idTipo_Documento == 2) && $documento->Activo==1){
                            $debicredi = "d-inline-block";
                            
                        }
                        elseif ($documento->Tipo_Movimiento_idTipo_Movimiento == 1 && $documento->Estado_Venta_idEstado_Venta == 3) {
                            $pago = "d-inline-block";
                        }
                    ?>
                        <a class="btn btn-success {{$debicredi}}" href="{{route ('CrearCredito',$id)}}"><i
                                class="fa"></i>Crear nota de crédito</a>
                        <a class="btn btn-success {{$debicredi}}" href="{{route ('CrearDebito',$id)}}"><i
                                class="fa"></i>Crear nota de débito</a>
                        <a class="btn btn-primary {{$pago}}" href="{{route ('Webpay', $id)}}"><i
                                class="fa"></i>Pagar</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection