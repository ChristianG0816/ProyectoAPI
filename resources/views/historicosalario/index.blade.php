@extends('adminlte::page')
@section('title', 'Historico Salarios')
@section('content_header')
    <h1>Historico de Salarios del empleado con código {{$empleado->codigo}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <!--Sección de botones-->
                    <a class="btn btn-outline-info btn-sm" href="{{ route('nomina.editSalario', ['id' => $empleado->id]) }}">Crear</a>
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
                                        <th>Salario Anterior</th>
                                        <th>Nuevo Salario</th>
                                        <th>Fecha de Inicio de Nuevo Salario</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($historicoSalarios as $histoSal)
                                    <tr>
                                        <td>{{ $histoSal->salario_anterior }}</td>
                                        <td>{{ $histoSal->salario_nuevo }}</td>
                                        <td>{{ \Carbon\Carbon::parse($histoSal->fecha_cambio_salario)->format('d/m/Y') }}</td>
                                        <td>
                                            <a class="btn btn-outline-info btn-sm ml-1" href="">Editar</a>
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