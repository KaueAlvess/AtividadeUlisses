<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastrar Carros - Locadora</title>

  <!-- Importa os mesmos estilos do index -->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="index.css" />
  <style>
    main.container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-weight: bold;
    }

    input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    button[type="submit"] {
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 12px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<!-- Header -->
<header class="site-header">
  <div class="logo-container">
    <a href="index.php" class="logo-typing">🚗 Locadora de Carros</a>
  </div>
  <nav class="navbar">
    <ul class="nav-list">
      <li><a href="index.php">Produtos</a></li>
      <li><a href="cadastrar_carro.php">Cadastrar Carros</a></li>
      <li><a href="locacao.php">Locação</a></li>
      <li><a href="sobre.php">Sobre Nós</a></li>
      <li><a href="sac.php">SAC</a></li>
    </ul>
  </nav>
</header>

<main class="container">
  <h1 style="text-align:center;">Cadastrar Novo Carro</h1>
  <form action="salvar_carro.php" method="POST">
    <label for="nome">Nome do Carro:</label>
    <input type="text" id="nome" name="nome" required />

    <label for="preco">Preço por Dia (R$):</label>
    <input type="number" id="preco" name="preco" step="0.01" required />

    <label for="imagem">URL da Imagem:</label>
    <input type="text" id="imagem" name="imagem" placeholder="Ex: https://exemplo.com/foto.jpg"  required />

    <button type="submit">Salvar Carro</button>
  </form>
</main>

</body>
</html>