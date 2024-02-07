<?php
session_start();
include_once 'config/database.php';
include_once 'controllers/HeroController.php';
include_once 'controllers/UserController.php';

$heroController = new HeroController($conn);
$userController = new UserController($conn);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'addHero':
        case 'editHero':
        case 'updateHero':
        case 'deleteHero':
            // Verifica se o usuário está logado
            if (!isset($_SESSION['user_id'])) {
                header('Location: index.php?action=login');
                exit;
            }
            
            // Processa as ações de acordo com o método e a presença do ID
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

        case 'listHeroes':
            $heroController->listHeroes();
            break;
        
        case 'register':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userController->register($_POST);
            } else {
                include 'views/register_page.php';
            }
            break;

        case 'login':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userController->login($_POST['username'], $_POST['password']);
            } else {
                include 'views/login_page.php';
            }
            break;

        case 'logout':
            session_destroy();
            header('Location: index.php');
            break;

        default:
            include 'views/home.php';
            break;
    }
} else {
    include 'views/home.php';
}
?>
