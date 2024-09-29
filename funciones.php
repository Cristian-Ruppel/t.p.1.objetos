<?php
function jugadoresMasAltos($jugadores) {
    $alturaMaxima = 0;
    $jugadoresAltos = [];
    $j = 0;
    $cantidadJugadores = count($jugadores);

    while ($j < $cantidadJugadores) {
        $jugador = $jugadores[$j];
        $alturaActual = $jugador->altura;

        if ($alturaActual > $alturaMaxima) {
            $alturaMaxima = $alturaActual;
            $jugadoresAltos = [$jugador->nombreCompleto];
        } elseif ($alturaActual == $alturaMaxima) {
            $jugadoresAltos[] = $jugador->nombreCompleto;
        }
        $j++;
    }
    
    return $jugadoresAltos;
}

function equiposMasGanadores($equipos) {
    $maxGanados = 0;
    $equiposGanadores = [];
    $e = 0;
    $cantidadEquipos = count($equipos);

    while ($e < $cantidadEquipos) {
        if ($equipos[$e]["partidos_ganados"] > $maxGanados) {
            $maxGanados = $equipos[$e]["partidos_ganados"];
            $equiposGanadores = [$equipos[$e]['nombre']];
        } elseif ($equipos[$e]['partidos_ganados'] === $maxGanados) {
            $equiposGanadores[] = $equipos[$e]['nombre'];
        }
        $e++;
    }
    
    return $equiposGanadores;
}

function jugadoresConMasPuntos($jugadores) {
    $jugadoresConMasPuntos = [];

    for ($i = 0; $i < count($jugadores); $i++) {
        $jugadoresConMasPuntos[] = $jugadores[$i];
    }
    for ($i = 0; $i < count($jugadoresConMasPuntos); $i++) {
        for ($j = 0; $j < count($jugadoresConMasPuntos) - 1; $j++) {
            if ($jugadoresConMasPuntos[$j]->puntos < $jugadoresConMasPuntos[$j + 1]->puntos) {
                $temp = $jugadoresConMasPuntos[$j];
                $jugadoresConMasPuntos[$j] = $jugadoresConMasPuntos[$j + 1];
                $jugadoresConMasPuntos[$j + 1] = $temp;
            }
        }
    }
    $topJugadores = [];
    for ($k = 0; $k < 10 && $k < count($jugadoresConMasPuntos); $k++) {
        $topJugadores[] = $jugadoresConMasPuntos[$k];
    }
    return $topJugadores; 
}

function alturaPromedio($jugadores) {
    $alturaTotalPorEquipo = [];
    $cantidadJugadoresPorEquipo = [];

    foreach ($jugadores as $jugador) {
        $equipo = $jugador->equipo; 
        $altura = $jugador->altura;

        if (!isset($alturaTotalPorEquipo[$equipo])) {
            $alturaTotalPorEquipo[$equipo] = 0;
            $cantidadJugadoresPorEquipo[$equipo] = 0;
        }

        $alturaTotalPorEquipo[$equipo] += $altura;
        $cantidadJugadoresPorEquipo[$equipo]++;
    }
    $alturaPromedioPorEquipo = [];
    foreach ($alturaTotalPorEquipo as $equipo => $alturaTotal) {
        $alturaPromedio = $alturaTotal / $cantidadJugadoresPorEquipo[$equipo];
        $alturaPromedioPorEquipo[$equipo] = $alturaPromedio;
    }
    return $alturaPromedioPorEquipo; 
}

function jugadoresMasPuntosPeorEquipo($jugadores, $equipos) {
    $peorEquipo = "";
    $maxPerdidos = 0;

    foreach ($equipos as $equipo) {
        $partidosPerdidos = 82 - $equipo->victorias; 
        if ($partidosPerdidos > $maxPerdidos) {
            $maxPerdidos = $partidosPerdidos;
            $peorEquipo = $equipo->nombre; 
        }
    }

    $jugadoresConMasPuntos = []; 
    $maxPuntos = 0;

    foreach ($jugadores as $jugador) {
        if ($jugador->equipo === $peorEquipo) { 
            if ($jugador->puntos > $maxPuntos) {
                $maxPuntos = $jugador->puntos; 
                $jugadoresConMasPuntos = [$jugador]; 
            } elseif ($jugador->puntos === $maxPuntos) {
                $jugadoresConMasPuntos[] = $jugador; 
            }
        }
    }

    return $jugadoresConMasPuntos; 
}
?>