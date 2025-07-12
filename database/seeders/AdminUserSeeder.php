<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Crea el usuario administrador si no existe
        $admin = User::firstOrCreate(
            ['email' => 'correcta@correcta.com'],
            [
                'name' => 'Steven',
                'lastname' => 'Quevedor',
                'phone' => '72287585',
                'password' => bcrypt('correcta'), // puedes cambiar la clave
            ]
        );

        // Asigna el rol admin
        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }


        // Agente
        $agente = User::firstOrCreate(
            ['email' => 'preciosa@preciosa.com'],
            [
                'name' => 'Daniela',
                'lastname' => 'Perez',
                'phone' => '11111111',
                'password' => bcrypt('preciosa'),
            ]
        );
        $agente->assignRole('agente');

        // User
        $user = User::firstOrCreate(
            ['email' => 'pug@pug.com'],
            [
                'name' => 'Samuel',
                'lastname' => 'Menjivar',
                'phone' => '22222222',
                'password' => bcrypt('adrianita'),
            ]
        );
        $user->assignRole('user');
    }
}
