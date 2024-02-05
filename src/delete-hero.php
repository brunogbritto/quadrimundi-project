<?php
include "../config/database.php"; // Incluir arquivo de conexão

if (isset($_GET['id'])) {
    $heroId = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM heroes WHERE id = ?");
    $stmt->execute([$heroId]);

    header("Location: index.php"); // Redirecionar para a lista de heróis
}
?>
