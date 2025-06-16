<?php
session_start();
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
  <link rel="stylesheet" href="index.php" />
</head>
<body>

<!-- Header -->
<header class="site-header">
  <div class="logo-container">
    <a href="index.php" class="logo-typing">🚗 Locadora de Carros</a>
  </div>
  <nav class="navbar">
    <ul class="nav-list">
      <li><a href="index.php">Cadastrar Carros</a></li>
      <li><a href="locacao.php">Locação</a></li>
      <li><a href="sobre.php">Sobre Nós</a></li>
      <li><a href="sac.php">SAC</a></li>
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
<h1>Cadastrar carros</h1>

  <!-- Container de carros -->
  <main class="carros-container">

    <!-- Card 1 -->
    <div class="card">
      <img src="data:image/jpeg;base64,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"  alt="Fiat Uno" />
      <h2>Fiat Uno</h2>
      <p>R$ 100/dia</p>
      <button class="btn-info" onclick="irParaDetalhe('fiat')">Alugar</button>
    </div>

    <!-- Card 2 -->
    <div class="card">
      <img src="https://p2.trrsf.com/image/fget/cf/774/0/images.terra.com/2022/05/30/novo-gol_estudio_02-(1)-1h7qwqcvewqbc.jpg"  alt="VW Gol" />
      <h2>VW Gol</h2>
      <p>R$ 120/dia</p>
      <button class="btn-info" onclick="irParaDetalhe('gol')">Alugar</button>
    </div>

    <!-- Card 3 -->
    <div class="card">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMnFwHp9dsKAqRJOVXs6XaT_Swou_64JmjkhNpEg2F7le2VPglKbr8x7ZfjiLNKuaPB2o&usqp=CAU" alt="Renault Kwid" />
      <h2>Renault Kwid</h2>
      <p>R$ 130/dia</p>
      <button class="btn-info" onclick="irParaDetalhe('kwide')">Alugar</button>
    </div>

    <!-- Card 4 -->
    <div class="card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXuS4mdJL-7ljjH8-Cqg2eXeJhdIPoHJsto15ODCDLIcwQt0e-Y99f2EZaW3jFbXm1jPY&usqp=CAU" alt="Hyundai HB20" />
      <h2>Hyundai HB20</h2>
      <p>R$ 150/dia</p>
      <button class="btn-info" onclick="irParaDetalhe('hb20')">Alugar</button>
    </div>

    <!-- Card 5 -->
    <div class="card">
      <img src="https://secure-developments.com/shared/colombia/gm_forms/assets/front/images/jellys/66a140af0095e.png" alt="Chevrolet Onix" />
      <h2>Chevrolet Onix</h2>
      <p>R$ 160/dia</p>
      <button class="btn-info" onclick="irParaDetalhe('onix')">Alugar</button>
    </div>

    <!-- Card 6 -->
    <div class="card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRteyobVuhbaJ61uwdxoHmng-_0V_Q5WfUh6g&s" alt="Ford Ka" />
      <h2>Ford Ka</h2>
      <p>R$ 140/dia</p>
      <button class="btn-info" onclick="irParaDetalhe('ka')">Alugar</button>
    </div>

    <!-- Card 7 -->
    <div class="card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFwuTgfDAjsA-Au8FoQ4Oial5vZ2ATnDI-fRYQCrbNOcG7-o5p3GaesDYNkQlk2gbIwTs&usqp=CAU" alt="Nissan Versa" />
      <h2>Nissan Versa</h2>
      <p>R$ 180/dia</p>
      <button class="btn-info" onclick="irParaDetalhe('versa')">Alugar</button>
    </div>

    <!-- Card 8 -->
    <div class="card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQP0p1N_m5hrIj5k4RRrOx19xKrlQEv4KbQSw&s" alt="Toyota Corolla" />
      <h2>Toyota Corolla</h2>
      <p>R$ 200/dia</p>
      <button class="btn-info" onclick="irParaDetalhe('corolla')">Alugar</button>
    </div>

    <!-- Card 9 -->
    <div class="card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJRHP-86TDfVSz2ZA2B1ySvnda1GswuYMgCw&s" alt="Honda Civic" />
      <h2>Honda Civic</h2>
      <p>R$ 220/dia</p>
      <button class="btn-info" onclick="irParaDetalhe('civic')">Alugar</button>
    </div>

    <!-- Card 10 -->
    <div class="card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaxRUQGtCls757fBBgWsJqDb35RtKxsQvlsw&s" alt="BMW Série 3" />
      <h2>BMW Série 3</h2>
      <p>R$ 300/dia</p>
      <button class="btn-info" onclick="irParaDetalhe('bmw')"> Alugar</button>
    </div>

  </main>

  <!-- Script para navegar para página de detalhes -->
  <script>
    function irParaDetalhe(nome) {
      localStorage.setItem("carroDetalhe", nome);
      window.location.href = "locacao.php";
    }
  </script>

</body>
</html>