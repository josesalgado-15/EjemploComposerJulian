<?php

namespace App\Models;
require_once ("BasicModel.php");

class Carro extends BasicModel // UpperCamelCase, { }
{
    //Propiedades
    protected int $id;
    protected string $marca; //Visibilidad (public, protected, private)
    protected string $color; // Tipos (bool, int, float, null, array, object)
    protected int $anno;
    protected bool $cajaAutomatica; //LowerCase
    protected float $cantidadGasolina;
    protected string $estado; // Disponible, Vendido, Apartado, En Reparacion

    //variable
    private array $marcasExcluidas = array('Lexus', 'opel', 'porsche');

    /**
     * Carro constructor.
     * @param string $marca
     */
    public function __construct(string $marca="Generica", $color="Rojo", $anno = 0, $cajaAutomatica = "No", $estado = "Disponible")
    {

        parent::__construct();
        $this->setMarca($marca);
        $this->setColor($color);
        $this->setAnno($anno);
        $this->setCajaAutomatica($cajaAutomatica);
        $this->setCantidadGasolina(10);
        $this->setEstado($estado);
    }

    public function __destruct() // Cierro Conexiones
    {
        /*echo "<span style='color: darkred'>";
        echo $this->getMarca()." se ha destruido<br/>";
        echo "</span>";*/
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setMarca(string $marca): void
    {
        if (in_array(strtolower($marca), $this->marcasExcluidas)) {
            echo "La marca del coche no esta aceptada";
        } else {
            $this->marca = $marca;

        }
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return bool
     */
    public function getCajaAutomatica(): string
    {
        return ($this->cajaAutomatica) ? "si" : "no";
    }

    /**
     * @param mixed|bool $cajaAutomatica
     */
    public function setCajaAutomatica(string $cajaAutomatica): void
    {
        $this->cajaAutomatica = strtolower(trim($cajaAutomatica)) == "si";
    }

    /**
     * @return float
     */
    public function getCantidadGasolina(): float
    {
        return $this->cantidadGasolina;
    }

    /**
     * @param float $cantidadGasolina
     */
    public function setCantidadGasolina(float $cantidadGasolina): void
    {
        $this->cantidadGasolina = $cantidadGasolina;
    }

    /**
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return int
     */
    public function getAnno(): int
    {
        return $this->anno;
    }

    /**
     * @param int $anno
     */
    public function setAnno(int $anno): void
    {
        $this->anno = $anno;
    }




    public function create()
    {
        $result = $this->insertRow("INSERT INTO concesionario.carro VALUES (NULL, ?, ?, ?, ?, ?, ?)", array(
                $this->getMarca(),
                $this->getColor(),
                $this->getAnno(),
                $this->getCajaAutomatica(),
                $this->getCantidadGasolina(),
                $this->getEstado()
            )
        );
        $this->Disconnect();
        return $result;
    }

    public function update()
    {
        $result = $this->updateRow("UPDATE concesionario.carro SET marca = ?, color = ?, anno = ?, cajaAutomatica = ?, cantidadGasolina = ?, estado = ? WHERE id = ?", array(
                $this->getMarca(),
                $this->getColor(),
                $this->getAnno(),
                $this->getCajaAutomatica(),
                $this->getCantidadGasolina(),
                $this->getEstado(),
                $this->getId()
            )
        );
        $this->Disconnect();
        return $this;
    }

    public function deleted($id)
    {
        $result = $this->updateRow('UPDATE concesionario.carro SET estado = ? WHERE id = ?', array(
                'Inactivo',
                $this->getId()
            )
        );
        $this->Disconnect();
        return $this;
    }

    public static function search($query)
    {
        $arrCarros = array();
        $tmp = new Carro();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Carro = new Carro();
            $Carro->setId($valor['id']);
            $Carro->setMarca($valor['marca']);
            $Carro->setColor($valor['color']);
            $Carro->setAnno($valor['anno']);
            $Carro->setCajaAutomatica($valor['cajaAutomatica']);
            $Carro->setCantidadGasolina($valor['cantidadGasolina']);
            $Carro->setEstado($valor['estado']);
            $Carro->Disconnect();
            array_push($arrCarros, $Carro);
        }
        $tmp->Disconnect();
        return $arrCarros;

    }

    public static function getAll()
    {
        return Carro::search("SELECT * FROM concesionario.carro");
    }

    public static function searchForId($id)
    {
       $Carro = null;
       if ($id>0){
           $Carro = new Carro();
           $getrow = $Carro->getRow("SELECT * FROM concesionario.carro WHERE id =?", array($id));
           $Carro->setId($getrow['id']);
           $Carro->setMarca($getrow['marca']);
           $Carro->setColor($getrow['color']);
           $Carro->setAnno($getrow['anno']);
           $Carro->setCajaAutomatica($getrow['cajaAutomatica']);
           $Carro->setCantidadGasolina($getrow['cantidadGasolina']);
           $Carro->setEstado($getrow['estado']);
       }
       $Carro->Disconnect();
       return $Carro;
    }

    //Metodos

    public function saludar (?string $nombre = "Usuario") :string {
        return "Hola " .$nombre. ", Soy ".$this->marca." de color ".$this->color." como estas?<br/>";
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

    public function __toString() : string
    {
        return
            "<strong>Marca:</strong> ".$this->getMarca()."<br/>".
            "<strong>Color:</strong> ".$this->getColor()."<br/>".
            "<strong>Año:</strong> ".$this->getAnno()."<br/>".
            "<strong>Caja Automatica:</strong> ".$this->getCajaAutomatica()."<br/>".
            "<strong>Cantidad de Gasolina:</strong> ".$this->getCantidadGasolina()."<br/>".
            "<strong>Estado:</strong> ".$this->getEstado()."<br/>";
    }

}
