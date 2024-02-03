<?php
include "../config/database.php"; // Incluir arquivo de conexão

try {
    $query = "SELECT * FROM heroes";
    $stmt = $conn->query($query);
    $heroes = $stmt->fetchAll();
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Super-Heróis</title>
    <link rel="stylesheet" href="/superheroes_project/public/css/style.css">

</head>
<body>
    <a href="../public/index.php" class="btn btn-back">Voltar para a Página Inicial</a>
    <h1>Lista de Super-Heróis</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Poder</th>
            <!-- Outros cabeçalhos de coluna -->
            <th>Ações</th>
        </tr>
        <?php foreach ($heroes as $hero): ?>
            <tr>
                <td><?php echo $hero['name']; ?></td>
                <td><?php echo $hero['power']; ?></td>
                <!-- Outros dados do herói -->
                <td>
                    <a href="update-hero.php?id=<?php echo $hero['id']; ?>">Editar</a> | 
                    <a href="delete-hero.php?id=<?php echo $hero['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este super-herói?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
