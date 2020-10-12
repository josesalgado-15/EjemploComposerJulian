<?php

class Usuario // UpperCamelCase, { }
{
    //Propiedades
    public string $nombres;
    public string $apellidos;
    public float $documento;
    public string $direccion;
    public float $telefono;


    //Metodo
    public function saludar(string $nombres,string $apellidos,float $documento, string $direccion, float $telefono) { //Visibilidad, function, nombre metodo(parametros)
        return "Hola ".$nombres." $apellidos tus datos son: <br/> <br/> $documento <br/> $direccion <br/> $telefono" ;

    }

}
$persona = new Usuario(); //Crear el objeto

echo $persona->saludar("Julian Jose","Salgado Puentes"
        ,100272565, "Calle 5 sur #45-43", 3132591544)."<br/>"  ; //Llamar a un metodo

/*


class Carro // UpperCamelCase, { }
{
    //Propiedades
    public string $marca; //Visibilidad (public, protected, private)
    public string $color; // Tipos (bool, int, float, null, array, object)
    public bool $cajaAutomatica; // LowerCamelCase
    public float $cantidadGasolina;

    //Metodo Constructor
    public function __construct ($marca = "Generica", $color = "Rojo", $cajaAutomatica = false)
    {
        $this->marca = $marca; //Propiedad recibida y asigna a una propiedad de la clase
        $this->color = $color;
        $this->cajaAutomatica = $cajaAutomatica;
        $this->cantidadGasolina = 10;
    }

    //Metodo
    public function saludar (?string $nombre = "Usuario") : string { //Visibilidad, function, nombre metodo(parametros), retorno
        return "Hola ".$nombre.", Soy ".$this->marca." de color ".$this->color." como estas?<br/>";
    }

    public function tanquear (float $litros) : Carro{
        $this->cantidadGasolina += $litros;
        return $this;
    }

    public function viajar (int $kilometros) : Carro{
        $consumo = $kilometros / 50;
        $this->cantidadGasolina -= $consumo;
        return $this;
    }

}

$bmw = new Carro('BMW', 'Azul'); // Crear el objeto bmw de la clase Carro; A esto se le llama instanciacion.
$mercedes = new Carro(); //Segundo Objeto de la clase Objeto
$audi = new Carro("Audi", "Naranja", true);

echo $bmw->saludar('Diego');
echo $mercedes->saludar('Juan');
echo $audi->saludar('Pedro');

$audi->tanquear(20) //30 Litros
    ->viajar(100) // 28 Litros
    ->viajar(200) // 24 Litros
    ->tanquear(50)  // 74 Litros
    ->viajar(300) // 68 Litros
    ->tanquear(20); //88 Litros

echo "Soy ".$audi->marca." y tengo ".$audi->cantidadGasolina." Litros de Gasolina<br/>";
echo "Soy ".$bmw->marca." y tengo ".$bmw->cantidadGasolina." Litros de Gasolina<br/>";

//Obtener una propiedad
//echo $bmw->color."<br/>";   //Para obtener la propiedad de un objeto se usa el conecto ->
//echo $mercedes->color."<br/>";

//Establecer una propiedad
$bmw->color = "Azul";   //Para establecer una propiedad se le asigna de la misma manera que una variable
$bmw->marca = "BMW";
//echo "Soy un ".$bmw->marca." ".$bmw->color."<br/>";   //Imprimimos los valores

$mercedes->color = "Negro";
$mercedes->marca = "Mercedes Benz";
//echo "Soy un ".$mercedes->marca." ".$mercedes->color."<br/>";   //Imprimimos los valores

//Llamar a un metodo
//echo $bmw->saludar('Diego')."<br/>"; //Llamar a un metodo
//echo "Saludo: ".$bmw->marca." ".$bmw->saludar('Juan')."<br/>"; //Concatenar salida



$persona = new Usuario();

//Obtener una propiedad
echo $persona->nombres."<br/>";
echo $persona->apellidos."<br/>";

//Establecer una propiedad
$persona->nombres = "Julian Jose";
$persona->apellidos = "Salgado Puentes";
echo "Soy ".$persona->nombres." ".$persona->apellidos."<br/>";   //Imprimimos los valores


//Llamar a un metodo
echo $persona->saludar('Julian Jose')."<br/>"; //Llamar a un metodo
echo "Saludo: ".$persona->nombres." ".$persona->saludar()."<br/>"; //Concatenar salida



$bmw = new Carro(); // Crear el objeto bmw de la clase Carro; A esto se le llama instanciacion.
$mercedes = new Carro(); //Segundo Objeto de la clase Objeto

//Obtener una propiedad
echo $bmw->color."<br/>";   //Para obtener la propiedad de un objeto se usa el conecto ->
echo $mercedes->color."<br/>";

//Establecer una propiedad
$bmw->color = "Azul";   //Para establecer una propiedad se le asigna de la misma manera que una variable
$bmw->marca = "BMW";
echo "Soy un ".$bmw->marca." ".$bmw->color."<br/>";   //Imprimimos los valores

$mercedes->color = "Negro";
$mercedes->marca = "Mercedes Benz";
echo "Soy un ".$mercedes->marca." ".$mercedes->color."<br/>";   //Imprimimos los valores

//Llamar a un metodo
echo $bmw->saludar('Julian')."<br/>"; //Llamar a un metodo
echo "Saludo: ".$bmw->marca." ".$bmw->saludar()."<br/>"; //Concatenar salida
*/
