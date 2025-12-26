@extends('layouts.app')

@section('content')

<div class="form-container">
    <h2>Crear Ficha Médica</h2>

    <form action="{{ route('fichas-medicas.store') }}" method="POST">
        @csrf

        @if(session()->has('usuario') && session('tipo_usuario') === 'paciente')
            <input type="hidden" name="CI_Paciente" value="{{ session('usuario')->CI_Paciente }}">
            <div class="info-paciente">
                <strong>Paciente:</strong> {{ session('usuario')->Nombres }} {{ session('usuario')->Apellido_P }}
            </div>
        @else
            <label>Paciente</label>
            <select name="CI_Paciente" class="form-control" required>
                @foreach($pacientes as $p)
                    <option value="{{ $p->CI_Paciente }}">{{ $p->Nombres }} {{ $p->Apellido_P }}</option>
                @endforeach
            </select>
        @endif

        <label>Médico</label>
        <select name="Ci_Personal_Medico" class="form-control" required>
            <!-- mostrar solo los medicos del hospital del usuario logeado -->
            @if(session()->has('usuario') && session('tipo_usuario') === 'medico')
                @php
                    $medicoHospital = $medicos->firstWhere('CI_Personal_Medico', session('usuario')->CI_Personal_Medico)->ID_Hospital;
                @endphp
                @foreach($medicos->where('ID_Hospital', $medicoHospital) as $m)
                    <option value="{{ $m->Ci_Personal_Medico }}">{{ $m->Nombres_PM }} {{ $m->Apellido_P_PM }}</option>
                @endforeach
            @else
                @foreach($medicos as $m)
                    <option value="{{ $m->Ci_Personal_Medico }}">{{ $m->Nombres_PM }} {{ $m->Apellido_P_PM }}</option>
                @endforeach
            @endif
        </select>

        <label>Hospital</label>
        <select name="ID_Hospital" class="form-control" required>
            <!-- crear un if para que el usuario paciente o medico solo pueda ver su hospital -->
            @if(session()->has('usuario') && session('tipo_usuario') === 'medico')
                @php
                    $medicoHospital = $medicos->firstWhere('CI_Personal_Medico', session('usuario')->CI_Personal_Medico)->ID_Hospital;
                @endphp
                @foreach($hospitales->where('ID_Hospital', $medicoHospital) as $h)
                    <option value="{{ $h->ID_Hospital }}">{{ $h->Nombre_Hospital }}</option>
                @endforeach
            @elseif(session()->has('usuario') && session('tipo_usuario') === 'paciente')
                @php
                    $pacienteHospital = $pacientes->firstWhere('CI_Paciente', session('usuario')->CI_Paciente)->ID_Hospital;
                @endphp
                @foreach($hospitales->where('ID_Hospital', $pacienteHospital) as $h)
                    <option value="{{ $h->ID_Hospital }}">{{ $h->Nombre_Hospital }}</option>
                @endforeach
            @else
                @foreach($hospitales as $h)
                    <option value="{{ $h->ID_Hospital }}">{{ $h->Nombre_Hospital }}</option>
                @endforeach
            @endif
        </select>

        <label>Unidad</label>
        <select name="ID_Unidad" class="form-control" required>
            <!-- unidades ya filtradas en el controlador (ID_Departamento != 3) -->
            @foreach($unidades as $u)
                <option value="{{ $u->ID_Unidad }}">{{ $u->Nombre_Unidad }}</option>
            @endforeach
        </select>

        <input type="hidden" name="Fecha_Creacion" value="{{ date('Y-m-d') }}">

        <label>Fecha Cita</label>
        <input type="date" name="Fecha_Cita" class="form-control" min="{{ date('Y-m-d') }}" required>

        <label>Hora Cita</label>
        <input type="time" name="Hora_Cita" class="form-control" required>

        @if(session()->has('usuario') && session('tipo_usuario') === 'medico')
        <label>Estado Cita</label>
        <select name="Estado_Cita" class="form-control" required>
            <option value="Programada">Programada</option>
            <option value="Completada">Completada</option>
            <option value="Cancelada">Cancelada</option>
        </select>
        @else
        <input type="hidden" name="Estado_Cita" value="Programada">
        @endif

        <label>Motivo Consulta</label>
        <textarea name="Motivo_Consulta" class="form-control" required></textarea>

        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fechaCitaInput = document.querySelector('input[name="Fecha_Cita"]');
    const horaCitaInput = document.querySelector('input[name="Hora_Cita"]');
    const form = document.querySelector('form');

    form.addEventListener('submit', function(e) {
        const fechaCita = fechaCitaInput.value;
        const horaCita = horaCitaInput.value;
        
        if (fechaCita && horaCita) {
            // Validar que no sea en el pasado
            const ahora = new Date();
            const fechaHoraCita = new Date(fechaCita + 'T' + horaCita);
            
            if (fechaHoraCita < ahora) {
                e.preventDefault();
                alert('No puedes programar una cita en fecha/hora pasada.');
                return false;
            }
        }
    });
});
</script>
@endsection