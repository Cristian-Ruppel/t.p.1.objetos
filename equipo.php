<?php 
class equipo {
    private $nombre,$ciudad,$partidosJugados,$partidosGanados;

    public function __construct ($nombre,$ciudad,$partidosJugados,$partidosGanados) {
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
        $this->partidosJugados = $partidosJugados;
        $this->partidosGanados = $partidosGanados;
    }

}
?>