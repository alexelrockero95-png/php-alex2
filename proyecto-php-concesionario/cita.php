<?php 
$pageTitle = "Contacto";
require __DIR__ . "/includes/header.php"; 
?>
<h1>Contacta con nosotros</h1>
<form action="procesar-cita.php" method="POST">
    <label>Nombre:</label> <input type="text" name="nombre_cliente" required>
    <label>Email:</label> <input type="email" name="email" required>
    <label>Coche:</label> <textarea name="coche_interes" rows="4" required></textarea>
    <button type="submit">Enviar</button>
</form>
<?php require __DIR__ . "/includes/footer.php"; ?>

    