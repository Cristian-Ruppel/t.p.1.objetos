<?php 
class jugador{
    private $dni,$nombreCompleto,$fechaNacimiento,$altura,$equipo,$puntosTotales;

    public function __construct( $dni,$nombreCompleto,$fechaNacimiento,$altura,$equipo,$puntosTotales) {
        $this->dni = $dni;
        $this->nombreCompleto = $nombreCompleto;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->altura = $altura;
        $this->equipo = $equipo;
        $this->puntosTotales = $puntosTotales;
    }
}
?>

