@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Editar Paciente</h2>

    <form method="POST" action="{{ route('pacientes.update', $paciente->CI_Paciente) }}">
        @csrf @method('PUT')

        <div class="row">
            <div class="col-md-4">
                <label>Nombres</label>
                <input type="text" name="Nombres" value="{{ $paciente->Nombres }}" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Apellido Paterno</label>
                <input type="text" name="Apellido_P" value="{{ $paciente->Apellido_P }}" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Apellido Materno</label>
                <input type="text" name="Apellido_M" value="{{ $paciente->Apellido_M }}" class="form-control" required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Fecha Nacimiento</label>
                <input type="date" name="Fecha_Nacimiento" value="{{ $paciente->Fecha_Nacimiento }}" class="form-control" required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Tipo Sangre</label>
                <input type="text" name="Tipo_Sangre" value="{{ $paciente->Tipo_Sangre }}" class="form-control" required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Alergias</label>
                <textarea name="Alergias" class="form-control">{{ $paciente->Alergias }}</textarea>
            </div>

            <div class="col-md-6 mt-3">
                <label>Hospital</label>
                <select name="ID_Hospital" class="form-control" required>
                    @foreach($hospitales as $h)
                        <option value="{{ $h->ID_Hospital }}" {{ $paciente->ID_Hospital == $h->ID_Hospital ? 'selected' : '' }}>
                            {{ $h->Nombre_Hospital }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>
@endsection
