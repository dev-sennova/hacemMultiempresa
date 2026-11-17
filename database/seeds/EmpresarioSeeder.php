<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Tb_configuracion_basica;
use App\Tb_vista_personalizada;

class EmpresarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $empresarios = [
            [
                'name' => 'Freddy Mendez Ortiz',
                'email' => 'fmendezo@sena.edu.co',
                'password' => Hash::make('Instructor')
            ]    
        ];

        foreach ($empresarios as $empresario) {
            // Insertar usuario en la tabla `users`
            $idUser = DB::table('users')->insertGetId($empresario);
            /*$user= User::where('email',$empresario['email'])->first();
            $idUser = $user->id;*/

            $dato_basico = Tb_configuracion_basica::create(['nombre'=>$empresario['name'], 'direccion'=>'','nit'=>'','telefono'=>0,'representante'=>$empresario['name'],'cajaCompensacion'=>'','arl'=>'','nivelRiesgo'=>1,'idTipoNomina'=>3]);

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
