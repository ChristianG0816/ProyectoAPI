@extends('adminlte::page')
@section('title', 'Nomina')
@section('content_header')
<h1>Información del empleado</h1>
@stop
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

            <div class="card">
                <div class="card-header">Información del Empleado</div>
                <div class="card-body">
                    <!-- <div id="table_wrapper" class="wrapper dt-bootstrap4"> -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <h5 class="text-secondary">Información Personal</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <!-- Columna izquierda -->
                                <fieldset>
                                    <div class="form-group">
                                        <label for="codigo" class="text-secondary">Código</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->codigo }}</span> 
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="segundo_nombre" class="text-secondary">Segundo Nombre</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->segundo_nombre }}</span> 
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="segundo_apellido" class="text-secondary">Segundo Apellido</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->segundo_apellido }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="fecha_nacimiento" class="text-secondary">Fecha de nacimiento</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->fecha_nacimiento }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="departamento" class="text-secondary">Departamento</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->municipio->departamento->nombre }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="telefono" class="text-secondary">Telefono</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->telefono }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="estado_civil" class="text-secondary">Estado Civil</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->estado_civil }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="estado_civil" class="text-secondary">Fecha de contratación</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->fecha_ingreso }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <!-- Columna derecha -->
                                <fieldset>
                                    <div class="form-group">
                                        <label for="primer_nombre" class="text-secondary">Primer Nombre</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->primer_nombre }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="primer_apellido" class="text-secondary">Primer Apellido</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->primer_apellido }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="apellido_casada" class="text-secondary">Apellido Casada</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->apellido_casada ?? '-' }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="direccion" class="text-secondary">Dirección</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->direccion}}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="municipio" class="text-secondary">Municipio</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->municipio->nombre }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="nacionalidad" class="text-secondary">Nacionalidad</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->nacionalidad }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="sexo" class="text-secondary">Sexo</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->sexo }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <h5 class="text-secondary">Documentos</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="dui" class="text-secondary">DUI</label>
                                        <div>
                                            <span>{{ $dui}}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="nup" class="text-secondary">NUP</label>
                                        <div>
                                            <span>{{ $nup}}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="pasaporte" class="text-secondary">Pasaporte</label>
                                        <div>
                                            <span>{{ $pasaporte ?? '-' }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="nit" class="text-secondary">NIT</label>
                                        <div>
                                            <span>{{ $nit}}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="isss" class="text-secondary">ISSS</label>
                                        <div>
                                            <span>{{ $isss}}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="residencia" class="text-secondary">Carnet de Residencia</label>
                                        <div>
                                            <span>{{ $residencia ?? '-'}}</span>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <h5 class="text-secondary">Información de la Cuenta Bancaria</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                 <!-- Columna izquierda -->
                                <fieldset>
                                    <div class="form-group">
                                        <label for="banco" class="text-secondary">Banco</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->banco->nombre }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="numero_cuenta" class="text-secondary">Número de Cuenta</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->numero_cuenta }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <!-- Columna derecha -->
                                <fieldset>
                                    <div class="form-group">
                                        <label for="tipo_cuenta" class="text-secondary">Tipo de Cuenta</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->empleado->tipo_cuenta }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <h5 class="text-secondary">Información del Puesto</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <!-- Columna izquierda -->
                                <fieldset>
                                    <div class="form-group">
                                        <label for="puesto" class="text-secondary">Puesto</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->puesto->nombre }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="jornada" class="text-secondary">Jornada</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->jornada->codigo }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <!-- Columna derecha -->
                                <fieldset>
                                    <div class="form-group">
                                        <label for="salario" class="text-secondary">Salario</label>
                                        <div>
                                            <span>{{ $empleadoPuesto->salario_mensual }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="fecha_inicio" class="text-secondary">Fecha de Inicio en el Puesto
                                        </label>
                                        <div>
                                            <span>{{ $empleadoPuesto->fecha_inicio }}</span>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-6 text-left">
                                </div>
                                <div class="col-md-6 col-6 text-right">
                                    <a href="{{ route('nomina.index') }}" class="btn btn-danger">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@stop
