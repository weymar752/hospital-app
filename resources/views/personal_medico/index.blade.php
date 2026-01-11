@extends('layouts.app')

@section('content')
<div class="form-container">

    <h2>Lista de Personal Médico</h2>

    <a href="{{ route('personal_medico.create') }}" class="btn btn-primary mb-3">
        + Nuevo Personal Médico
    </a>

    <table>
        <thead>
            <tr>
                <th>CI</th>
                <th>Nombre Completo</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Categoría</th>
                <th>Hospital</th>
                <th>Unidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personal_medico as $medico)
            <tr>
                <td>{{ $medico->Ci_Personal_Medico }}</td>

                <td>
                    {{ $medico->Nombres_PM }} {{ $medico->Apellido_P_PM }} {{ $medico->Apellido_M_PM }}
                </td>

                <td>{{ $medico->Telefono }}</td>

                <td>{{ $medico->Email }}</td>

                <td>{{ $medico->categoria->Nombre_Categoria }}</td>

                <td>{{ $medico->hospital->Nombre_Hospital }}</td>

                <td>{{ $medico->unidad->Nombre_Unidad }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
