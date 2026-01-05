@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Mi Historial Médico</h2>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(!session()->has('usuario') || session('tipo_usuario') !== 'paciente')
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i> Debes iniciar sesión como paciente para ver tu historial médico.
        </div>
    @elseif($historial->isEmpty())
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> No tienes registros en tu historial médico.
            <br><small>Los registros se crean automáticamente cuando completas una cita médica.</small>
        </div>
    @else
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> Se encontraron {{ $historial->count() }} registro(s) en tu historial.
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha Atención</th>
                    <th>Hospital</th>
                    <th>Unidad</th>
                    <th>Médico</th>
                    <th>Enfermedad</th>
                    <th>Diagnóstico</th>
                    <th>Tratamiento</th>
                    <th>Observaciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($historial as $h)
                <tr>
                    <td>{{ $h->ID_Historial }}</td>
                    <td>{{ \Carbon\Carbon::parse($h->Fecha_Atencion)->format('d/m/Y') }}</td>
                    <td>{{ $h->hospital->Nombre_Hospital ?? '—' }}</td>
                    <td>{{ $h->unidad->Nombre_Unidad ?? '—' }}</td>
                    <td>
                        {{ $h->personalMedico->Nombres_PM ?? '' }}
                        {{ $h->personalMedico->Apellido_P_PM ?? '' }}
                    </td>
                    <td>{{ $h->Enfermedad_Principal }}</td>
                    <td>{{ $h->Diagnostico }}</td>
                    <td>{{ $h->Tratamiento }}</td>
                    <td>{{ $h->Observaciones ?? '—' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
