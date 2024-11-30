<?php 

spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', '/', $class);
    $baseDir = dirname(__DIR__, 2); // remonte de deux niveaux dans l'arborescence des répertoires
    $fullPath = $baseDir . '/' . $classPath . '.php';

    // Éliminer les doubles slashes
    $fullPath = preg_replace('#/+#', '/', $fullPath);

    if (file_exists($fullPath)) {
        require $fullPath;
    } else {
        throw new Exception("Failed to include " . ($fullPath ? $fullPath : 'File does not exist'));
    }
});















?>