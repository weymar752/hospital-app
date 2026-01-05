@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Historial Médico</h2>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if($historial->isEmpty())
        <div class="alert alert-info">
            No existen registros en el historial médico.
        </div>
    @else
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
                    <td>{{ $h->Fecha_Atencion }}</td>
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
