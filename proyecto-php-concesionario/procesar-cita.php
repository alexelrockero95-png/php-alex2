<?php
// Comprobación de seguridad (Opcional pero muy recomendada)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Acceso denegado.";
    exit;
}

// 1. Recoger variables (ignoramos $missatge porque la tabla de citas no tiene esa columna)
$nombre_cliente = $_POST["nombre_cliente"] ?? "";
$email = $_POST["email"] ?? "";
$coche_interes = $_POST["coche_interes"] ?? "";

// 2. Conexión a BD
require __DIR__ . "/db.php";

// 3. Insertar datos con Prepared Statements
try {
    // Quitamos el ID (es automático) y usamos los nombres exactos de las columnas de tu BD
    $sql = "INSERT INTO citas_taller (nombre_cliente, email, coche_interes) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    // El array ahora tiene exactamente 3 variables, igual que los 3 interrogantes
    $result = $stmt->execute([$nombre_cliente, $email, $coche_interes]);

    // 4. Mostrar éxito
    if ($result) {
        require __DIR__ . "/includes/header.php"; 
        echo "<h1>¡Cita solicitada correctamente!</h1>";
        echo "<p>Gracias, nos pondremos en contacto contigo pronto.</p>";
        // Asegúrate de que este enlace vuelva a tu formulario real
        echo "<a href='cita.php' class='btn-peq azul'>Volver al concesionario</a>";
        require __DIR__ . "/includes/footer.php";
    }
} catch (PDOException $e) {
    echo "Error de base de datos: " . $e->getMessage();
}
?>
