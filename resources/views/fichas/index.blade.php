@extends('layouts.app')

@section('content')
@if(session('notification'))
    @php $notif = session('notification'); @endphp
    <div id="notifModal" class="notif-modal" style="display:none;">
        <div class="notif-modal-content">
            <span id="notifClose" class="notif-close">&times;</span>
            <h3>FICHA MEDICA GUARDADA EXITOSAMENTE</h3>
            <p>Le esperamos el día: <strong id="notifFecha">{{ $notif['Fecha_Cita'] }}</strong></p>
            <p>a la hora: <strong id="notifHora">{{ $notif['Hora_Cita'] }}</strong></p>
            <p>en la unidad de: <strong id="notifUnidad">{{ $notif['Nombre_Unidad'] }}</strong></p>
            <p>en el hospital: <strong id="notifHospital">{{ $notif['Nombre_Hospital'] }}</strong></p>
            <button id="notifOk" class="btn btn-primary">Aceptar</button>
        </div>
    </div>


@endif

<div class="form-container">
    <h2>Fichas Médicas</h2>

    @if(session()->has('usuario') && session('tipo_usuario') === 'medico')
        <div class="filter-buttons mb-3">
            <a href="{{ route('fichas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear Ficha Médica
            </a>
            
            <span class="filter-divider"></span>
            
            <a href="{{ route('fichas.index') }}" class="btn btn-secondary">
                <i class="fas fa-list"></i> Todas
            </a>
            <a href="{{ route('fichas.index', ['fecha' => 'hoy']) }}" class="btn btn-secondary">
                <i class="fas fa-calendar-day"></i> Fichas de Hoy
            </a>
            <a href="{{ route('fichas.index', ['estado' => 'Programada']) }}" class="btn btn-secondary">
                <i class="fas fa-clock"></i> Programadas
            </a>
            <a href="{{ route('fichas.index', ['estado' => 'Completada']) }}" class="btn btn-secondary">
                <i class="fas fa-check"></i> Completadas
            </a>
            
            @if(isset($unidades) && $unidades->count() > 0)
                <select class="form-control filter-select" id="filtroUnidad">
                    <option value="todas">Todas las Unidades</option>
                    @foreach($unidades as $unidad)
                        <option value="{{ $unidad->ID_Unidad }}" {{ request('unidad') == $unidad->ID_Unidad ? 'selected' : '' }}>
                            {{ $unidad->Nombre_Unidad }}
                        </option>
                    @endforeach
                </select>
            @endif
        </div>
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
                <th>Unidad</th>
                <th>Doctor</th>
                <th>Hospital</th>
                <th>Motivo Consulta</th>
                <th style="width: 9em;">Estado</th>
                @if(session()->has('usuario') && session('tipo_usuario') === 'medico')
                <!-- <th>Acciones</th> -->
                <th>Atencion</th>
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
                <td>{{ $ficha->Nombre_Unidad }}</td>
                <td>{{ $ficha->Nombres_PM }} {{ $ficha->Apellido_P_PM }}</td>
                <td>{{ $ficha->Nombre_Hospital }}</td>
                <td>{{ $ficha->Motivo_Consulta }}</td>
                <td>
                    @if(session()->has('usuario') && session('tipo_usuario') === 'medico')
                        <form action="{{ route('fichas.updateEstado', $ficha->No_Ficha_Medica) }}" method="POST" class="estado-form">
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
                    <a href="{{ route('historial_medico.create', ['ficha' => $ficha->No_Ficha_Medica]) }}" class="btn btn-primary">
                        <i class="fas fa-notes-medical"></i> Atender
                    </a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filtro de unidades
    const filtroUnidad = document.getElementById('filtroUnidad');
    if (filtroUnidad) {
        filtroUnidad.addEventListener('change', function() {
            if (this.value !== 'todas') {
                window.location.href = '{{ route("fichas.index") }}?unidad=' + this.value;
            } else {
                window.location.href = '{{ route("fichas.index") }}';
            }
        });
    }

    // Confirmación de cambio de estado
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