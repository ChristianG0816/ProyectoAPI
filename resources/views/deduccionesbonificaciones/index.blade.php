@extends('adminlte::page')
@section('title', 'Deducciones y Bonificaciones')
@section('content_header')
    <h1>Deducciones y Bonificaciones del empleado con código {{$empleado->empleado->codigo}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <!--Sección de botones-->
                    <a class="btn btn-outline-info btn-sm" href="{{ route('deduccionesbonificaciones.create', ['id_empleado' => $empleado->id]) }}">Crear</a>
                  </h3>
            </div>

            <div class="card-body">
                <div id="table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 card-body table-responsive p-0">
                            <!--Sección de tabla-->
                            <table id="tabla-deduccion-bonificacion" class="table table-bordered table-striped dataTable dtr-inline mt-1 table-head-fixed text-nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Descripción del concepto</th>
                                        <th>Valor a pagar</th>
                                        <th>Acción</th>
                                        <th>Frecuencia</th>
                                        <th>Tipo de Movimiento</th>
                                        <th>Observación</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($movimientosNomina as $movimiento)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($movimiento->fecha_movimiento)->format('d/m/Y') }}</td>
                                        <td>{{ $movimiento->concepto }}</td>
                                        <td>{{ $movimiento->valor_pagar }}</td>
                                        <td>{{ $movimiento->accion }}</td>
                                        <td>{{ $movimiento->tipoFrecuencia->nombre }}</td>
                                        <td>{{ $movimiento->tipoMovimientoNomina->nombre }}</td>
                                        <td>{{ $movimiento->observacion }}</td>
                                        <td>
                                            <a class="btn btn-outline-info btn-sm ml-1" href="{{ route('deduccionesbonificaciones.edit', 
                                            ['id_empleado' => $empleado->id, 'id_movimiento' => $movimiento->id]) }}">Editar</a>
                                            <a class="btn btn-outline-danger btn-sm ml-1" href="#">Eliminar</a>
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
<script src="{{ asset('js/movimientos/movimientos.js') }}"></script>
@stop