<?php
session_start();
include_once 'controllers/HeroController.php';

// Cria uma instância do HeroController
$controller = new HeroController();

// Verifica se uma ação específica foi solicitada
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'addHero':
            // Exibe a página para adicionar um novo herói
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $controller->addHeroPage();
            }
            // Processa o formulário de adição de herói
            else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controller->addHero($_POST['name'], $_POST['power']);
            }
            break;

        case 'listHeroes':
            // Lista todos os heróis
            $controller->listHeroes();
            break;

        case 'editHero':
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $controller->editHeroPage($_GET['id']);
            } else {
                // Redirecione para a lista de heróis ou exiba uma mensagem de erro
                header('Location: index.php?action=listHeroes');
                // ou
                // $_SESSION['error_message'] = "ID do Super-Herói não especificado.";
                // header('Location: index.php?action=erro');
            }
            break;
            
        case 'updateHero': 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controller->updateHero($_POST['id'], $_POST['name'], $_POST['power']);
            } else {
                header('Location: index.php?action=listHeroes');
            }
            break;

        case 'deleteHero':
            // Deleta um herói
            $controller->deleteHero($_GET['id']);
            break;

        // Adicione mais casos conforme necessário
    }
} else {
    // Ação padrão se nenhuma ação específica for solicitada
    $controller->listHeroes();
}

?>
