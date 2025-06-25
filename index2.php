<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once('conexao.php');

$sql = "SELECT * FROM carros ORDER BY id DESC";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Locadora de Carros</title>
    <link rel="stylesheet" href="detalhes.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="index.css" />

    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            width: 100%;
            max-height: 180px;
            object-fit: cover;
            border-radius: 4px;
        }

        .card h2 {
            font-size: 1.2em;
            margin: 10px 0;
        }

        .card p {
            font-size: 1em;
            color: #555;
        }

        .card button {
            margin-top: 10px;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .card button:hover {
            background-color: #0056b3;
        }

        .carros-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .no-carros {
            text-align: center;
            width: 100%;
            font-size: 1.2em;
            color: #999;
        }
    </style>
</head>
<body>

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
            <li><a href="home.php">Voltar para home</a></li>
        </ul>
    </nav>
</header>

<section class="hero">
    <div class="text-loop">
        <h1>Escolha o carro perfeito para sua próxima viagem!</h1>
        <h1>Encontre o modelo ideal para qualquer ocasião.</h1>
        <h1>Carros modernos, preços imperdíveis!</h1>
    </div>
</section>


<main class="carros-container">
    <?php if ($resultado && $resultado->num_rows > 0): ?>
        <?php while ($carro = $resultado->fetch_assoc()): ?>
            <div class="card">
                <img src="<?= htmlspecialchars($carro['imagem']) ?>" alt="<?= htmlspecialchars($carro['modelo']) ?>">
                <h2><?= htmlspecialchars($carro['modelo']) ?></h2>
                <p>R$ <?= number_format($carro['valor_diaria'], 2, ',', '.') ?>/dia</p>
                <button class="btn-info" onclick="irParaDetalhe('<?= htmlspecialchars($carro['modelo']) ?>')">Alugar</button>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="no-carros">Nenhum carro disponível no momento.</p>
    <?php endif; ?>
</main>
<script>
    function irParaDetalhe(nome) {
        localStorage.setItem("carroDetalhe", nome);
        window.location.href = "locacao2.php";
    }
</script>

</body>
</html>