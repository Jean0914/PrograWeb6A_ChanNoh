<?php
session_start();

if (!isset($_SESSION['tablero'])) {
    echo json_encode(['error' => 'No se ha generado el tablero.']);
    exit;
}

$datos = json_decode(file_get_contents('php://input'), true);
$fila = $datos['fila'];
$columna = $datos['columna'];

$tablero = $_SESSION['tablero'];
$resultado = [];

if (isset($tablero[$fila][$columna])) {
    $resultado['valor'] = $tablero[$fila][$columna];
    
    // Revelar celda seleccionada
    if ($resultado['valor'] === 'M') {
        $resultado['estado'] = 'mina'; // Perdiste
    } else {
        $resultado['estado'] = 'seguro';
    }
} else {
    $resultado['error'] = 'Celda inválida.';
}

echo json_encode($resultado);
?>
