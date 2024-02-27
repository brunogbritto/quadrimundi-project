<?php
session_start();
include_once 'config/database.php';
include_once 'controllers/CharacterController.php';
include_once 'controllers/UserController.php';

// Cria instâncias do HeroController e UserController
$characterController = new CharacterController($conn);
$userController = new UserController($conn); 


// Verifica se uma ação específica foi solicitada
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'addCharacter':
            // Exibe a página para adicionar um novo herói
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $characterController->addCharacterPage();
            }
            // Processa o formulário de adição de herói
            else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $characterController->addCharacter($_POST['name'], $_POST['power']);
            }
            break;

        case 'listCharacters':
            // Lista todos os heróis
            $characterController->listUserCharacters();
            break;

        case 'editCharacter':
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $characterController->editCharacterPage($_GET['id']);
            } else {
                // Redirecione para a lista de heróis ou exiba uma mensagem de erro
                header('Location: index.php?action=listCharacters');
                // ou
                // $_SESSION['error_message'] = "ID do Super-Herói não especificado.";
                // header('Location: index.php?action=erro');
            }
            break;
            
        case 'updateCharacter': 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $characterController->updateCharacter($_POST['id'], $_POST['name'], $_POST['power']);
            } else {
                header('Location: index.php?action=listCharacters');
            }
            break;

        case 'deleteCharacter':
            // Deleta um herói
            $characterController->deleteCharacter($_GET['id']);
            break;
            if ($_GET['action'] == 'addCharacter' && $_SERVER['REQUEST_METHOD'] == 'GET') {
                $characterController->addCharacterPage();
            } elseif ($_GET['action'] == 'addCharacter' && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $characterController->addCharacter($_POST['name'], $_POST['power']);
            } elseif ($_GET['action'] == 'editCharacter' && isset($_GET['id'])) {
                $characterController->editCharacterPage($_GET['id']);
            } elseif ($_GET['action'] == 'deleteCharacter' && isset($_GET['id'])) {
                $characterController->deleteCharacter($_GET['id']);
            } elseif ($_GET['action'] == 'updateCharacter' && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $characterController->updateCharacter($_POST['id'], $_POST['name'], $_POST['power']);
            }
            break;
        case 'register':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Processa o formulário de cadastro
                $userController->register($_POST);
            } else {
                // Exibe a página de cadastro
                include 'views/register_page.php';
            }
            break;
        // Adicione mais casos conforme necessário
        case 'login':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $isLoggedIn = $userController->login($_POST['username'], $_POST['password']);
                if ($isLoggedIn) {
                    header('Location: index.php?action=listCharacters');
                    exit;
                } else {
                    // Erro de login
                    $_SESSION['error_message'] = 'Nome de usuário ou senha inválidos.';
                    header('Location: index.php?action=login');
                    exit;
                }
            } else {
                include 'views/login_page.php';
            }
            break;

        case 'logout':
            session_destroy();
            header('Location: index.php');
            break;

        
        default:
            // Redireciona para a página inicial ou outra página padrão
            include 'views/home.php';
            break;

        case 'completeProfile':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userController->completeProfile($_POST);
            } else {
                // Se não for uma solicitação POST, redireciona para a página de completar perfil
                include 'views/complete_profile.php';
            }
            break;
    }
} else {
    // Ação padrão se nenhuma ação específica for solicitada
    include 'views/home.php';

}

?>
