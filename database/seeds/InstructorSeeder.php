<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Tb_configuracion_basica;
use App\Tb_vista_personalizada;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instructores = [
            [
                'name' => 'Luz Dary Arias Arias',
                'email' => 'ldariasa@sena.edu.co',
                'password' => Hash::make('Luz2024*DAA')
            ]
        ];

        foreach ($instructores as $instructor) {
            // Insertar usuario en la tabla `users`
            $idUser = DB::table('users')->insertGetId($instructor);

            $dato_basico = Tb_configuracion_basica::create(['nombre'=>$instructor['name'], 'direccion'=>'','nit'=>'','telefono'=>0,'representante'=>$instructor['name'],'cajaCompensacion'=>'','arl'=>'','nivelRiesgo'=>1,'idTipoNomina'=>3]);

            // Asignar el rol de "Empresario" (idRol = 2) y empresa (idEmpresa = 1)
            DB::table('tb_usuario_tiene_rol')->insert([
                'idUser' => $idUser,
                'idRol' => 1, // Empresario
                'idEmpresa' => $dato_basico->id, // Empresa por defecto (puedes cambiarlo si es necesario)
            ]);

            $vista = Tb_vista_personalizada::create([
                'escritorio'=>1,'documentacion'=>1,'administracion'=>1,'conceptosCif'=>1,'materiales'=>1,'productos'=>1,'produccion'=>1,'kardex'=>1,'manoDeObra'=>1,'personas'=>1,'nomina'=>1,
                'gestionFinanciera'=>1,'idUser'=>$idUser,
            ]);
        }
    }
}


// en DatabaseSeeder
// $this->call(AprendizSeeder::class);


// php artisan make:seeder AprendizSeeder  
//php artisan db:seed --class=AprendizSeeder
