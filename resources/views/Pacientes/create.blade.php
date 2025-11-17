@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Registrar Paciente</h2>

    <form method="POST" action="{{ route('pacientes.store') }}">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <label>CI Paciente</label>
                <input type="text" name="CI_Paciente" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Nombres</label>
                <input type="text" name="Nombres" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Apellido Paterno</label>
                <input type="text" name="Apellido_P" class="form-control" required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Apellido Materno</label>
                <input type="text" name="Apellido_M" class="form-control" required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Fecha Nacimiento</label>
                <input type="date" name="Fecha_Nacimiento" class="form-control" required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Tipo Sangre</label>
                <input type="text" name="Tipo_Sangre" class="form-control" required>
            </div>

            <div class="col-md-6 mt-3">
                <label>Alergias</label>
                <textarea name="Alergias" class="form-control"></textarea>
            </div>

            <div class="col-md-6 mt-3">
                <label>Hospital</label>
                <select name="ID_Hospital" class="form-control" required>
                    <option value="">Seleccione...</option>
                    @foreach($hospitales as $h)
                        <option value="{{ $h->ID_Hospital }}">{{ $h->Nombre_Hospital }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mt-3">
                <label>Contraseña</label>
                <input type="password" name="Contrasena" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
