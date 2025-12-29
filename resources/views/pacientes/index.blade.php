@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Listado de Pacientes</h2>
    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Registrar Paciente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CI</th>
                <th>Nombre Completo</th>
                <th>Tipo Sangre</th>
                <th>Edad</th>
                <th>Hospital</th>
                <th>ID Historial</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $p)
            <tr>
                <td>{{ $p->CI_Paciente }}</td>
                <td>{{ $p->Nombres }} {{ $p->Apellido_P }} {{ $p->Apellido_M }}</td>
                <td>{{ $p->Tipo_Sangre }}</td>
                <td>{{ \Carbon\Carbon::parse($p->Fecha_Nacimiento)->age }} años</td>
                <td>{{ $p->hospital->Nombre_Hospital ?? '---' }}</td>
                <td>
                    @if($p->historialMedico->count())
                        {{ $p->historialMedico->first()->ID_Historial }}
                    @else
                        ---
                    @endif
                </td>

                <td>
                    <a href="{{ route('pacientes.edit', $p->CI_Paciente) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('pacientes.destroy', $p->CI_Paciente) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
