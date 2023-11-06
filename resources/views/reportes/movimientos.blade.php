@extends('adminlte::page')
@section('title', 'Reporte de Deducciones y Bonificaciones de Empleados')
@section('content_header')
    <h1 class="text-center">Deducciones y Bonificaciones de Empleados</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="{{ route('reporte-movimientos') }}">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_tipo_frecuencia" class="text-secondary">Tipo de Frecuencia</label>
                                <select name="id_tipo_frecuencia" class="form-control{{ $errors->has('id_tipo_frecuencia') ? ' is-invalid' : '' }}">
                                    <option value="" selected>Seleccione un tipo de frecuencia</option>
                                    @foreach ($tiposFrecuencia as $tipoFrecuencia)
                                        <option value="{{ $tipoFrecuencia->id }}" {{ $tipoFrecuencia->id == old('id_tipo_frecuencia') ?? $movimientoNomina->id_tipo_frecuencia ? 'selected' : '' }}>
                                            {{ $tipoFrecuencia->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_tipo_frecuencia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_tipo_movimiento_nomina" class="text-secondary">Tipo de Movimiento</label>
                                <select name="id_tipo_movimiento_nomina" class="form-control{{ $errors->has('id_tipo_movimiento_nomina') ? ' is-invalid' : '' }}">
                                    <option value="" selected>Seleccione un tipo de movimiento</option>
                                    @foreach ($tiposMovimiento as $tipoMovimiento)
                                        <option value="{{ $tipoMovimiento->id }}" {{ $tipoMovimiento->id == old('id_tipo_movimiento_nomina') ?? $movimientoNomina->id_tipo_movimiento_nomina ? 'selected' : '' }}>
                                            {{ $tipoMovimiento->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_tipo_movimiento_nomina')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        


                    <div class="col-md-4 d-flex align-items-center justify-content-end">
                        <a href="{{ route('reporte-movimientos') }}" class="btn btn-outline-secondary mx-1">Resetear</a>
                        <button type="submit" class="btn btn-outline-secondary">Filtrar</button>
                      </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div id="table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 card-body table-responsive p-0">
                            <table id="tabla-movimientos" class="table table-bordered table-striped dataTable dtr-inline mt-1 table-head-fixed text-nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Código Empleado</th>
                                        <th>Nombre Empleado</th>
                                        <th>Fecha</th>
                                        <th>Tipo de Movimiento</th>
                                        <th>Valor</th>
                                        <th>Acción</th>
                                        <th>Frecuencia</th>
                                        <th>Observación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($movimientoNomina as $movimiento)
                                <tr>
                                    <td>{{ $movimiento->empleado->codigo }}</td>
                                    <td>{{ $movimiento->empleado->primer_nombre . " " . 
                                    $movimiento->empleado->segundo_nombre . " " . 
                                    $movimiento->empleado->primer_apellido . " " . 
                                    $movimiento->empleado->segundo_apellido }}</td>
                                    <td>{{ \Carbon\Carbon::parse($movimiento->fecha_movimiento)->format('d/m/Y') }}</td>
                                    <td>{{ $movimiento->tipoMovimientoNomina->nombre }}</td>
                                    <td>{{ "$" . " " . $movimiento->valor_pagar }}</td>
                                    <td>{{ $movimiento->accion }}</td>
                                    <td>{{ $movimiento->tipoFrecuencia->nombre }}</td>
                                    <td>{{ $movimiento->observacion }}</td>
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
<script src="{{ asset('js/reportes/movimientos.js') }}"></script>
@stop