PHP
<?php
try {
    $pdo = new PDO(
        "mysql:host=db;dbname=concesionario_php",
        "mecanico",
        "taller123",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
