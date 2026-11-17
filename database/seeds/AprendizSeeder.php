<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Tb_configuracion_basica;
use App\Tb_vista_personalizada;

class AprendizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aprendices = [
            [
                'name' => 'Lizeth Daniela Jaimes Moya',
                'email' => 'lizdjaimes@soy.sena.edu.co',
                'password' => Hash::make('Lizeth2024*DJM')
            ],
            [
                'name' => 'Samuel Alejandro Parada González',
                'email' => 'samaparada@soy.sena.edu.co',
                'password' => Hash::make('Samuel2024*APG')
            ],
            [
                'name' => 'Keyner Mauricio Calderon Moreno',
                'email' => 'keymcalderon@soy.sena.edu.co',
                'password' => Hash::make('Keyner2024*MCM')
            ],
            [
                'name' => 'Angel David Martinez Blanco',
                'email' => 'angeld_martinezb@soy.sena.edu.co',
                'password' => Hash::make('Angel2024*DMB')
            ],
            [
                'name' => 'Javier Augusto Ortiz Maldonado',
                'email' => 'javiera_ortiz1@soy.sena.edu.co',
                'password' => Hash::make('Javier2024*AOM')
            ],
            [
                'name' => 'Andres Santiago Lizarazo Vera',
                'email' => 'aslizarazo9@soy.sena.edu.co',
                'password' => Hash::make('Andres2024*SLV')
            ],
            [
                'name' => 'Paula Valentina Peñaloza Ibañez',
                'email' => 'paulav_penaloza@soy.sena.edu.co',
                'password' => Hash::make('Paula2024*VPI')
            ],
            [
                'name' => 'Monica Yisel Nova Fontecha',
                'email' => 'monynova@soy.sena.edu.co',
                'password' => Hash::make('Monica2024*YNF')
            ],
            [
                'name' => 'Jairo Andres Meza Rios',
                'email' => 'jairoa_meza@soy.sena.edu.co',
                'password' => Hash::make('Jairo2024*AMR')
            ],
            [
                'name' => 'Jhojan Martinez Rangel',
                'email' => 'jhojan.martinez1@soy.sena.edu.co',
                'password' => Hash::make('Jhojan2024*MR')
            ],
            [
                'name' => 'Alyson Saory Rivera Pimentel',
                'email' => 'alysrivera@soy.sena.edu.co',
                'password' => Hash::make('Alyson2024*SRP')
            ],
            [
                'name' => 'Darwin Alexis Marquez Coronel',
                'email' => 'Darwina_marquez@soy.sena.edu.co',
                'password' => Hash::make('Darwin2024*AMC')
            ],
            [
                'name' => 'Claudia Vanessa Pedrozo Cabarcas',
                'email' => 'claudia_pedrozo@soy.sena.edu.co',
                'password' => Hash::make('Claudia2024*VPC')
            ],
            [
                'name' => 'Ruth Noemi Briceño',
                'email' => 'ruth_briceno@soy.sena.edu.co',
                'password' => Hash::make('Ruth2024*NB')
            ],
            [
                'name' => 'Maritza Pérez Carreño',
                'email' => 'mperez553@soy.sena.edu.co',
                'password' => Hash::make('Maritza2024*PC')
            ],
            [
                'name' => 'Jenny Maritza Meléndez Rueda',
                'email' => 'jennym_melendez@soy.sena.edu.co',
                'password' => Hash::make('Jenny2024*MMR')
            ],
            [
                'name' => 'Maria Valentina Mantilla Villamizar',
                'email' => 'mariav_mantilla@soy.sena.edu.co',
                'password' => Hash::make('Maria2024*MMV')
            ],
            [
                'name' => 'Laura Juliana Pico Castillo',
                'email' => 'lauraj_pico@soy.sena.edu.co',
                'password' => Hash::make('Laura2024*JPC')
            ],
            [
                'name' => 'Mailyn Valeria Utrera Vargas',
                'email' => 'mvutrera@soy.sena.edu.co',
                'password' => Hash::make('Mailyn2024*VUV')
            ],
            [
                'name' => 'Yirley Yesenia Leguizamón Rodriguez',
                'email' => 'yirley_leguizamon@soy.sena.edu.co',
                'password' => Hash::make('Yirley2024*YLR')
            ],
            [
                'name' => 'Laura Daniela Santos Monsalve',
                'email' => 'laurad_santos@soy.sena.edu.co',
                'password' => Hash::make('Laura2024*DSM')
            ],
            [
                'name' => 'Leidy Johana Calvo Diaz',
                'email' => 'leidy_calvo@soy.sena.edu.co',
                'password' => Hash::make('Leidy2024*JCD')
            ],
            [
                'name' => 'Diego Alejandro Toledo Soler',
                'email' => 'diego_toledo@soy.sena.edu.co',
                'password' => Hash::make('Diego2024*ATS')
            ]            
        ];

        foreach ($aprendices as $aprendiz) {
            // Insertar usuario en la tabla `users`
            $idUser = DB::table('users')->insertGetId($aprendiz);

            $dato_basico = Tb_configuracion_basica::create(['nombre'=>$aprendiz['name'], 'direccion'=>'','nit'=>'','telefono'=>0,'representante'=>$aprendiz['name'],'cajaCompensacion'=>'','arl'=>'','nivelRiesgo'=>1,'idTipoNomina'=>3]);

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
