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
                <th>Acciones</th>
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

                <td>

                    <a href="{{ route('personal_medico.edit', $medico->Ci_Personal_Medico) }}"
                       class="btn btn-warning">
                        Editar
                    </a>

                    <form action="{{ route('personal_medico.destroy', $medico->Ci_Personal_Medico) }}"
                          method="POST" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Eliminar este registro?')">
                            Eliminar
                        </button>
                    </form>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
