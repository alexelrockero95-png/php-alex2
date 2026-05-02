<?php 
$pageTitle = "Inventario de coches - TallerAlex PHP";
require __DIR__ . "/includes/header.php"; 
?>
<h1>Inventario de Coches</h1>
<table>
    <tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Año</th></tr>
    <?php
    require __DIR__ . "/db.php";
    try {
        $stmt = $pdo->query("SELECT * FROM vehiculos");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['marca'] . "</td>";
            echo "<td>" . $row['modelo'] . "</td>";
            echo "<td>" . $row['año'] . "</td>";
            echo "</tr>";
        }
    } catch (Exception $e) {
        echo "<tr><td colspan='4'>Error: " . $e->getMessage() . "</td></tr>";
    }
    ?>
</table>
<?php require __DIR__ . "/includes/footer.php"; ?>
