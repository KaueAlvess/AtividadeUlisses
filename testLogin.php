<?php

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        include_once('conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //print_r('Email: ' . $email);
        //print_r('<br>');
        //print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM usuarios WHERE email =  '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        //print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            header('Location: login.php');
        }
        else
        {
            header('Location: index.php');
        }
    }
    else
    {
        header('Location: login.php');
    }

?>