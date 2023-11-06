@extends('adminlte::page')
@section('title', 'Nomina')
@section('content_header')
<h1>Nomina de empleados</h1>
@stop
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <!--Sección de botones-->
          <a class="btn btn-sm btn-outline-warning" href="{{route('nomina.create')}}">Nuevo</a>
        </h3>
      </div>
      <div class="card-body">
        <div id="table_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12 card-body table-responsive p-0">
                <!--Sección de tabla-->
                <table id="tabla-nomina" class="table table-bordered table-striped dataTable dtr-inline mt-1 table-head-fixed text-nowrap w-100" style="width:100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Unidad</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($empleados as $empleado)
                        <tr>
                          <td>{{ $empleado->empleado->codigo }}</td>
                          <td>{{ $empleado->empleado->primer_nombre }} {{ $empleado->empleado->segundo_nombre }} {{ $empleado->empleado->primer_apellido }} {{ $empleado->empleado->segundo_apellido }}</td>
                          <td>{{ $empleado->puesto->nombre}}</td>
                          <td>{{ $empleado->puesto->unidad_organizativa->nombre}}</td>
                          <td>
                            <a class="btn btn-outline-info btn-sm" href="{{ route('nomina.show', ['nomina' => $empleado->id]) }}">Mostrar</a>
                            <a class="btn btn-outline-info btn-sm ml-1" href="{{ route('nomina.edit', ['nomina' => $empleado->empleado->id]) }}">Editar</a>
                            <a class="btn btn-outline-info btn-sm ml-1" href="{{ route('nomina.editPuesto', ['id' => $empleado->id]) }}">Modificar Puesto</a>
                            <a class="btn btn-outline-info btn-sm ml-1" href="#">Modificar Salario</a>
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
<!-- Modal de eliminar -->
<!-- <div class="modal fade" id="confirmarEliminarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Confirmar eliminación</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <strong>¿Estás seguro de eliminar la actividad seleccionada?</strong>
        <p>Ten en cuenta que se eliminarán los datos relacionados a la actividad.</p>
      </div>
      <div class="modal-footer">
        <button id="eliminarProyectoBtn" class="btn btn-outline-danger btn-sm">Eliminar</button>
        <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div> -->
<!-- /.Modal de eliminar -->
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
<script src="{{ asset('js/nomina/nomina.js') }}"></script>
@stop