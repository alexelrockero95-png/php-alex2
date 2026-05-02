<?php
// 1. Comprobar método POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "No s'han rebut dades del formulari.";
    exit;
}

// 2. Recoger variables
$nom = $_POST["nom"] ?? "";
$telefon = $_POST["telefon"] ?? "";
$email = $_POST["email"] ?? "";
$missatge = $_POST["missatge"] ?? "";

// 3. Conexión a BD
require __DIR__ . "/db.php";

// 4. Insertar datos con Prepared Statements
try {
    $sql = "INSERT INTO contactos (nombre, telefono, correo, mensaje) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([$nom, $telefon, $email, $missatge]);

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

