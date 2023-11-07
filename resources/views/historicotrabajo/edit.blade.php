@extends('adminlte::page')
@section('title', 'Historico Trabajo')
@section('content_header')
<h1>Edición Registro de Horas de Trabajo</h1>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('historicotrabajo.update',['id_historico' => $historico->id]) }}" method="POST">
            @csrf <!-- Agrega el token CSRF para proteger el formulario -->
            <div class="card">
                <div class="card-header">Editar Registro de horas trabajadas</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-3">
   
                            <input type="hidden" name="id_empleado_puesto" value="{{$id_empleado_puesto}}">
                            <!-- Columna izquierda -->

                            <div class="form-group">
                                <label for="fecha_inicio" class="text-secondary">Fecha Inicio*</label>
                                <input type="date" name="fecha_inicio" class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" value="{{ $historico->fecha_inicio }}">
                                @error('fecha_inicio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="fecha_fin" class="text-secondary">Fecha Fin*</label>
                                <input type="date" name="fecha_fin" class="form-control{{ $errors->has('fecha_fin') ? ' is-invalid' : '' }}" value="{{ $historico->fecha_fin }}">
                                @error('fecha_fin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="dias_laborados" class="text-secondary">Cantidad de Días Laborados*</label>
                                <input type="number" name="dias_laborados" class="form-control{{ $errors->has('dias_laborados') ? ' is-invalid' : '' }}" value="{{ $historico->dias_laborados }}">
                                @error('dias_laborados')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="turno" class="text-secondary">Turno*</label>
                                <select name="turno" class="form-control{{ $errors->has('turno') ? ' is-invalid' : '' }}">
                                    <option value="diurno">Diurno</option>
                                    <option value="nocturno">Nocturno</option>
                                </select>
                                @error('turno')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-12 mb-3">

                            <div class="form-group">
                                <label for="horas_normal" class="text-secondary">Cantidad Horas Normales*</label>
                                <input type="number" name="horas_normal" class="form-control{{ $errors->has('horas_normal') ? ' is-invalid' : '' }}" value="{{ $historico->horas_normal }}">
                                @error('horas_normal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="horas_extra_normal" class="text-secondary">Cantidad Horas Extra*</label>
                                <input type="number" name="horas_extra_normal" class="form-control{{ $errors->has('horas_extra_normal') ? ' is-invalid' : '' }}" value="{{ $historico->horas_extra_normal }}">
                                @error('horas_extra_normal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="horas_dia_descanso" class="text-secondary">Cantidad Horas Días de Descanso*</label>
                                <input type="number" name="horas_dia_descanso" class="form-control{{ $errors->has('horas_dia_descanso') ? ' is-invalid' : '' }}" value="{{ $historico->horas_dia_descanso }}">
                                @error('horas_dia_descanso')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="horas_dias_festivo" class="text-secondary">Cantidad Horas Días Festivos*</label>
                                <input type="number" name="horas_dias_festivo" class="form-control{{ $errors->has('horas_dias_festivo') ? ' is-invalid' : '' }}" value="{{ $historico->horas_dias_festivo }}">
                                @error('horas_dias_festivo')
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
                                <button type="submit" class="btn btn-info">Editar Registro</button>
                                <a href="#" class="btn btn-danger">Cancelar</a>
                            </div>
                </div>
            </div>
        </form>
    </div>
</div>

@stop