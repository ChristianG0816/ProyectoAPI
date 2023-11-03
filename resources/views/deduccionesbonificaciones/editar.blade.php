@extends('adminlte::page')
@section('title', 'Movimiento')
@section('content_header')
<h1>Editar Movimiento</h1>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('deduccionesbonificaciones.update', ['id_empleado' => $id_empleado, 'id_movimiento' => $movimientoNomina->id]) }}" method="POST">
            @csrf
           
            <div class="card">
                <div class="card-header">Editar Movimiento</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-3">

                            <!-- Columna izquierda -->
                            <div class="form-group">
                                <label for="concepto" class="text-secondary">Descripción del concepto*</label>
                                <input type="text" name="concepto" class="form-control{{ $errors->has('concepto') ? ' is-invalid' : '' }}" value="{{ $movimientoNomina->concepto }}">
                                @error('concepto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="valor_pagar" class="text-secondary">Valor a pagar*</label>
                                <input type="text" name="valor_pagar" class="form-control{{ $errors->has('valor_pagar') ? ' is-invalid' : '' }}" value="{{ $movimientoNomina->valor_pagar }}">
                                @error('valor_pagar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for "accion" class="text-secondary">Acción*</label>
                                <input type="text" name="accion" class="form-control{{ $errors->has('accion') ? ' is-invalid' : '' }}" value="{{ $movimientoNomina->accion }}">
                                @error('accion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 mb-3">
                            
                            <div class="form-group">
                                <label for="id_tipo_frecuencia" class="text-secondary">Tipo de Frecuencia*</label>
                                <select name="id_tipo_frecuencia" class="form-control{{ $errors->has('id_tipo_frecuencia') ? ' is-invalid' : '' }}">
                                    @foreach ($tiposFrecuencia as $tipoFrecuencia)
                                        <option value="{{ $tipoFrecuencia->id }}" {{ $tipoFrecuencia->id == $movimientoNomina->id_tipo_frecuencia ? 'selected' : '' }}>
                                            {{ $tipoFrecuencia->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_tipo_frecuencia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id_tipo_movimiento_nomina" class="text-secondary">Tipo de Movimiento*</label>
                                <select name="id_tipo_movimiento_nomina" class="form-control{{ $errors->has('id_tipo_movimiento_nomina') ? ' is-invalid' : '' }}">
                                    @foreach ($tiposMovimiento as $tipoMovimiento)
                                        <option value="{{ $tipoMovimiento->id }}" {{ $tipoMovimiento->id == $movimientoNomina->id_tipo_movimiento_nomina ? 'selected' : '' }}>
                                            {{ $tipoMovimiento->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_tipo_movimiento_nomina')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="observacion" class="text-secondary">Observación*</label>
                                <input type="text" name="observacion" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" value="{{ $movimientoNomina->observacion }}">
                                @error('observacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-6 text-left">
                                <small>Los campos con (*) son requeridos</small>
                            </div>
                            <div class="col-md-6 col-6 text-right">
                                <button type="submit" class="btn btn-info">Editar Movimiento de Nómina</button>
                                <a href="{{ route('deduccionesbonificaciones.show', ['id_empleado' => $id_empleado]) }}" class="btn btn-danger">Cancelar</a>
                            </div>
                </div>
            </div>
        </form>
    </div>
</div>

@stop
