@extends('adminlte::page')
@section('title', 'Reporte de Aumentos y Disminuciones de Salarios del Personal')
@section('content_header')
<h1 class="text-center">Aumentos y Disminuciones de Salarios del Personal</h1>
@stop
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <form method="GET" action="{{ route('reporte-salarios') }}">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <label for="unidad_organizativa" class="text-secondary">Unidad Organizativa</label>
                  <select name="unidad_organizativa" class="form-control{{ $errors->has('unidad_organizativa') ? ' is-invalid' : '' }}" tabindex="3">
                      <option value="" {{ old('unidad_organizativa', $unidad_organizativa) == '' ? 'selected' : '' }}>Seleccione la unidad organizativa</option>
                      @foreach($unidades as $unidad)
                          <option value="{{ $unidad->id }}" {{ old('unidad_organizativa', $unidad_organizativa) == $unidad->id ? 'selected' : '' }}>
                              {{ $unidad->nombre }}
                          </option>
                      @endforeach
                  </select>
                  @error('unidad_organizativa')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="puesto" class="text-secondary">Puesto</label>
                  <select name="puesto" class="form-control{{ $errors->has('puesto') ? ' is-invalid' : '' }}" tabindex="3">
                      <option value="" {{ old('puesto', $puesto) == '' ? 'selected' : '' }}>Seleccione un puesto de trabajo</option>
                      @foreach($puestos as $p)
                          <option value="{{ $p->id }}" {{ old('puesto', $puesto) == $p->id ? 'selected' : '' }}>
                              {{ $p->nombre }}
                          </option>
                      @endforeach
                  </select>
                  @error('puesto')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-end">
              <a href="{{ route('reporte-salarios') }}" class="btn btn-outline-secondary mx-1">Resetear</a>
              <button type="submit" class="btn btn-outline-secondary">Filtrar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="card-body">
        <div id="table_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12 card-body table-responsive p-0">
                <!--Sección de tabla-->
                <table id="tabla-salario" class="table table-bordered table-striped dataTable dtr-inline mt-1 table-head-fixed text-nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Unidad</th>
                            <th>Salario Anterior</th>
                            <th>Salario Nuevo</th>
                            <th>Fecha de Inicio de Nuevo Salario</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleadosSalarios as $salario)
                            <tr>
                                <td>{{ $salario->empleado_puesto->empleado->codigo }}</td>
                                <td>{{ $salario->empleado_puesto->empleado->primer_nombre }} {{ $salario->empleado_puesto->empleado->segundo_nombre }} {{ $salario->empleado_puesto->empleado->primer_apellido }} {{ $salario->empleado_puesto->empleado->segundo_apellido }}</td>
                                <td>{{ $salario->empleado_puesto->puesto->nombre }}</td>
                                <td>{{ $salario->empleado_puesto->puesto->unidad_organizativa->nombre }}</td>
                                <td>{{ $salario->salario_anterior }}</td>
                                <td>{{ $salario->salario_nuevo }}</td>
                                <td>{{ $salario->fecha_cambio_salario }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@section('js')
<script>
  jQuery.noConflict();
  (function($) {      
    toastr.options = {"closeButton": true, "progressBar": true}
    @if (Session::has('success'))
      toastr.success("{{ session('success') }}");
    @endif

    @if (Session::has('error'))
      toastr.error("{{ session('error') }}");
    @endif
  })(jQuery);
</script>
<script src="{{ asset('js/reportes/salarios.js') }}"></script>
@stop