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
    <?php
    // Verifica se o usuário está logado e se o perfil não está completo
    if (isset($_SESSION['user_id']) && (!isset($_SESSION['profile_complete']) || $_SESSION['profile_complete'] === false)) {
        echo '<a href="views/complete_profile.php" class="btn btn-warning mr-2 pt-2 mb-4">Completar Perfil</a>';
    }
    ?>
    <div><a href="index.php?action=logout" class="btn btn-danger">Logout</a></div>
    </div>
    <div class="container mt-4">
        <h1>Sistema de Gestão de Super-Heróis</h1>

        <!-- Abas de Navegação -->
        <ul class="nav nav-tabs">
        <?php if (isset($_SESSION['user_id']) && (isset($_SESSION['profile_complete']) && $_SESSION['profile_complete'])): ?>
        <li class="nav-item">
            <a class="nav-link <?php echo $activeTab == 'addCharacter' ? 'active' : ''; ?>" href="index.php?action=addCharacter">Adicionar Personagem</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" title="Complete seu perfil para adicionar um super-herói">Adicionar Personagem</a>
        </li>
        <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $activeTab == 'listCharacters' ? 'active' : ''; ?>" href="index.php?action=listCharacters">Listar Personagens</a>
            </li>
            <?php if (isset($heroToEdit) && $heroToEdit != null): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $activeTab == 'editCharacter' ? 'active' : ''; ?>" href="index.php?action=editHero&id=<?php echo $heroToEdit['id']; ?>">Editar Super-Herói</a>
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
