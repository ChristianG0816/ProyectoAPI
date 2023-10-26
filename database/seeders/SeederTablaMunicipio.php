<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;
use App\Models\Municipio;

class SeederTablaMunicipio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define un arreglo de departamentos y sus municipios
        $municipiosPorDepartamento = [
            'Ahuachapán' => ['Ahuachapán','Apaneca','Atiquizaya','Concepción de Ataco','El Refugio','Guaymango','Jujutla','San Francisco Menéndez','San Lorenzo','San Pedro Puxtla','Tacuba','Turín'],
            'Cabañas' => ['Cinquera','Dolores','Guacotecti','Ilobasco','Jutiapa','San Isidro','Sensuntepeque','Tejutepeque','Victoria'],
            'Chalatenango' => ['Agua Caliente','Arcatao','Azacualpa','Chalatenango','Citalá','Comalapa','Concepción Quezaltepeque','Dulce Nombre de María','El Carrizal','El Paraíso','La Laguna','La Palma','La Reina','Las Vueltas','Nombre de Jesús','Nueva Concepción','Nueva Trinidad','Ojos de Agua','Potonico','San Antonio de la Cruz','San Antonio Los Ranchos','San Fernando','San Francisco Lempa','San Francisco Morazán','San Ignacio','San Isidro Labrador','San José Cancasque','San José Las Flores','San Luis del Carmen','San Miguel de Mercedes','San Rafael','Santa Rita','Tejutla'],
            'Cuscatlán' => ['Candelaria de la Frontera','Chalchuapa','Coatepeque','El Congo','El Porvenir','Masahuat','Metapán','San Antonio Pajonal','San Sebastián Salitrillo','Santa Ana','Santa Rosa Guachipilín','Santiago de la Frontera','Texistepeque'],
            'La Libertad' => ['Antiguo Cuscatlán','Chiltiupán','Ciudad Arce','Colón','Comasagua','Huizúcar','Jayaque','Jicalapa','La Libertad','Santa Tecla','Nuevo Cuscatlán','San Juan Opico','Quezaltepeque','Sacacoyo','San José Villanueva','San Matías','San Pablo Tacachico','Talnique','Tamanique','Teotepeque','Tepecoyo','Zaragoza'],
            'La Paz' => ['Cuyultitán','El Rosario','Jerusalén','Mercedes La Ceiba','Olocuilta','Paraíso de Osorio','San Antonio Masahuat','San Emigdio','San Francisco Chinameca','San Juan Nonualco','San Juan Talpa','San Juan Tepezontes','San Luis La Herradura','San Luis Talpa','San Miguel Tepezontes','San Pedro Masahuat','San Pedro Nonualco','San Rafael Obrajuelo','Santa María Ostuma','Santiago Nonualco','Tapalhuaca','Zacatecoluca'],
            'La Unión' => ['Anamorós','Bolívar','Concepción de Oriente','Conchagua','El Carmen','El Sauce','Intipucá','La Unión','Lislique','Meanguera del Golfo','Nueva Esparta','Pasaquina','Polorós','San Alejo','San José','Santa Rosa de Lima','Yayantique','Yucuaiquín'],
            'Morazán' => ['Arambala','Cacaquera','Chilanga','Corinto','Delicias de Concepción','El Divisadero','El Rosario','Gualococti','Guatajiagua','Joateca','Jocoaitique','Jocoro','Lolotiquillo','Meanguera','Osicala','Perquín','San Carlos','San Fernando','San Francisco Gotera','San Isidro','San Simón','Sensembra','Sociedad','Torola','Yamabal','Yoloaiquín'],
            'San Miguel' => ['Carolina','Chapeltique','Chinameca','Chirilagua','Ciudad Barrios','Comacarán','El Tránsito','Lolotique','Moncagua','Nueva Guadalupe','Nuevo Edén de San Juan','Quelepa','San Antonio','San Gerardo','San Jorge','San Luis de la Reina','San Miguel','San Rafael Oriente','Sesori','Uluazapa'],
            'San Salvador' => ['Aguilares','Apopa','Ayutuxtepeque','Ciudad Delgado','Cuscatancingo','El Paisnal','Guazapa','Ilopango','Mejicanos','Nejapa','Panchimalco','Rosario de Mora','San Marcos','San Martín','San Salvador','Santiago Texacuangos','Santo Tomás','Soyapango','Tonacatepeque'],
            'San Vicente' => ['Apastepeque','Guadalupe','San Cayetano Istepeque','San Esteban Catarina','San Ildefonso','San Lorenzo','San Sebastián','San Vicente','Santa Clara','Santo Domingo','Tecoluca','Tepetitán','Verapaz'],
            'Santa Ana' => ['Candelaria','Cojutepeque','El Carmen','El Rosario','Monte San Juan','Oratorio de Concepción','San Bartolomé Perulapía','San Cristóbal','San José Guayabal','San Pedro Perulapán','San Rafael Cedros','San Ramón','Santa Cruz Analquito','Santa Cruz Michapa','Suchitoto','Tenancingo'],
            'Sonsonate' => ['Acajutla','Armenia','Caluco','Cuisnahuat','Izalco','Juayúa','Nahuizalco','Nahulingo','Salcoatitán','San Antonio del Monte','San Julián','Santa Catarina Masahuat','Santa Isabel Ishuatán','Santo Domingo de Guzmán','Sonsonate','Sonzacate'],
            'Usulután' => ['Alegría','Berlín','California','Concepción Batres','El Triunfo','Ereguayquín','Estanzuelas','Jiquilisco','Jucuapa','Jucuarán','Mercedes Umaña','Nueva Granada','Ozatlán','Puerto El Triunfo','San Agustín','San Buenaventura','San Dionisio','San Francisco Javier','Santa Elena','Santa María','Santiago de María','Tecapán','Usulután']
        ];

        // Recorre los departamentos y sus municipios
        foreach ($municipiosPorDepartamento as $nombreDepartamento => $municipios) {
            $departamento = Departamento::where('nombre', $nombreDepartamento)->first();

            if ($departamento) {
                foreach ($municipios as $nombreMunicipio) {
                    Municipio::create(['nombre' => $nombreMunicipio, 'id_departamento' => $departamento->id]);
                }
            }
        }
    }
}
