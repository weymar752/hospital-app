@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Registrar Historial Médico</h2>

    @if($ficha)
        <form action="{{ route('historial_medico.store') }}" method="POST">
            @csrf

            {{-- Campos ocultos con IDs --}}
            <input type="hidden" name="No_Ficha_Medica" value="{{ $ficha->No_Ficha_Medica }}">
            <input type="hidden" name="CI_Paciente" value="{{ $ficha->CI_Paciente }}">
            <input type="hidden" name="ID_Hospital" value="{{ $ficha->ID_Hospital }}">
            <input type="hidden" name="ID_Unidad" value="{{ $ficha->ID_Unidad }}">
            <input type="hidden" name="Ci_Personal_Medico" value="{{ $ficha->Ci_Personal_Medico }}">

            {{-- Información de la ficha (solo lectura) --}}
            <div class="info-section">
                <h4>
                    <i class="fas fa-info-circle"></i> Información de la Ficha Médica
                </h4>
                <div class="info-grid">
                    <div class="info-item">
                        <p><strong><i class="fas fa-user"></i> Paciente:</strong> 
                            {{ $ficha->paciente->Nombres ?? '' }} 
                            {{ $ficha->paciente->Apellido_P ?? '' }}
                            {{ $ficha->paciente->Apellido_M ?? '' }}
                        </p>
                        <p><strong><i class="fas fa-id-card"></i> CI Paciente:</strong> {{ $ficha->CI_Paciente }}</p>
                        <p><strong><i class="fas fa-calendar"></i> Fecha Cita:</strong> {{ \Carbon\Carbon::parse($ficha->Fecha_Cita)->format('d/m/Y') }}</p>
                    </div>
                    <div class="info-item">
                        <p><strong><i class="fas fa-hospital"></i> Hospital:</strong> {{ $ficha->hospital->Nombre_Hospital ?? 'N/A' }}</p>
                        <p><strong><i class="fas fa-door-open"></i> Unidad:</strong> {{ $ficha->unidad->Nombre_Unidad ?? 'N/A' }}</p>
                        <p><strong><i class="fas fa-user-md"></i> Médico:</strong> 
                            {{ $ficha->personalMedico->Nombres_PM ?? '' }} 
                            {{ $ficha->personalMedico->Apellido_P_PM ?? '' }}
                        </p>
                    </div>
                </div>
                <div>
                    <p><strong><i class="fas fa-comment-medical"></i> Motivo de Consulta:</strong> {{ $ficha->Motivo_Consulta }}</p>
                </div>
            </div>

            {{-- Fecha de Atención (pre-llenada con fecha de cita, editable) --}}
            <label><i class="fas fa-calendar-check"></i> Fecha de Atención</label>
            <input type="date" name="Fecha_Atencion" class="form-control" 
                   value="{{ $ficha->Fecha_Cita }}" required>

            {{-- Campos editables del historial --}}
            <label><i class="fas fa-disease"></i> Enfermedad Principal</label>
            <input type="text" name="Enfermedad_Principal" class="form-control" 
                   placeholder="Ejemplo: Hipertensión arterial, Diabetes tipo 2, etc." required>

            <label><i class="fas fa-stethoscope"></i> Diagnóstico</label>
            <textarea name="Diagnostico" class="form-control" rows="4" 
                      placeholder="Descripción detallada del diagnóstico médico..." required></textarea>

            <label><i class="fas fa-pills"></i> Tratamiento</label>
            <textarea name="Tratamiento" class="form-control" rows="4" 
                      placeholder="Medicamentos, dosis, frecuencia, duración..." required></textarea>

            <label><i class="fas fa-clipboard"></i> Observaciones</label>
            <textarea name="Observaciones" class="form-control" rows="3" 
                      placeholder="Observaciones adicionales, recomendaciones..."></textarea>

            <div class="form-actions mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Historial Médico
                </button>
                <a href="{{ route('fichas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    @else
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i> 
            No se encontró la ficha médica. Por favor, selecciona una ficha desde el listado.
        </div>
        <a href="{{ route('fichas.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Volver a Fichas Médicas
        </a>
    @endif
</div>
@endsection
