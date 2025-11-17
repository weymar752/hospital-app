@extends('layouts.app')

@section('content')
<div class="form-container">

    <h2 class="text-2xl font-bold mb-4">Editar Personal Médico</h2>

    <form action="{{ route('personal_medico.update', $medico->Ci_Personal_Medico) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-3 gap-4">

            <div>
                <label>CI Personal Médico</label>
                <input value="{{ $medico->Ci_Personal_Medico }}" class="input" disabled>
            </div>

            <div>
                <label>Nombres</label>
                <input name="Nombres_PM" value="{{ $medico->Nombres_PM }}" class="input" required>
            </div>

            <div>
                <label>Apellido Paterno</label>
                <input name="Apellido_P_PM" value="{{ $medico->Apellido_P_PM }}" class="input" required>
            </div>

            <div>
                <label>Apellido Materno</label>
                <input name="Apellido_M_PM" value="{{ $medico->Apellido_M_PM }}" class="input" required>
            </div>

            <div>
                <label>Teléfono</label>
                <input name="Telefono" value="{{ $medico->Telefono }}" class="input" required>
            </div>

            <div>
                <label>Email</label>
                <input name="Email" value="{{ $medico->Email }}" class="input" required>
            </div>

            <div>
                <label>Categoría</label>
                <select name="ID_Categoria" class="input">
                    @foreach($categorias as $c)
                        <option value="{{ $c->ID_Categoria }}"
                            {{ $medico->ID_Categoria == $c->ID_Categoria ? 'selected' : '' }}>
                            {{ $c->Nombre_Categoria }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Hospital</label>
                <select name="ID_Hospital" class="input">
                    @foreach($hospitales as $h)
                        <option value="{{ $h->ID_Hospital }}"
                            {{ $medico->ID_Hospital == $h->ID_Hospital ? 'selected' : '' }}>
                            {{ $h->Nombre_Hospital }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Unidad</label>
                <select name="ID_Unidad" class="input">
                    @foreach($unidades as $u)
                        <option value="{{ $u->ID_Unidad }}"
                            {{ $medico->ID_Unidad == $u->ID_Unidad ? 'selected' : '' }}>
                            {{ $u->Nombre_Unidad }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-3">
                <label>Contraseña</label>
                <input name="Contrasena" type="password" value="{{ $medico->Contrasena }}" class="input" required>
            </div>

        </div>

        <br>

        <button class="bg-yellow-600 text-white px-4 py-2 rounded">Actualizar</button>
    </form>

</div>
@endsection
