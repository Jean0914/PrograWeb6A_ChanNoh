<?php
function imprimirDiamante($tamano) {
    // Validar que el tamaño sea un número entero positivo
    if (!is_numeric($tamano) || $tamano <= 0) {
        echo "Por favor, ingrese un número positivo como argumento.";
        return;
    }

    // Imprimir la parte superior del diamante
    for ($i = 1; $i <= $tamano; $i++) {
        echo str_repeat(" ", $tamano - $i) . str_repeat("*", 2 * $i - 1) . "\n";
    }

    // Imprimir la parte inferior del diamante
    for ($i = $tamano - 1; $i >= 1; $i--) {
        echo str_repeat(" ", $tamano - $i) . str_repeat("*", 2 * $i - 1) . "\n";
    }
}

// Llamada a la función con el tamaño proporcionado en la línea de comandos
if (isset($argv[1])) {
    $tamano = intval($argv[1]);
    imprimirDiamante($tamano);
} else {
    echo "Por favor, ingrese el tamaño del diamante como argumento.\n";
}
?>