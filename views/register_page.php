    <!-- register_page.php -->
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-container bg-white rounded-xl">
            <h2>Cadastre-se</h2>
            <form action="index.php?action=register" method="post">
                <div class="form-group">
                    <label for="username">Nome de Usuário:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <p>Possui uma conta? <a href="index.php?action=login">Acesse já.</a></p>
      
                <button type="submit" class="btn custom-btn">Registrar</button>
            </form>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
    </html>