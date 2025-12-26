<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            HospitalSeeder::class,
            SalaSeeder::class,
            DepartamentoSeeder::class,
            UnidadSeeder::class,
            EspecialidadSeeder::class,
            CategoriaSeeder::class,
            PersonalMedicoSeeder::class,
            PacienteSeeder::class,           
            HistorialMedicoSeeder::class,
            FichaMedicaSeeder::class,
            
        ]);
    }
}
