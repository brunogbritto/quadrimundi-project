<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Super-Heróis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4 d-flex justify-content-end">
    <!-- Saudação -->
    <?php if (isset($_SESSION['username'])): ?>
        <p class="mr-4 pt-2">Olá, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <?php endif; ?>
    <div><a href="index.php?action=logout" class="btn btn-danger">Logout</a></div>
    </div>
    <div class="container mt-4">
        <h1>Sistema de Gestão de Super-Heróis</h1>

        <!-- Abas de Navegação -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?php echo $activeTab == 'addHero' ? 'active' : ''; ?>" href="index.php?action=addHero">Adicionar Super-Herói</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $activeTab == 'listHeroes' ? 'active' : ''; ?>" href="index.php?action=listHeroes">Listar Super-Heróis</a>
            </li>
            <?php if (isset($heroToEdit) && $heroToEdit != null): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $activeTab == 'editHero' ? 'active' : ''; ?>" href="index.php?action=editHero&id=<?php echo $heroToEdit['id']; ?>">Editar Super-Herói</a>
            </li>
            <?php endif; ?>
            </ul>

        <!-- Inserção de Conteúdo Aqui -->
        <?php if (isset($content)) { include($content); } ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
