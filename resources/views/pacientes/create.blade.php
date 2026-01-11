@extends('layouts.app')

@section('content')

@if(session('error'))
<div id="notifModal" class="notif-modal" style="display:none;">
    <div class="notif-modal-content">
        <span id="notifClose" class="notif-close">&times;</span>
        <h3>⚠️ ERROR</h3>
        <p>{{ session('error') }}</p>
        <button id="notifOk" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif

@if(session('success'))
<div id="notifModal" class="notif-modal" style="display:none;">
    <div class="notif-modal-content">
        <span id="notifClose" class="notif-close">&times;</span>
        <h3>✓ ÉXITO</h3>
        <p>{{ session('success') }}</p>
        <button id="notifOk" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif

@if(session('success_message') && session('redirect_to_login'))
    <div id="notifModal" class="notif-modal" style="display:none;">
        <div class="notif-modal-content">
            <span id="notifClose" class="notif-close">&times;</span>
            <h3>✓ REGISTRO EXITOSO</h3>
            <p>{{ session('success_message') }}</p>
            <button id="notifOk" class="btn btn-primary" data-redirect-url="{{ route('login') }}">Aceptar</button>
        </div>
    </div>
    <!-- Script para redirigir al login al hacer clic en Aceptar -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var btnOk = document.getElementById('notifOk');
        if(btnOk && btnOk.hasAttribute('data-redirect-url')) {
            btnOk.addEventListener('click', function() {
                window.location.href = this.getAttribute('data-redirect-url');
            });
        }
    });
    </script>
@endif

<div class="form-container">
    <h2>Registrar Paciente</h2>

    <form method="POST" action="{{ route('pacientes.store') }}">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <label>CI Paciente</label>
                <input type="text" name="CI_Paciente" class="form-control" value="{{ old('CI_Paciente') }}" required>
            </div>

            <div class="col-md-4">
                <label>Nombres</label>
                <input type="text" name="Nombres" class="form-control" value="{{ old('Nombres') }}" required>
            </div>

            <div class="col-md-4">
                <label>Apellido Paterno</label>
                <input type="text" name="Apellido_P" class="form-control" value="{{ old('Apellido_P') }}" required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Apellido Materno</label>
                <input type="text" name="Apellido_M" class="form-control" value="{{ old('Apellido_M') }}" required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Fecha Nacimiento</label>
                <input type="date" name="Fecha_Nacimiento" class="form-control" value="{{ old('Fecha_Nacimiento') }}" required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Tipo Sangre</label>
                <input type="text" name="Tipo_Sangre" class="form-control" value="{{ old('Tipo_Sangre') }}" required>
            </div>

            <div class="col-md-6 mt-3">
                <label>Alergias</label>
                <textarea name="Alergias" class="form-control">{{ old('Alergias') }}</textarea>
            </div>

            <div class="col-md-6 mt-3">
                <label>Hospital</label>
                <select name="ID_Hospital" class="form-control" required>
                    <option value="">Seleccione...</option>
                    @foreach($hospitales as $h)
                        <option value="{{ $h->ID_Hospital }}" {{ old('ID_Hospital') == $h->ID_Hospital ? 'selected' : '' }}>{{ $h->Nombre_Hospital }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mt-3">
                <label>Contraseña</label>
                <input type="password" name="Contrasena" class="form-control" required>
            </div>
        </div>
        <br><br><br>
        <center><button class="btn btn-primary">Guardar</button></center>
    </form>
</div>
@endsection
