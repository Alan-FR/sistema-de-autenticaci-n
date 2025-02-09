<?php

# habilitar visualizacion de errores

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

# ruta de archivo de errores

$path = __DIR__ . '/error.log';

# configuracion de manejo de errores personalizado

set_error_handler(function ($errno, $errstr, $errfile, $errline) use ($path) {
    $errorMessage = date('Y-m-d H:i:s') . " - Error [$errno]: $errstr en $errfile en la línea $errline\n";
    error_log($errorMessage, 3, $path);
});

# exepciones no capturadas

set_exception_handler(function ($exception) use ($path) {
    $errorMessage = date('Y-m-d H:i:s') . " - Excepción no capturada: " . $exception->getMessage() . " en " . $exception->getFile() . " en la línea " . $exception->getLine() . "\n";
    error_log($errorMessage, 3, $path);
});

# Registrar cierre de scripts

register_shutdown_function(function () use ($path) {
    $error = error_get_last();
    if ($error !== NULL) {
        $errorMessage = date('Y-m-d H:i:s') . " - Error fatal: " . $error['message'] . " en " . $error['file'] . " en la línea " . $error['line'] . "\n";
        error_log($errorMessage, 3, $path);
    }
});