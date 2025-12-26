@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Editar Hospital</h2>

    <form method="POST" action="{{ route('hospitales.update', $hospital->ID_Hospital) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="Nombre_Hospital" value="{{ $hospital->Nombre_Hospital }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nivel</label>
            <input type="text" name="Nivel_Hospital" value="{{ $hospital->Nivel_Hospital }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="Direccion_Hospital" value="{{ $hospital->Direccion_Hospital }}" class="form-control">
        </div>

        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
