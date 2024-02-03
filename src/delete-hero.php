<?php
include "../config/database.php"; // Incluir arquivo de conexão

if (isset($_GET['id'])) {
    $heroId = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM heroes WHERE id = ?");
    $stmt->execute([$heroId]);

    header("Location: read-hero.php"); // Redirecionar para a lista de heróis
}
?>
