@extends('adminlte::page')
@section('title', 'Nomina')
@section('content_header')
<h1>Nueva Contratación</h1>
@stop
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" action="{{ route('nomina.store') }}">
            @csrf <!-- Agrega el token CSRF para proteger el formulario -->
            <div class="card">
                <div class="card-header">Información del Empleado</div>
                <div class="card-body">
                    <!-- <div id="table_wrapper" class="wrapper dt-bootstrap4"> -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <h5 class="text-secondary">Información Personal</h5>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <!-- Columna izquierda -->
                                <div class="form-group">
                                    <label for="codigo" class="text-secondary">Código*</label>
                                    <input type="text" name="codigo" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" maxlength="7" value="{{ old('codigo') }}" tabindex="1">
                                    @error('codigo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="segundo_nombre" class="text-secondary">Segundo Nombre*</label>
                                    <input type="text" name="segundo_nombre" class="form-control{{ $errors->has('segundo_nombre') ? ' is-invalid' : '' }}" maxlength="50" value="{{ old('segundo_nombre') }}" tabindex="3">
                                    @error('segundo_nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="segundo_apellido" class="text-secondary">Segundo Apellido*</label>
                                    <input type="text" name="segundo_apellido" class="form-control{{ $errors->has('segundo_apellido') ? ' is-invalid' : '' }}" maxlength="50" value="{{ old('segundo_apellido') }}" tabindex="5">
                                    @error('segundo_apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento" class="text-secondary">Fecha de nacimiento*</label>
                                    <input type="date" name="fecha_nacimiento" class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" value="{{ old('fecha_nacimiento') }}" tabindex="7">
                                    @error('fecha_nacimiento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="departamento" class="text-secondary">Departamento*</label>
                                    <select name="departamento" class="form-control{{ $errors->has('departamento') ? ' is-invalid' : '' }}" tabindex="9">
                                        <option value="" {{ old('departamento') == '' ? 'selected' : '' }}>Seleccione el departamento</option>
                                        @foreach($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}" {{ old('departamento') == $departamento->id ? 'selected' : '' }}>
                                                {{ $departamento->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departamento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="text-secondary">Telefono*</label>
                                    <input type="text" name="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" maxlength="9" value="{{ old('telefono') }}" tabindex="11">
                                    @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="estado_civil" class="text-secondary">Estado Civil*</label>
                                    <select name="estado_civil" class="form-control{{ $errors->has('estado_civil') ? ' is-invalid' : '' }}" tabindex="13">
                                        <option value="" {{ old('estado_civil') == '' ? 'selected' : '' }}>Seleccione el estado civil</option>
                                        @foreach($estado_civil as $clave => $valor)
                                            <option value="{{ $valor }}" {{ old('estado_civil') == $valor ? 'selected' : '' }}>{{ $valor }}</option>
                                        @endforeach
                                    </select>
                                    @error('estado_civil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <!-- Columna derecha -->
                                <div class="form-group">
                                    <label for="primer_nombre" class="text-secondary">Primer Nombre*</label>
                                    <input type="text" name="primer_nombre" class="form-control{{ $errors->has('primer_nombre') ? ' is-invalid' : '' }}" maxlength="255" value="{{ old('primer_nombre') }}" tabindex="2">
                                    @error('primer_nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="primer_apellido" class="text-secondary">Primer apellido*</label>
                                    <input type="text" name="primer_apellido" class="form-control{{ $errors->has('primer_apellido') ? ' is-invalid' : '' }}" maxlength="255" value="{{ old('primer_apellido') }}" tabindex="4">
                                    @error('primer_apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="apellido_casada" class="text-secondary">Apellido de casada</label>
                                    <input type="text" name="apellido_casada" class="form-control{{ $errors->has('') ? ' is-invalid' : '' }}" maxlength="255" value="{{ old('apellido_casada') }}" tabindex="6">
                                    @error('apellido_casada')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="text-secondary">Dirección*</label>
                                    <input type="text" name="direccion" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" maxlength="255" value="{{ old('direccion') }}" tabindex="8">
                                    @error('direccion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="municipio" class="text-secondary">Municipio*</label>
                                    <select name="municipio" class="form-control{{ $errors->has('municipio') ? ' is-invalid' : '' }}" tabindex="10">
                                        <option value="" {{ old('municipio') == '' ? 'selected' : '' }}>Seleccione el municipio</option>
                                    </select>
                                    @error('municipio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nacionalidad" class="text-secondary">Nacionalidad*</label>
                                    <select name="nacionalidad" class="form-control{{ $errors->has('nacionalidad') ? ' is-invalid' : '' }}" tabindex="12">
                                        <option value="" {{ old('nacionalidad') == '' ? 'selected' : '' }}>Seleccione la nacionalidad</option>
                                        @foreach($nacionalidades as $clave => $valor)
                                            <option value="{{ $valor }}" {{ old('nacionalidad') == $valor ? 'selected' : '' }}>{{ $valor }}</option>
                                        @endforeach
                                    </select>
                                    @error('nacionalidad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sexo" class="text-secondary">Sexo*</label>
                                    <select name="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" tabindex="14">
                                        <option value="" {{ old('sexo') == '' ? 'selected' : '' }}>Seleccione el sexo</option>
                                        @foreach($sexo as $clave => $valor)
                                            <option value="{{ $valor }}" {{ old('sexo') == $valor ? 'selected' : '' }}>{{ $valor }}</option>
                                        @endforeach
                                    </select>
                                    @error('sexo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <h5 class="text-secondary">Documentos</h5>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="form-group">
                                        <label for="dui" class="text-secondary">DUI*</label>
                                        <input type="text" name="dui" class="form-control{{ $errors->has('dui') ? ' is-invalid' : '' }}" maxlength="50" value="{{ old('dui') }}" tabindex="15">
                                        @error('dui')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="nup" class="text-secondary">NUP*</label>
                                        <input type="text" name="nup" class="form-control{{ $errors->has('nup') ? ' is-invalid' : '' }}" maxlength="50" value="{{ old('nup') }}" tabindex="17">
                                        @error('nup')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="pasaporte" class="text-secondary">Pasaporte</label>
                                        <input type="text" name="pasaporte" class="form-control{{ $errors->has('pasaporte') ? ' is-invalid' : '' }}" maxlength="50" value="{{ old('pasaporte') }}" tabindex="19">
                                        @error('pasaporte')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="form-group">
                                        <label for="nit" class="text-secondary">NIT*</label>
                                        <input type="text" name="nit" class="form-control{{ $errors->has('nit') ? ' is-invalid' : '' }}" maxlength="50" value="{{ old('nit') }}" tabindex="16">
                                        @error('nit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="isss" class="text-secondary">ISSS*</label>
                                        <input type="text" name="isss" class="form-control{{ $errors->has('isss') ? ' is-invalid' : '' }}" maxlength="50" value="{{ old('isss') }}" tabindex="18">
                                        @error('isss')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="residencia" class="text-secondary">Carnet de Residencia</label>
                                        <input type="text" name="residencia" class="form-control{{ $errors->has('residencia') ? ' is-invalid' : '' }}" maxlength="50" value="{{ old('residencia') }}" tabindex="20">
                                        @error('residencia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <h5 class="text-secondary">Información de la Cuenta Bancaria</h5>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                 <!-- Columna izquierda -->
                                <div class="form-group">
                                    <label for="banco" class="text-secondary">Banco*</label>
                                    <select name="banco" class="form-control{{ $errors->has('banco') ? ' is-invalid' : '' }}" tabindex="21">
                                        <option value="" {{ old('banco') == '' ? 'selected' : '' }}>Seleccione el banco</option>
                                        @foreach($bancos as $banco)
                                            <option value="{{ $banco->id }}" {{ old('banco') == $banco->id ? 'selected' : '' }}>
                                                {{ $banco->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('banco')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="numero_cuenta" class="text-secondary">Número de Cuenta*</label>
                                    <input type="text" name="numero_cuenta" class="form-control{{ $errors->has('numero_cuenta') ? ' is-invalid' : '' }}" maxlength="50" value="{{ old('numero_cuenta') }}" tabindex="23">
                                    @error('numero_cuenta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <!-- Columna derecha -->
                                <div class="form-group">
                                    <label for="tipo_cuenta" class="text-secondary">Tipo de Cuenta*</label>
                                    <select name="tipo_cuenta" class="form-control{{ $errors->has('tipo_cuenta') ? ' is-invalid' : '' }}" tabindex="22">
                                        <option value="" {{ old('tipo_cuenta') == '' ? 'selected' : '' }}>Seleccione el tipo de cuenta</option>
                                        @foreach($tipos_cuentas as $clave => $valor)
                                            <option value="{{ $valor }}" {{ old('tipo_cuenta') == $valor ? 'selected' : '' }}>{{ $valor }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_cuenta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <h5 class="text-secondary">Información del Puesto</h5>
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
                                            @php
                                                $dias = implode(', ', $jornadasDia[$jornada->id] ?? []);
                                            @endphp
                                            <option value="{{ $jornada->id }}" {{ old('jornada') == $jornada->id ? 'selected' : '' }}>
                                                {{ $dias }} [{{ $jornada->hora_entrada }} - {{ $jornada->hora_salida }}]
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
                                    <label for="fecha_inicio" class="text-secondary">Fecha de Ingreso*</label>
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
    var municipio_id = "{{ old('municipio') }}";
    $(document).ready(function () {
        var phoneInput = $('input[name="telefono"]');
        phoneInput.inputmask('9999-9999');
        var duiInput = $('input[name="dui"]');
        duiInput.inputmask('99999999-9');
        var nitInput = $('input[name="nit"]');
        nitInput.inputmask('9999-999999-999-9');
        var isssInput = $('input[name="isss"]');
        isssInput.inputmask('999999999');
        var nupInput = $('input[name="nup"]');
        nupInput.inputmask('9999999999999');
        var pasaporteInput = $('input[name="pasaporte"]');
        pasaporteInput.inputmask('AA999999');
        var residenciaInput = $('input[name="residencia"]');
        residenciaInput.inputmask('9999999999999');
        var departamento_id = $('select[name="departamento"]').val();
        //si departamento esta lleno pero municipio esta vacio

        if (departamento_id) {
            if(!municipio_id){
            $.ajax({
                url: "{{ route('get-municipios') }}",
                type: "GET",
                dataType: "json",
                data: {departamento_id: departamento_id},
                success: function (data) {
                    var municipioSelect = $('select[name="municipio"]');
                    municipioSelect.empty();
                    municipioSelect.append('<option value="">Seleccione el municipio</option>');
                    $.each(data, function (id, nombre) {
                        municipioSelect.append('<option value="' + id + '">' + nombre + '</option>');
                    });

                    // Comprueba si hay un valor guardado en municipio_id
                    if (municipio_id) {
                        municipioSelect.val(municipio_id);
                    }
                }
            });
            }else
            {
                $.ajax({
                    url: "{{ route('get-municipios') }}",
                    type: "GET",
                    dataType: "json",
                    data: {departamento_id: departamento_id},
                    success: function (data) {
                        var municipioSelect = $('select[name="municipio"]');
                        municipioSelect.empty();
                        municipioSelect.append('<option value="">Seleccione el municipio</option>');
                        $.each(data, function (id, nombre) {
                            municipioSelect.append('<option value="' + id + '">' + nombre + '</option>');
                        });

                        // Comprueba si hay un valor guardado en municipio_id
                        if (municipio_id) {
                            municipioSelect.val(municipio_id);
                        }
                    }
                });
            }
        }

    });

    //si el select de municipio no tiene valor y el de departamento sí, entonces se ejecuta la función
    $('select[name="departamento"]').change(function () {
        var departamento_id = $(this).val();
        var municipio_id = $('select[name="municipio"]').val();
        if (departamento_id) {
            $.ajax({
                url: "{{ route('get-municipios') }}",
                type: "GET",
                dataType: "json",
                data: {departamento_id: departamento_id},
                success: function (data) {
                    var municipioSelect = $('select[name="municipio"]');
                    municipioSelect.empty();
                    municipioSelect.append('<option value="">Seleccione el municipio</option>');
                    $.each(data, function (id, nombre) {
                        municipioSelect.append('<option value="' + id + '">' + nombre + '</option>');
                    });
                    // Comprueba si hay un valor guardado en municipio_id
                    if (municipio_id) {
                        municipioSelect.val('');
                    }
                }
            });
        } else {
            var municipioSelect = $('select[name="municipio"]');
            municipioSelect.empty();
            municipioSelect.append('<option value="">Seleccione el municipio</option>');
            municipioSelect.val('');
        }
    });

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