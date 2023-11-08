@extends('adminlte::page')
@section('title', 'Reporte de Nuevas Contrataciones y Ascensos del Personal')
@section('content_header')
<h1 class="text-center">Horas trabajadas del personal</h1>
@stop
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <form method="GET" action="{{ route('reporte-horas') }}">
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                  <label for="fecha_inicio" class="text-secondary">Fecha de inicio</label>
                  <input type="date" name="fecha_inicio" class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" value="{{ old('fecha_inicio', $fecha_inicio) ?? '' }}" tabindex="1">
                  @error('fecha_inicio')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                  <label for="fecha_fin" class="text-secondary">Fecha de fin</label>
                  <input type="date" name="fecha_fin" class="form-control{{ $errors->has('fecha_fin') ? ' is-invalid' : '' }}" value="{{ old('fecha_fin', $fecha_fin) ?? '' }}" tabindex="2">
                  @error('fecha_fin')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="unidad_organizativa" class="text-secondary">Unidad Organizativa</label>
                  <select name="unidad_organizativa" class="form-control{{ $errors->has('unidad_organizativa') ? ' is-invalid' : '' }}" tabindex="3">
                      <option value="" {{ old('unidad_organizativa', $unidad_organizativa) == '' ? 'selected' : '' }}>Seleccione la unidad organizativa</option>
                      @foreach($unidades as $unidad)
                          <option value="{{ $unidad->nombre }}" {{ old('unidad_organizativa', $unidad_organizativa) == $unidad->nombre ? 'selected' : '' }}>
                              {{ $unidad->nombre }}
                          </option>
                      @endforeach
                  </select>
                  @error('unidad_organizativa')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-end">
              <a href="{{ route('reporte-horas') }}" class="btn btn-outline-secondary mx-1">Resetear</a>
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
                <table id="tabla-nomina" class="table table-bordered table-striped dataTable dtr-inline mt-1 table-head-fixed text-nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Unidad</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha fin</th>
                            <th>Días laborados</th>
                            <th>Turno</th>
                            <th>Horas normales</th>
                            <th>Horas extra</th>
                            <th>Horas días de descanso</th>
                            <th>Horas días festivos</th>
                            <th>Salario total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($historicos as $historico)
                            <tr>
                                <td>
                                    {{ $historico->empleado->empleado->codigo }}</td>
                                <td>
                                   {{ $historico->empleado->empleado->primer_nombre }}  {{ $historico->empleado->empleado->segundo_nombre }} {{ $historico->empleado->empleado->primer_apellido }} {{ $historico->empleado->empleado->segundo_apellido }}
                                </td>
                                <td>{{ $historico->unidad}}</td>
                                <td>{{ \Carbon\Carbon::parse($historico->fecha_inicio)->format('d/m/Y') }}</td>
                                <td>{{  \Carbon\Carbon::parse($historico->fecha_fin)->format('d/m/Y')   }}</td>
                                <td>{{ $historico->dias_laborados  }}</td>
                                <td>{{ $historico->turno  }}</td>
                                <td>{{ $historico->horas_normal  }}</td>
                                <td>{{ $historico->horas_extra_normal }}</td>
                                <td>{{ $historico->horas_dia_descanso  }}</td>
                                <td>{{ $historico->horas_dias_festivo  }}</td>
                                <td>{{ $historico->salario_total  }}</td>
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
<script src="{{ asset('js/reportes/horas.js') }}"></script>
@stop