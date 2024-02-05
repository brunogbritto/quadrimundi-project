
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../config/database.php"; // Incluir o arquivo de conexão ao banco

    try {
        $name = $_POST['name'];
        $power = $_POST['power'];
        // Capture outros campos conforme necessário

        $query = "INSERT INTO heroes (name, power) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$name, $power]);

        echo "Super-Herói adicionado com sucesso!";
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Super-Herói</title>
    <link rel="stylesheet" href="/superheroes_project/public/css/style.css">

</head>
<body>
    <a href="../public/index.php" class="btn btn-back">Voltar para a Página Inicial</a>
    <h1>Adicionar Novo Super-Herói</h1>
    <form action="" method="post" onsubmit="return validateForm()">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name"><br><br>
        
        <label for="power">Poder:</label>
        <input type="text" id="power" name="power"><br><br>

        <!-- Adicione mais campos conforme necessário -->

        <input type="submit" value="Adicionar Super-Herói">
    </form>
<script src="/superheroes_project/public/js/validateForm.js"></script>
</body>
</html>
