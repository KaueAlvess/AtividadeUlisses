<?php
if (isset($_POST['submit'])) {
    include_once('conexao.php');

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("sssssssss", $nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao realizar o cadastro.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="cadastro.css" />
</head>
<body>

    <a href="home.php" class="back-link">Voltar</a>

    <div class="box">
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend>Cadastro para Clientes</legend>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required />
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required />
                    <label for="senha" class="labelInput">Senha</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required />
                    <label for="email" class="labelInput">E-mail</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required />
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>

                <br><br>

                <p>Sexo:</p>
                <label><input type="radio" name="genero" value="feminino" required> Feminino</label>
                <label><input type="radio" name="genero" value="masculino"> Masculino</label>
                <label><input type="radio" name="genero" value="outro"> Outro</label>

                <br><br>

                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required />

                <br><br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required />
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required />
                    <label for="estado" class="labelInput">Estado</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required />
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>

                <br><br>

                <button type="submit" name="submit" class="btn-submit">Enviar</button>
            </fieldset>
        </form>
    </div>

</body>
</html>