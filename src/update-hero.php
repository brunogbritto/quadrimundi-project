<?php
include "../config/database.php"; // Incluir arquivo de conexão

// Supondo que o ID do herói seja passado via GET
$heroId = $_GET['id'];

// Buscar dados do herói
$stmt = $conn->prepare("SELECT * FROM heroes WHERE id = ?");
$stmt->execute([$heroId]);
$hero = $stmt->fetch();

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar os dados do formulário
    $name = $_POST['name'];
    $power = $_POST['power'];
    // Outros campos...

    $updateStmt = $conn->prepare("UPDATE heroes SET name = ?, power = ? WHERE id = ?");
    $updateStmt->execute([$name, $power, $heroId]);

    header("Location: read-hero.php"); // Redirecionar para a lista de heróis
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Super-Herói</title>
    <link rel="stylesheet" href="/superheroes_project/public/css/style.css">

</head>
<body>
    <a href="../public/index.php" class="btn btn-back">Voltar para a Página Inicial</a>
    <h1>Editar Super-Herói</h1>
    <form method="post" onsubmit="return validateForm()">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="<?php echo $hero['name']; ?>"><br><br>

        <label for="power">Poder:</label>
        <input type="text" id="power" name="power" value="<?php echo $hero['power']; ?>"><br><br>

        <!-- Outros campos... -->

        <input type="submit" value="Atualizar Super-Herói">
    </form>
    <script src="/superheroes_project/public/js/validateForm.js"></script>
</body>
</html>
