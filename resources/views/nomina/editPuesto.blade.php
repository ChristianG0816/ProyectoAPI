@extends('adminlte::page')
@section('title', 'Nomina')
@section('content_header')
<h1>Cambio de Puesto</h1>
@stop
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" action="{{ route('nomina.updatePuesto', ['id' => $empleadoPuesto->id]) }}">
            @csrf <!-- Agrega el token CSRF para proteger el formulario -->
            @method('PATCH')
            <div class="card">
                <div class="card-header">Información del Empleado</div>
                <div class="card-body">
                    <!-- <div id="table_wrapper" class="wrapper dt-bootstrap4"> -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <h5 class="text-secondary">Información del Nuevo Puesto</h5>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <!-- Columna izquierda -->
                                <div class="form-group">
                                    <label for="puesto" class="text-secondary">Puesto*</label>
                                    <select name="puesto" class="form-control{{ $errors->has('puesto') ? ' is-invalid' : '' }}" tabindex="24">
                                        <option value="" {{ old('puesto') == '' ? 'selected' : '' }}>Seleccione el puesto</option>
                                        @foreach($puestos as $puesto)
                                            <option value="{{ $puesto->id }}" {{ old('puesto') == $puesto->id ? 'selected' : '' }}>
                                                {{ $puesto->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('puesto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jornada" class="text-secondary">Jornada*</label>
                                    <select name="jornada" class="form-control{{ $errors->has('jornada') ? ' is-invalid' : '' }}" tabindex="26">
                                        <option value="" {{ old('jornada') == '' ? 'selected' : '' }}>Seleccione la jornada</option>
                                        @foreach($jornadas as $jornada)
                                            <option value="{{ $jornada->id }}" {{ old('jornada') == $jornada->id ? 'selected' : '' }}>
                                                {{ $jornada->codigo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jornada')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <!-- Columna derecha -->
                                <div class="form-group">
                                    <label for="salario" class="text-secondary">Salario*</label>
                                    <input type="number" name="salario" class="form-control{{ $errors->has('salario') ? ' is-invalid' : '' }}" value="{{ old('salario') }}" tabindex="25">
                                    @error('salario')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fecha_inicio" class="text-secondary">Fecha de Inicio de Nuevo Puesto*</label>
                                    <input type="date" name="fecha_inicio" class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" value="{{ old('fecha_inicio') }}" tabindex="27">
                                    @error('fecha_inicio')
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
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <a href="{{ route('nomina.index') }}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
    $('select[name="puesto"]').change(function () {
        var puesto_id = $(this).val();
        if (puesto_id) {
            $.ajax({
                url: "{{ route('get-salario-puesto') }}",
                type: "GET",
                dataType: "json",
                data: {puesto_id: puesto_id},
                success: function (data) {
                    var salarioInput = $('input[name="salario"]');
                    salarioInput.val(data);
                }
            });
        } else {
            var salarioInput = $('input[name="salario"]');
            salarioInput.val('');
        }
    });

</script>


@stop