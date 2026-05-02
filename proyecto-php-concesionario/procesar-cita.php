$nombre_cliente = $_POST["nombre_cliente"] ?? "";
$email = $_POST["email"] ?? "";
$coche_interes = $_POST["coche_interes"] ?? "";
$missatge = $_POST["missatge"] ?? "";

// 3. Conexión a BD
require __DIR__ . "/db.php";

// 4. Insertar datos con Prepared Statements
try {
    $sql = "INSERT INTO citas_taller (id, nombre, email, coches)VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([null, $nombre_cliente, $email, $coche_interes]);

    // 5. Mostrar éxito
    if ($result) {
        require __DIR__ . "/includes/header.php"; 
        echo "<h1>¡Mensaje enviado correctamente!</h1>";
        echo "<a href='contacte.php'>Volver</a>";
        require __DIR__ . "/includes/footer.php";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
