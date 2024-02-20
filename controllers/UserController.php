<?php
include_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

       // Método para processar o registro simplificado
       public function register($userData) {
        // Aqui você pode adicionar validação dos dados recebidos

        // Chama o método 'createBasic' do modelo User para registro simplificado
        $userId = $this->userModel->createBasic($userData);

        if ($userId) {
            // Armazena o userId na sessão
            $_SESSION['user_id'] = $userId;
            // Feedback positivo e redirecionamento
            $_SESSION['success_message'] = 'Cadastro realizado com sucesso!';
            header('Location: index.php?action=listHeroes');
        } else {
            // Feedback de erro
            $_SESSION['error_message'] = 'Falha no cadastro. Tente novamente.';
            header('Location: index.php?action=register');
        }
    }

    // Método para processar o registro completo
    public function completeProfile($userData) {
        $userData['user_id'] = $_SESSION['user_id'];

        // Atualiza o usuário com informações completas
        $result = $this->userModel->updateUser($userData);

        if ($result) {
            // Feedback positivo e redirecionamento
            $_SESSION['profile_complete'] = true;
            $_SESSION['success_message'] = 'Perfil completo com sucesso!';
            header('Location: index.php?action=listHeroes');
        } else {
            // Feedback de erro
            $_SESSION['error_message'] = 'Falha ao completar o perfil. Tente novamente.';
            header('Location: views/complete_profile.php');
        }
    }

   // Método para processar o login
   public function login($username, $password) {
    // Obter dados do usuário pelo nome de usuário
    $user = $this->userModel->getUserByUsername($username);

    if ($user && password_verify($password, $user['password'])) {
        // Se a senha estiver correta, iniciar a sessão
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Verifique se o perfil está completo
        // Assumindo que 'fullname' é um dos campos que define se o perfil está completo
        if (!empty($user['fullname'])) {
            $_SESSION['profile_complete'] = true;
        } else {
            $_SESSION['profile_complete'] = false;
        }

        // Redirecionar para uma página, por exemplo, a lista de heróis
        header('Location: index.php?action=listHeroes');
        exit;
    } else {
        // Se as credenciais estiverem incorretas, enviar de volta para a página de login com uma mensagem de erro
        $_SESSION['error_message'] = 'Nome de usuário ou senha inválidos.';
        header('Location: index.php?action=login');
        exit;
    }
}

    // Método para processar logout (a ser implementado)
    // ...

    // Outros métodos conforme necessário
}
?>
