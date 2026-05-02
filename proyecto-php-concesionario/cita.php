<?php 
$pageTitle = "Contacto";
require __DIR__ . "/includes/header.php"; 
?>
<h1>Contacta con nosotros</h1>
<form action="create-contact.php" method="POST">
    <label>Nombre:</label> <input type="text" name="nom" required>
    <label>Email:</label> <input type="email" name="email" required>
    <label>Coche:</label> <textarea name="coches" rows="4" required></textarea>
    <button type="submit">Enviar</button>
</form>
<?php require __DIR__ . "/includes/footer.php"; ?>

    