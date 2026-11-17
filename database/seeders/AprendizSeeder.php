<?php
namespace Database\Seeders;

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
                'name' => 'YESICA JAZMIN  PEREZ QUIROGA', 
                'email' => 'yesicajazmin20001@gmail.com', 
                'password' => '1005462633'
            ],
            [
                'name' => 'LINEY VANESSA  AMADO VARGAS', 
                'email' => 'lineyamado1903@gmail.com', 
                'password' => '1033721319'
            ],
            [
                'name' => 'DULCE MARIA  MARTINEZ FONSECA', 
                'email' => 'dulcemartinezsena3@gmail.com', 
                'password' => '1100957218'
            ],
            [
                'name' => 'KAREN SAREY  ALVARADO VILLAMIZAR', 
                'email' => 'sareyalvarado@gmail.com', 
                'password' => '1096068382'
            ],
            [
                'name' => 'ANDREA CAMILA   AGUILAR MELENDEZ ', 
                'email' => 'aguilarmelendezandreacamila@gmail.com', 
                'password' => '1092360842'
            ],
            [
                'name' => 'NELSON ALBEIRO  LOZANO MORA', 
                'email' => 'neslonlozano@gmail.com', 
                'password' => '1109383582'
            ],
            [
                'name' => 'KAROL VANESSA  MARTINEZ FONSECA', 
                'email' => 'martinezfonsecakarolvanessa@gmail.com', 
                'password' => '1100957217'
            ],
            [
                'name' => 'JESUS DANIEL  CONTRERAS ROA', 
                'email' => 'contrerasroajesusdaniel@gmail.com', 
                'password' => '1097102883'
            ],
            [
                'name' => 'LAURA CAMILA  SARMIENTO GONZALEZ', 
                'email' => 'camgonzalez324@gmail.com', 
                'password' => '1096065335'
            ],
            [
                'name' => 'ELSA NICOLE  DUARTE CARVAJAL', 
                'email' => 'nickidavid.0922@gmail.com', 
                'password' => '1099735176'
            ],
            [
                'name' => 'SANTIAGO  DIAZ SANCHEZ', 
                'email' => 'sandiaz08.a@gmail.com', 
                'password' => '1102364490'
            ],
            [
                'name' => 'NAUDY SCARLET  VASQUEZ ROJAS', 
                'email' => 'naudy1711@gmail.com ', 
                'password' => '1096063639'
            ],
            [
                'name' => 'YULY ALEXANDRA  CARVAJAL VILLAMIZAR', 
                'email' => 'carvajalvillamiyulyalexandra@gmail.com', 
                'password' => '1098220388'
            ],
            [
                'name' => 'SHARIK NICOL  GONZALEZ JAIMES', 
                'email' => 'nicolgoja@gmail.com', 
                'password' => '1097094861'
            ],
            [
                'name' => 'NICOL ALEJANDRA  ANGARITA BOHORQUEZ', 
                'email' => 'alejaabohorquez124@gmail.com', 
                'password' => '1099741676'
            ],
            [
                'name' => 'JEIMMY NATHALIA  REYES MEJIA', 
                'email' => 'nathaliareyes26c@gmail.com', 
                'password' => '1097498986'
            ],
            [
                'name' => 'EDGAR ANDRES  SARMIENTO REY', 
                'email' => 'sarmientoandres61@gmail.com', 
                'password' => '1102391047'
            ],
            [
                'name' => 'NICOL LORENA  PORRAS MEJIA', 
                'email' => 'lorena2mejia2004@gmail.com', 
                'password' => '1097092313'
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
