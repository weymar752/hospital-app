@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Editar Ficha Médica</h2>

    <form action="{{ route('fichas.update', $ficha->No_Ficha_Medica) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Paciente</label>
        <select name="CI_Paciente" class="form-control">
            @foreach($pacientes as $p)
                <option value="{{ $p->CI_Paciente }}" 
                    {{ $p->CI_Paciente == $ficha->CI_Paciente ? 'selected' : '' }}>
                    {{ $p->Nombres }} {{ $p->Apellido_P }}
                </option>
            @endforeach
        </select>

        <label>Médico</label>
        <select name="Ci_Personal_Medico" class="form-control">
            @foreach($medicos as $m)
                <option value="{{ $m->Ci_Personal_Medico }}"
                    {{ $m->Ci_Personal_Medico == $ficha->Ci_Personal_Medico ? 'selected' : '' }}>
                    {{ $m->Nombres_PM }} {{ $m->Apellido_P_PM }}
                </option>
            @endforeach
        </select>

        <label>Hospital</label>
        <select name="ID_Hospital" class="form-control">
            @foreach($hospitales as $h)
                <option value="{{ $h->ID_Hospital }}"
                    {{ $h->ID_Hospital == $ficha->ID_Hospital ? 'selected' : '' }}>
                    {{ $h->Nombre_Hospital }}
                </option>
            @endforeach
        </select>

        <label>Fecha Creación</label>
        <input type="date" name="Fecha_Creacion" value="{{ $ficha->Fecha_Creacion }}" class="form-control">

        <label>Fecha Cita</label>
        <input type="date" name="Fecha_Cita" value="{{ $ficha->Fecha_Cita }}" class="form-control">

        <label>Hora Cita</label>
        <input type="time" name="Hora_Cita" value="{{ $ficha->Hora_Cita }}" class="form-control">

        <label>Estado Cita</label>
        <input type="text" name="Estado_Cita" value="{{ $ficha->Estado_Cita }}" class="form-control">

        <label>Motivo Consulta</label>
        <textarea name="Motivo_Consulta" class="form-control">{{ $ficha->Motivo_Consulta }}</textarea>

        <button class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>
@endsection
