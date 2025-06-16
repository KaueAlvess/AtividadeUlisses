<?php
session_start();

include_once('conexao.php');

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $conexao->real_escape_string($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();
        $_SESSION['email'] = $usuario['email'];

        if ($usuario['tipo_usuario'] == 'admin') {
            header("Location: cadastrar_carro.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        echo "<script>alert('Email ou senha inválidos.'); window.location.href='testLogin.php';</script>";
    }
}
?>