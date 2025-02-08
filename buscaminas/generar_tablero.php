<?php
session_start();

class Buscaminas {
    private $filas;
    private $columnas;
    private $tablero;

    public function __construct($filas, $columnas) {
        $this->filas = $filas;
        $this->columnas = $columnas;
        $this->tablero = [];
        $this->generarTablero();
    }

    private function generarTablero() {
        // Inicializar tablero vacío
        for ($i = 0; $i < $this->filas; $i++) {
            $fila = [];
            for ($j = 0; $j < $this->columnas; $j++) {
                $fila[] = 0; // 0 representa una celda sin mina
            }
            $this->tablero[] = $fila;
        }

        // Colocar minas aleatoriamente (10% del total de celdas)
        $totalCeldas = $this->filas * $this->columnas;
        $cantidadMinas = ceil($totalCeldas * 0.1);

        for ($n = 0; $n < $cantidadMinas; $n++) {
            do {
                $fila = rand(0, $this->filas - 1);
                $columna = rand(0, $this->columnas - 1);
            } while ($this->tablero[$fila][$columna] === 'M');

            $this->tablero[$fila][$columna] = 'M';
        }

        $_SESSION['tablero'] = $this->tablero;
    }

    public function obtenerTablero() {
        return $this->tablero;
    }
}

$datos = json_decode(file_get_contents('php://input'), true);
$filas = $datos['filas'];
$columnas = $datos['columnas'];

$buscaminas = new Buscaminas($filas, $columnas);
echo json_encode($buscaminas->obtenerTablero());
?>
