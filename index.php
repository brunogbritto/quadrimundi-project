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
            // Exibe a página para adicionar um novo personagem
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $characterController->addCharacterPage();
            }
            // Processa o formulário de adição de personagem
            else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Recolha todos os dados do formulário e armazene em um array
                $characterData = [
                    'name' => $_POST['name'],
                    'civil_identity' => $_POST['civil_identity'],
                    'age' => $_POST['age'],
                    'height' => $_POST['height'],
                    'weight' => $_POST['weight'],
                    'nationality' => $_POST['nationality'],
                    'ethnicity' => $_POST['ethnicity'],
                    'sexual_identity' => $_POST['sexual_identity'],
                    'pcd' => $_POST['pcd'],
                    'other_details' => $_POST['other_details'],
                    'costume' => $_POST['costume'],
                    'accessories' => $_POST['accessories'],
                    'special_abilities' => $_POST['special_abilities'],
                    'first_appearance' => $_POST['first_appearance'],
                    'backstory' => $_POST['backstory'],
                    'flg_super_heroi' => isset($_POST['flg_super_heroi']),
                    'flg_anti_heroi' => isset($_POST['flg_anti_heroi']),
                    'flg_super_vilao' => isset($_POST['flg_super_vilao']),
                    'flg_adulto' => isset($_POST['flg_adulto']),
                    'flg_terror' => isset($_POST['flg_terror']),
                    'flg_infantil' => isset($_POST['flg_infantil']),
                    'flg_ficcao_cientifica' => isset($_POST['flg_ficcao_cientifica']),
                    'flg_manga' => isset($_POST['flg_manga']),
                    'flg_comedia' => isset($_POST['flg_comedia']),
                    // Suponha que 'codAutor' é o ID do usuário logado
                    'codAutor' => $_SESSION['user_id'] 
                ];

                $characterController->addCharacter($characterData);
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
                $characterController->updateCharacter($_POST);
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
            $userController->logout();
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

        case 'showCharacter':
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $characterController->showCharacterDetails($_GET['id']);
            } else {
                header('Location: index.php?action=error'); // Ou uma página de erro específica
            }
            break;
    }
} else {
    // Ação padrão se nenhuma ação específica for solicitada
    include 'views/home.php';

}

?>
