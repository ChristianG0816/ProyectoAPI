@extends('adminlte::page')
@section('title', 'Nomina')
@section('content_header')
<h1>Cambio de Salario</h1>
@stop
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" action="{{ route('nomina.updateSalario', ['id' => $empleadoPuesto->id]) }}">
            @csrf <!-- Agrega el token CSRF para proteger el formulario -->
            @method('PATCH')
            <div class="card">
                <div class="card-header">Información del Empleado</div>
                <div class="card-body">
                    <!-- <div id="table_wrapper" class="wrapper dt-bootstrap4"> -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <h5 class="text-secondary">Información del Nuevo Salario</h5>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="salario_anterior" class="text-secondary">Salario Anterior</label>
                                    <input type="number" name="salario_anterior" class="form-control{{ $errors->has('salario_anterior') ? ' is-invalid' : '' }}" value="{{ old('salario_anterior', $empleadoPuesto->salario_mensual) }}" tabindex="25" disabled>
                                    @error('salario_anterior')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fecha_cambio_salario" class="text-secondary">Fecha de Inicio de Nuevo Salario*</label>
                                    <input type="date" name="fecha_cambio_salario" class="form-control{{ $errors->has('fecha_cambio_salario') ? ' is-invalid' : '' }}" value="" tabindex="27">
                                    @error('fecha_cambio_salario')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <!-- Columna derecha -->
                                <div class="form-group">
                                    <label for="salario_nuevo" class="text-secondary">Nuevo Salario*</label>
                                    <input type="number" name="salario_nuevo" class="form-control{{ $errors->has('salario_nuevo') ? ' is-invalid' : '' }}" value="" tabindex="25">
                                    @error('salario_nuevo')
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