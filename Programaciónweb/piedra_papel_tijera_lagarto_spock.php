<?php
function jugar($jugador1, $jugador2) {
    $manos = ["Piedra", "Papel", "Tijera", "Lagarto", "Spock"];

    // Reglas del juego
    $reglas = [
        0 => [2, 3], // Piedra vence a Tijeras y Lagarto
        1 => [0, 4], // Papel vence a Piedra y Spock
        2 => [1, 3], // Tijeras vence a Papel y Lagarto
        3 => [1, 4], // Lagarto vence a Papel y Spock
        4 => [0, 2], // Spock vence a Piedra y Tijeras
    ];

    echo "Jugador 1 elige: " . $manos[$jugador1] . "\n";
    echo "Jugador 2 elige: " . $manos[$jugador2] . "\n";

    if ($jugador1 == $jugador2) {
        echo "Es un empate!\n";
    } elseif (in_array($jugador2, $reglas[$jugador1])) {
        echo "Jugador 1 gana!\n";
    } else {
        echo "Jugador 2 gana!\n";
    }
}

// Obtener argumentos de la línea de comandos
$jugador1 = $argv[1];
$jugador2 = $argv[2];

jugar($jugador1, $jugador2);
?>
