<?php

require_once ('..\app\Models\Carro.php');
require_once ('..\app\Models\CarroDeportivo.php');

use App\Models\Carro;
use App\Models\CarroDeportivo;


$bmw = new Carro('BMW ', 'Azul',
    2015,
    'si',
    'Vendido'); // Crear el objeto bmw de la clase Carro; A esto se le llama instanciacion.
$bmw->create();


$mercedes = new Carro(); //Segundo Objeto de la clase Objeto
$audi = new Carro("Audi", "Naranja", 2017, 'si','Vendido');


//Creacion de objeto
/*$astonMartin = new CarroDeportivo("Aston Martin");
$astonMartin->create();
echo $astonMartin;
echo $astonMartin->saludar();
*/

/*
//Actualizacion de datos en propiedad
$Mclaren = new Carro();
$Mclaren->setId(10);
$Mclaren->setMarca('Mclaren');
$Mclaren->setCajaAutomatica('si');
$Mclaren->setCantidadGasolina(80);
$Mclaren->setAnno(2018); //Fue creado como modelo 2019
$Mclaren->update();
echo $Mclaren;

//Eliminación de objetos, cambio de estado.
$Mclaren->deleted(10);
*/

/*
//Busquedas con y sin parametros
$allCars = Carro::getAll();
var_dump($allCars);

$arrCarros = Carro::search("SELECT * FROM concesionario.carro WHERE cajaAutomatica = 'no'");
var_dump($arrCarros);
*/

$busqueda = Carro::searchForId('11');
echo ($busqueda);


/*
echo $bmw->saludar();
echo $mercedes->saludar('Juan');
echo $audi->saludar('Pedro');

$audi->tanquear(20) //30 Litros
->viajar(100) // 28 Litros
->viajar(200) // 24 Litros
->tanquear(50)  // 74 Litros
->viajar(300) // 68 Litros
->tanquear(20); //88 Litros



echo "Soy ".$audi->getMarca()." y tengo ".$audi->getCantidadGasolina()." Litros de Gasolina<br/>";
echo "Soy ".$bmw->getMarca()." y tengo ".$bmw->getCantidadGasolina()." Litros de Gasolina<br/>";


//Establecer una propiedad
$bmw->setColor("Azul");   //Para establecer una propiedad se le asigna de la misma manera que una variable
$bmw->setMarca("BMW");
//echo "Soy un ".$bmw->marca." ".$bmw->color."<br/>";   //Imprimimos los valores

$mercedes->setColor("Negro");
$mercedes->setMarca("Mercedes Benz");
//echo "Soy un ".$mercedes->marca." ".$mercedes->color."<br/>";   //Imprimimos los valores

echo $bmw;
echo $audi;
echo $mercedes;
*/