@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Fichas Médicas</h2>

    @if(session()->has('usuario') && session('tipo_usuario') === 'medico')
        <a href="{{ route('fichas-medicas.create') }}" class="btn btn-primary mb-3">Crear Ficha Médica</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No Ficha</th>
                <th>CI Paciente</th>
                <th>Nombre Paciente</th>
                <th>Fecha Creación</th>
                <th>Fecha Cita</th>
                <th>Hora Cita</th>
                <th>Doctor</th>
                <th>Hospital</th>
                <th>Motivo Consulta</th>
                <th style="width: 9em;">Estado</th>
                @if(session()->has('usuario') && session('tipo_usuario') === 'medico')
                <th>Acciones</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @foreach($fichas as $ficha)
            <tr>
                <td>{{ $ficha->No_Ficha_Medica }}</td>
                <td>{{ $ficha->CI_Paciente }}</td>
                <td>{{ $ficha->Nombres }} {{ $ficha->Apellido_P }} {{ $ficha->Apellido_M }}</td>
                <td>{{ $ficha->Fecha_Creacion }}</td>
                <td>{{ $ficha->Fecha_Cita }}</td>
                <td>{{ $ficha->Hora_Cita }}</td>
                <td>{{ $ficha->Nombres_PM }} {{ $ficha->Apellido_P_PM }}</td>
                <td>{{ $ficha->Nombre_Hospital }}</td>
                <td>{{ $ficha->Motivo_Consulta }}</td>
                <td>
                    @if(session()->has('usuario') && session('tipo_usuario') === 'medico')
                        <form action="{{ route('fichas-medicas.updateEstado', $ficha->No_Ficha_Medica) }}" method="POST" class="estado-form">
                            @csrf
                            @method('PUT')
                            <select name="Estado_Cita" class="estado-select" onchange="this.form.submit()">
                                <option value="Programada" {{ $ficha->Estado_Cita == 'Programada' ? 'selected' : '' }}>Programada</option>
                                <option value="Completada" {{ $ficha->Estado_Cita == 'Completada' ? 'selected' : '' }}>Completada</option>
                                <option value="Cancelada" {{ $ficha->Estado_Cita == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                            </select>
                        </form>
                    @else
                        {{ $ficha->Estado_Cita }}
                    @endif
                </td>
                @if(session()->has('usuario') && session('tipo_usuario') === 'medico')
                <td>
                    <form action="{{ route('fichas-medicas.destroy', $ficha->No_Ficha_Medica) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('¿Eliminar ficha?')">Eliminar</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const estadoSelects = document.querySelectorAll('.estado-select');
    
    estadoSelects.forEach(select => {
        select.addEventListener('change', function(e) {
            const confirmChange = confirm('¿Estás seguro de cambiar el estado de esta cita?');
            
            if (!confirmChange) {
                e.preventDefault();
                this.value = this.getAttribute('data-previous-value') || this.value;
                return false;
            }
        });

        select.setAttribute('data-previous-value', select.value);
    });
});
</script>
@endsection