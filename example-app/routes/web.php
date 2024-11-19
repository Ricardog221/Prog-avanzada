<?php

use Illuminate\Support\Facades\Route;

Route::get('/operar/{operacion}/{num1}/{num2}', function ($operacion, $num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        return "Ambos parámetros deben ser números.";
    }

    switch ($operacion) {
        case 'suma':
            return "Resultado: " . ($num1 + $num2);
        case 'resta':
            return "Resultado: " . ($num1 - $num2);
        case 'multiplicacion':
            return "Resultado: " . ($num1 * $num2);
        case 'division':
            if ($num2 == 0) {
                return "No se puede dividir entre 0 xdxd.";
            }
            return "Resultado: " . ($num1 / $num2);
        default:
            return "Operación incorrecta. solo: suma, resta, multiplicacion o division.";
    }
});

Route::get('/saludar/{nombre}/{apellido?}', function ($nombre, $apellido = null) {
    if (!ctype_alpha($nombre) || ($apellido && !ctype_alpha($apellido))) {
        return "nombre y apellido deben contener solo letras.";
    }

    if ($apellido) {
        return "Hola, $nombre $apellido. Bienvenido/a!";
    }
    return "Hola, $nombre. Bienvenido!";
});

Route::get('/saludo/{nombre}', function ($nombre) {
    if (!ctype_alpha($nombre)) {
        return "El nombre debe contener solo letras.";
    }

    return view('saludo', ['nombre' => $nombre]);
});

