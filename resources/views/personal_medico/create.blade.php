@extends('layouts.app')

@section('content')
<div class="form-container">

    <h2 class="text-2xl font-bold mb-4">Registrar Personal Médico</h2>

    <form action="{{ route('personal_medico.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-3 gap-4">

            <div>
                <label>CI Personal Médico</label>
                <input name="Ci_Personal_Medico" class="input" required>
            </div>

            <div>
                <label>Nombres</label>
                <input name="Nombres_PM" class="input" required>
            </div>

            <div>
                <label>Apellido Paterno</label>
                <input name="Apellido_P_PM" class="input" required>
            </div>

            <div>
                <label>Apellido Materno</label>
                <input name="Apellido_M_PM" class="input" required>
            </div>

            <div>
                <label>Teléfono</label>
                <input name="Telefono" class="input" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="Email" class="input" required>
            </div>

            <div>
                <label>Categoría</label>
                <select name="ID_Categoria" class="input" required>
                    <option value="">Seleccione</option>
                    @foreach($categorias as $c)
                        <option value="{{ $c->ID_Categoria }}">{{ $c->Nombre_Categoria }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Hospital</label>
                <select name="ID_Hospital" class="input" required>
                    <option value="">Seleccione</option>
                    @foreach($hospitales as $h)
                        <option value="{{ $h->ID_Hospital }}">{{ $h->Nombre_Hospital }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Unidad</label>
                <select name="ID_Unidad" class="input" required>
                    <option value="">Seleccione</option>
                    @foreach($unidades as $u)
                        <option value="{{ $u->ID_Unidad }}">{{ $u->Nombre_Unidad }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-3">
                <label>Contraseña</label>
                <input name="Contrasena" type="password" class="input" required>
            </div>

        </div>

        <br>

        <center><button class="btn btn-primary">Registrar</button></center>
    </form>

</div>
@endsection
