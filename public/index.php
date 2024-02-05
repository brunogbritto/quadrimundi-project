<?php
session_start();
include "../config/database.php"; 

$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'addHero'; 
$heroToEdit = null;

if (isset($_GET['tab']) && $_GET['tab'] != 'editHero') {
    $heroToEdit = null;
}

// Carregar dados para edição
if (isset($_GET['editId'])) {
    $heroId = $_GET['editId'];
    $stmt = $conn->prepare("SELECT * FROM heroes WHERE id = ?");
    $stmt->execute([$heroId]);
    $heroToEdit = $stmt->fetch();
    $activeTab = 'editHero';
}

// Tratar ação de POST para adicionar ou atualizar herói
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $power = $_POST['power'];

    if (isset($_POST['id']) && $_POST['id'] != '') {
        // Atualizar herói no banco de dados
        $heroId = $_POST['id'];
        $updateStmt = $conn->prepare("UPDATE heroes SET name = ?, power = ? WHERE id = ?");
        $updateStmt->execute([$name, $power, $heroId]);
        $_SESSION['success_message'] = "Super-Herói atualizado com sucesso!";
        header('Location: index.php?tab=listHeroes');
        $heroToEdit = null; // Redefinir após a edição
        exit;
    } else {
        // Adicionar novo herói ao banco de dados
        $query = "INSERT INTO heroes (name, power) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$name, $power]);
        $_SESSION['success_message'] = "Super-Herói adicionado com sucesso!";
    }
    header('Location: index.php');
    exit;
}

// Excluir herói do banco de dados
if (isset($_GET['deleteId'])) {
    $heroId = $_GET['deleteId'];
    $stmt = $conn->prepare("DELETE FROM heroes WHERE id = ?");
    $stmt->execute([$heroId]);
    $_SESSION['success_message'] = "Super-Herói excluído com sucesso!";
    header("Location: index.php?tab=listHeroes");
    exit;
}

// Lista os heróis no banco de dados
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Super-Heróis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Bem-vindo ao Sistema de Gestão de Super-Heróis</h1>

        <!-- Abas de Navegação -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?php echo $activeTab == 'addHero' ? 'active' : ''; ?>" href="index.php?tab=addHero">Adicionar Super-Herói</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $activeTab == 'listHeroes' ? 'active' : ''; ?>" href="index.php?tab=listHeroes">Listar Super-Heróis</a>
            </li>
            <?php if (isset($heroToEdit) && $heroToEdit != null): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $activeTab == 'editHero' ? 'active' : ''; ?>" href="#editHero">Editar Super-Herói</a>
            </li>
            <?php endif; ?>

        </ul>

        <!-- Conteúdo das Abas -->
        <div class="tab-content">
            <div id="addHero" class="container tab-pane <?php echo $activeTab == 'addHero' ? 'active' : 'fade'; ?>"><br>
                <!-- Correção no atributo action do formulário -->
                <form action="index.php" method="post" onsubmit="return validateForm()">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name"><br><br>
        
                    <label for="power">Poder:</label>
                    <input type="text" id="power" name="power"><br><br>

                    <!-- Adicionar mais campos conforme necessário -->

                    <input type="submit" value="Adicionar Super-Herói">
                </form>
                <?php if(isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success mt-3" id="successNotification">
                        <?php 
                        echo $_SESSION['success_message']; 
                        unset($_SESSION['success_message']); // Limpar a mensagem após exibição
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div id="listHeroes" class="container tab-pane <?php echo $activeTab == 'listHeroes' ? 'active' : 'fade'; ?>"><br>
                <h2>Lista de Super-Heróis</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Poder</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($heroes as $hero): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($hero['name']); ?></td>
                            <td><?php echo htmlspecialchars($hero['power']); ?></td>
                            <td class="text-center">
                                <a href="index.php?editId=<?php echo $hero['id']; ?>">Editar</a> | 
                                <a href="index.php?deleteId=<?php echo $hero['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este super-herói?');">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div id="editHero" class="container tab-pane <?php echo $activeTab == 'editHero' ? 'active' : 'fade'; ?>"><br>
            <?php if (isset($heroToEdit)): ?>
                <form action="index.php?tab=editHero" method="post">
                    <input type="hidden" name="id" value="<?php echo $heroToEdit['id']; ?>">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($heroToEdit['name']); ?>"><br><br>

                    <label for="power">Poder:</label>
                    <input type="text" id="power" name="power" value="<?php echo htmlspecialchars($heroToEdit['power']); ?>"><br><br>

                    <input type="submit" value="Atualizar Super-Herói">
                </form>
            <?php endif; ?>
            </div>
            </div>
        </div>
    </div>

    <script src="/superheroes_project/public/js/validateForm.js"></script>
    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Verifica se a notificação existe
        var notification = document.getElementById("successNotification");
        if (notification) {
            // Oculta a notificação após 5 segundos (5000 milissegundos)
            setTimeout(function() {
                notification.style.display = 'none';
            }, 1500);
        }
    });
    </script>

</body>
</html>
