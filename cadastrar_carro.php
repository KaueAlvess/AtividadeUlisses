<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('conexao.php');

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $modelo = $_POST['modelo'];
    $valor_diaria = $_POST['valor_diaria'];
    $imagem = $_POST['imagem'];

    // Validar campos obrigatórios
    if (empty($modelo) || empty($valor_diaria) || empty($imagem)) {
        $mensagem = '<div class="alert alert-danger">Preencha todos os campos.</div>';
    } elseif (!is_numeric($valor_diaria)) {
        $mensagem = '<div class="alert alert-danger">O campo "Valor Diário" deve ser um número válido.</div>';
    } elseif (!filter_var($imagem, FILTER_VALIDATE_URL)) {
        $mensagem = '<div class="alert alert-danger">A URL da imagem é inválida.</div>';
    } else {

        $modelo = $conexao->real_escape_string($modelo);
        $valor_diaria = $conexao->real_escape_string($valor_diaria);
        $imagem = $conexao->real_escape_string($imagem);

        
        $sql = "INSERT INTO carros 
                (modelo, valor_diaria, imagem) 
                VALUES ('$modelo', '$valor_diaria', '$imagem')";

        if ($conexao->query($sql) === TRUE) {
            header("Location: index2.php");
            exit();
        } else {
            $mensagem = '<div class="alert alert-danger">Erro ao salvar o carro: ' . $conexao->error . '</div>';
        }
    }
}
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

    .alert {
      padding: 10px;
      border-radius: 4px;
      font-weight: bold;
    }

    .alert-danger {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
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
      <li><a href="index2.php">Produtos</a></li>
      <li><a href="cadastrar_carro.php">Cadastrar Carros</a></li>
      <li><a href="locacao2.php">Locação</a></li>
      <li><a href="sobre2.php">Sobre Nós</a></li>
      <li><a href="sac2.php">SAC</a></li>
    </ul>
  </nav>
</header>

<main class="container">
  <h1 style="text-align:center;">Cadastrar Novo Carro</h1>

  <!-- Mostrar mensagem de erro ou sucesso -->
  <?php if (!empty($mensagem)): ?>
    <?= $mensagem ?>
  <?php endif; ?>

  <!-- Formulário -->
  <form method="POST" action="">
    <label for="modelo">Modelo do Carro:</label>
    <input type="text" id="modelo" name="modelo" value="<?= htmlspecialchars($modelo ?? '') ?>" required />

    <label for="valor_diaria">Preço por Dia (R$):</label>
    <input type="number" id="valor_diaria" name="valor_diaria"
           value="<?= htmlspecialchars($valor_diaria ?? '') ?>" step="0.01" required />

    <label for="imagem">URL da Imagem:</label>
    <input type="url" id="imagem" name="imagem"
           value="<?= htmlspecialchars($imagem ?? '') ?>"
           placeholder="Ex: https://exemplo.com/foto.jpg"  required />

    <button type="submit" name="submit">Salvar Carro</button>
  </form>
</main>

</body>
</html>