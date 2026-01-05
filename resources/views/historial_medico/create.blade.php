@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Registrar Historial Médico</h2>

    <form action="{{ route('historial-medico.store') }}" method="POST">
        @csrf

        {{-- Ficha médica --}}
        <input type="hidden" name="No_Ficha_Medica" value="{{ $ficha->No_Ficha_Medica }}">
        <input type="hidden" name="CI_Paciente" value="{{ $ficha->CI_Paciente }}">
        <input type="hidden" name="ID_Hospital" value="{{ $ficha->ID_Hospital }}">
        <input type="hidden" name="ID_Unidad" value="{{ $ficha->ID_Unidad }}">
        <input type="hidden" name="Ci_Personal_Medico" value="{{ $ficha->Ci_Personal_Medico }}">

        <div class="info-paciente">
            <p><strong>Paciente:</strong> {{ $paciente->Nombres }} {{ $paciente->Apellido_P }}</p>
            <p><strong>Hospital:</strong> {{ $hospital->Nombre_Hospital }}</p>
            <p><strong>Unidad:</strong> {{ $unidad->Nombre_Unidad }}</p>
            <p><strong>Médico:</strong> {{ $medico->Nombres_PM }} {{ $medico->Apellido_P_PM }}</p>
        </div>

        <label>Fecha de Atención</label>
        <input type="date" name="Fecha_Atencion" class="form-control" value="{{ date('Y-m-d') }}" required>

        <label>Enfermedad Principal</label>
        <input type="text" name="Enfermedad_Principal" class="form-control" required>

        <label>Diagnóstico</label>
        <textarea name="Diagnostico" class="form-control" rows="4" required></textarea>

        <label>Tratamiento</label>
        <textarea name="Tratamiento" class="form-control" rows="4" required></textarea>

        <label>Observaciones</label>
        <textarea name="Observaciones" class="form-control" rows="3"></textarea>

        <button type="submit" class="btn btn-success mt-3">
            Guardar Historial
        </button>
    </form>
</div>
@endsection
