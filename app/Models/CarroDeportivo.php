<?php


namespace App\Models;


class CarroDeportivo extends Carro
{

    private int $cilindraje;

    /**
     * CarroDeportivo constructor.
     */
    public function __construct($marca = "Premium", $color = "azul", $anno = 2000, $cajaAutomatica = "si", $cilindraje=2000)

    {

        parent::__construct($marca, $color, $anno ,$cajaAutomatica);
        $this->setCilindraje($cilindraje);
        $this->setCantidadGasolina(50);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    /**
     * @return int
     */
    public function getCilindraje(): int
    {
        return $this->cilindraje;
    }

    /**
     * @param int $cilindraje
     */
    public function setCilindraje(int $cilindraje): void
    {
        $this->cilindraje = $cilindraje;
    }

    public function saludar(?string $nombre = "Usuario"): string
    {
        return "Hola soy un deportivo muy rapido". ", Soy ".$this->marca." Tengo ". $this->cilindraje. " cc". "<br/>";
    }



}