<!-- register_page.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
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
            <div class="form-group">
                <label for="fullname">Nome Completo:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="artisticname">Nome Artístico:</label>
                <input type="text" class="form-control" id="artisticname" name="artisticname">
            </div>
            <div class="form-group">
                <label for="birthdate">Data de Nascimento:</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate">
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="form-group">
                <label for="state">Estado:</label>
                <input type="text" class="form-control" id="state" name="state">
            </div>
            <div class="form-group">
                <label for="phone1">Telefone 1:</label>
                <input type="tel" class="form-control" id="phone1" name="phone1">
            </div>
            <div class="form-group">
                <label for="phone2">Telefone 2:</label>
                <input type="tel" class="form-control" id="phone2" name="phone2">
            </div>
            <div class="form-group">
                <label for="website">Site:</label>
                <input type="url" class="form-control" id="website" name="website">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram:</label>
                <input type="text" class="form-control" id="instagram" name="instagram">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input type="text" class="form-control" id="facebook" name="facebook">
            </div>
            <div class="form-group">
                <label for="tiktok">TikTok:</label>
                <input type="text" class="form-control" id="tiktok" name="tiktok">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>