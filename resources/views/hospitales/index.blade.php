@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Listado de Hospitales</h2>
    <a href="{{ route('hospitales.create') }}" class="btn btn-primary mb-3">Nuevo Hospital</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nivel</th>
                <th>Dirección</th>
                @if(session()->has('usuario'))
                @if(session('tipo_usuario') === 'medico')
                <th>Acciones</th>
                @endif
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($hospitales as $h)
            <tr>
                <td>{{ $h->Nombre_Hospital }}</td>
                <td>{{ $h->Nivel_Hospital }}</td>
                <td>{{ $h->Direccion_Hospital }}</td>
                @if(session()->has('usuario'))
                @if(session('tipo_usuario') === 'medico')
                <td>
                    <a href="{{ route('hospitales.edit', $h->ID_Hospital) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('hospitales.destroy', $h->ID_Hospital) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
                @endif
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
