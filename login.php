<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tela de Login</title>
    <link rel="stylesheet" href="login.css" />
</head>
<body>

    <a href="home.php" class="back-link">Voltar</a>

    <div class="login-box">
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email" required />
            <br /><br />
            <input type="password" name="senha" placeholder="Senha" required />
            <br /><br />
            <button type="submit" name="submit" class="btn-submit">Enviar</button>
        </form>
    </div>

</body>
</html>