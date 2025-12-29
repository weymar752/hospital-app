@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Registrar Hospital</h2>

    <form method="POST" action="{{ route('hospitales.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="Nombre_Hospital" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nivel</label>
            <input type="text" name="Nivel_Hospital" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="Direccion_Hospital" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
