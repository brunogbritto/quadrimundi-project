<?php
session_start();
include_once 'config/database.php';
include_once 'controllers/HeroController.php';
include_once 'controllers/UserController.php';

// Cria instâncias do HeroController e UserController
$heroController = new HeroController($conn);
$userController = new UserController($conn); 


// Verifica se uma ação específica foi solicitada
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'addHero':
            // Exibe a página para adicionar um novo herói
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $heroController->addHeroPage();
            }
            // Processa o formulário de adição de herói
            else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $heroController->addHero($_POST['name'], $_POST['power']);
            }
            break;

        case 'listHeroes':
            // Lista todos os heróis
            $heroController->listUserHeroes();
            break;

        case 'editHero':
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $heroController->editHeroPage($_GET['id']);
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
                $heroController->updateHero($_POST['id'], $_POST['name'], $_POST['power']);
            } else {
                header('Location: index.php?action=listHeroes');
            }
            break;

        case 'deleteHero':
            // Deleta um herói
            $heroController->deleteHero($_GET['id']);
            break;
            if ($_GET['action'] == 'addHero' && $_SERVER['REQUEST_METHOD'] == 'GET') {
                $heroController->addHeroPage();
            } elseif ($_GET['action'] == 'addHero' && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $heroController->addHero($_POST['name'], $_POST['power']);
            } elseif ($_GET['action'] == 'editHero' && isset($_GET['id'])) {
                $heroController->editHeroPage($_GET['id']);
            } elseif ($_GET['action'] == 'deleteHero' && isset($_GET['id'])) {
                $heroController->deleteHero($_GET['id']);
            } elseif ($_GET['action'] == 'updateHero' && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $heroController->updateHero($_POST['id'], $_POST['name'], $_POST['power']);
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
                    header('Location: index.php?action=listHeroes');
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
    }
} else {
    // Ação padrão se nenhuma ação específica for solicitada
    include 'views/home.php';

}

?>
