<?php 
$pageTitle = "Galería";
require __DIR__ . "/includes/header.php"; 
?>
<h1>Galería de Imágenes</h1>
<div class="galeria">
    <?php
    $dir = __DIR__ . "/uploads";
    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file) {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            // Filtra solo jpg y png
            if (in_array($ext, ['jpg', 'png'])) {
                echo "<img src='uploads/$file' alt='Imagen de galería'>";
            }
        }
    } else {
        echo "<p>Carpeta uploads no encontrada.</p>";
    }
    ?>
</div>
<?php require __DIR__ . "/includes/footer.php"; ?>
