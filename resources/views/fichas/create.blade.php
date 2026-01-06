@extends('layouts.app')

@section('content')

<div class="form-container">
    <h2>Crear Ficha Médica</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fichas.store') }}" method="POST">
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
        <select name="Hora_Cita" class="form-control" required>
            <option value="">Seleccione una hora</option>
            <option value="08:00">08:00 AM</option>
            <option value="08:15">08:15 AM</option>
            <option value="08:30">08:30 AM</option>
            <option value="08:45">08:45 AM</option>
            <option value="09:00">09:00 AM</option>
            <option value="09:15">09:15 AM</option>
            <option value="09:30">09:30 AM</option>
            <option value="09:45">09:45 AM</option>
            <option value="10:00">10:00 AM</option>
            <option value="10:15">10:15 AM</option>
            <option value="10:30">10:30 AM</option>
            <option value="10:45">10:45 AM</option>
            <option value="11:00">11:00 AM</option>
            <option value="11:15">11:15 AM</option>
            <option value="11:30">11:30 AM</option>
            <option value="11:45">11:45 AM</option>
            <option value="12:00">12:00 PM</option>
            <option value="12:15">12:15 PM</option>
            <option value="12:30">12:30 PM</option>
            <option value="12:45">12:45 PM</option>
            <option value="13:00">01:00 PM</option>
            <option value="13:15">01:15 PM</option>
            <option value="13:30">01:30 PM</option>
            <option value="13:45">01:45 PM</option>
            <option value="14:00">02:00 PM</option>
            <option value="14:15">02:15 PM</option>
            <option value="14:30">02:30 PM</option>
            <option value="14:45">02:45 PM</option>
            <option value="15:00">03:00 PM</option>
            <option value="15:15">03:15 PM</option>
            <option value="15:30">03:30 PM</option>
            <option value="15:45">03:45 PM</option>
            <option value="16:00">04:00 PM</option>
            <option value="16:15">04:15 PM</option>
            <option value="16:30">04:30 PM</option>
            <option value="16:45">04:45 PM</option>
            <option value="17:00">05:00 PM</option>
            <option value="17:15">05:15 PM</option>
            <option value="17:30">05:30 PM</option>
            <option value="17:45">05:45 PM</option>
            <option value="18:00">06:00 PM</option>
        </select>

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

<style>
.hora-ocupada {
    background-color: #fee2e2 !important;
    color: #991b1b !important;
    font-weight: bold;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fechaCitaInput = document.querySelector('input[name="Fecha_Cita"]');
    const horaCitaSelect = document.querySelector('select[name="Hora_Cita"]');
    const medicoSelect = document.querySelector('select[name="Ci_Personal_Medico"]');
    const unidadSelect = document.querySelector('select[name="ID_Unidad"]');
    const form = document.querySelector('form');

    // Función para actualizar horas ocupadas
    async function actualizarHorasOcupadas() {
        const fecha = fechaCitaInput.value;
        const medico = medicoSelect.value;
        const unidad = unidadSelect.value;

        // Limpiar estilos previos
        const opciones = horaCitaSelect.querySelectorAll('option');
        opciones.forEach(opt => {
            opt.classList.remove('hora-ocupada');
            opt.disabled = false;
            if (opt.value !== '') {
                // Restaurar texto original sin emoji
                opt.textContent = opt.textContent.replace('🚫 ', '').replace(' - OCUPADA', '');
            }
        });

        if (!fecha || !medico || !unidad) {
            return;
        }

        try {
            const response = await fetch(`/fichas/horas-ocupadas?fecha=${fecha}&medico=${medico}&unidad=${unidad}`);
            const horasOcupadas = await response.json();

            // Marcar horas ocupadas en rojo
            horasOcupadas.forEach(hora => {
                const opcion = horaCitaSelect.querySelector(`option[value="${hora}"]`);
                if (opcion) {
                    opcion.classList.add('hora-ocupada');
                    opcion.disabled = true;
                    // Agregar indicador visual en el texto
                    const textoActual = opcion.textContent;
                    opcion.textContent = '🚫 ' + textoActual + ' - OCUPADA';
                }
            });
        } catch (error) {
            console.error('Error al obtener horas ocupadas:', error);
        }
    }

    // Escuchar cambios en fecha, médico y unidad
    fechaCitaInput.addEventListener('change', actualizarHorasOcupadas);
    medicoSelect.addEventListener('change', actualizarHorasOcupadas);
    unidadSelect.addEventListener('change', actualizarHorasOcupadas);

    // Validación al enviar el formulario
    form.addEventListener('submit', function(e) {
        const fechaCita = fechaCitaInput.value;
        const horaCita = horaCitaSelect.value;
        
        if (fechaCita && horaCita) {
            // Validar que no sea en el pasado
            const ahora = new Date();
            const fechaHoraCita = new Date(fechaCita + 'T' + horaCita);
            
            if (fechaHoraCita < ahora) {
                e.preventDefault();
                alert('No puedes programar una cita en fecha/hora pasada.');
                return false;
            }

            // Validar que no sea una hora ocupada
            const opcionSeleccionada = horaCitaSelect.querySelector(`option[value="${horaCita}"]`);
            if (opcionSeleccionada && opcionSeleccionada.classList.contains('hora-ocupada')) {
                e.preventDefault();
                alert('Esta hora ya está ocupada. Por favor selecciona otra hora.');
                return false;
            }
        }
    });
});
</script>
@endsection