@extends('adminlte::page')
@section('title', 'Reportes')
@section('content_header')
<h1 class="text-center">Nuevas contrataciones y ascensos del personal</h1>
@stop
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <form method="GET" action="{{ route('reporte-contrataciones') }}">
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
            <div class="col-md-4 d-flex align-items-center justify-content-end">
              <a href="{{ route('reporte-contrataciones') }}" class="btn btn-outline-secondary">Resetear</a>
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
                            <th>Puesto</th>
                            <th>Unidad</th>
                            <th>Salario</th>
                            <th>Fecha de inicio</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleadosPuesto as $empleadoPuesto)
                            <tr>
                                <td>{{ $empleadoPuesto->empleado->codigo }}</td>
                                <td>{{ $empleadoPuesto->empleado->primer_nombre }} {{ $empleadoPuesto->empleado->segundo_nombre }} {{ $empleadoPuesto->empleado->primer_apellido }} {{ $empleadoPuesto->empleado->segundo_apellido }}</td>
                                <td>{{ $empleadoPuesto->puesto->nombre}}</td>
                                <td>{{ $empleadoPuesto->puesto->unidad_organizativa->nombre}}</td>
                                <td>{{ $empleadoPuesto->salario_mensual}}</td>
                                <td>{{ $empleadoPuesto->fecha_inicio}}</td>
                                <td>
                                  @if($empleadoPuesto->cambio_puesto)
                                    Ascenso
                                  @else
                                    Contratación
                                  @endif
                                </td>
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
<script src="{{ asset('js/reportes/contrataciones.js') }}"></script>
@stop