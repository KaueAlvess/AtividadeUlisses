<?php
if (isset($_POST['submit'])) {
    include_once('conexao.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $data_inicio = $_POST['data-inicio'];
    $data_fim = $_POST['data-fim'];
    $carro = $_POST['carro'];

    $stmt = $conexao->prepare("INSERT INTO Alugar (nome, cpf, telefone, data_inicio, data_fim, carro) VALUES ('$nome','$cpf','$telefone','$data_inicio','$data_fim', '$carro')");

    if ($stmt->execute()) {
        echo "<script>alert('Dados salvos com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao salvar os dados.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Locação - Escolher Carro</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="locacao.css" />
</head>
<body>

<!-- Header -->
<header class="site-header">
  <div class="logo-container">
    <a href="index.php" class="logo-typing">🚗 Locação dos Carros</a>
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

<!-- Hero -->
<section class="hero">
  <h1>Escolha seu carro para locação</h1>
</section>

<!-- Formulário -->
<main class="selecao-container">
  <form action="locacao.php" method="POST" id="form-locacao">
    <div class="form-group">
      <label for="nome">Nome completo:</label>
      <input type="text" id="nome" name="nome" required placeholder="Seu nome completo">
    </div>

    <div class="form-group">
      <label for="cpf">CPF:</label>
      <input type="text" id="cpf" name="cpf" required placeholder="000.000.000-00">
    </div>

    <div class="form-group">
      <label for="telefone">Telefone:</label>
      <input type="tel" id="telefone" name="telefone" required placeholder="(00) 00000-0000">
    </div>

    <div class="form-group">
      <label for="data-inicio">Data de início da locação:</label>
      <input type="date" id="data-inicio" name="data-inicio" required>
    </div>

    <div class="form-group">
      <label for="data-fim">Data de devolução:</label>
      <input type="date" id="data-fim" name="data-fim" required>
    </div>

    <h2>Selecione o modelo desejado:</h2>
    <div class="opcoes-carros" id="opcoesCarros">
      <label class="opcao-carro"><input type="radio" name="carro" value="Fiat Uno" required>Fiat Uno</label>
      <label class="opcao-carro"><input type="radio" name="carro" value="VW Gol">VW Gol</label>
      <label class="opcao-carro"><input type="radio" name="carro" value="Renault Kwid">Renault Kwid</label>
      <label class="opcao-carro"><input type="radio" name="carro" value="Hyundai HB20">Hyundai HB20</label>
      <label class="opcao-carro"><input type="radio" name="carro" value="Chevrolet Onix">Chevrolet Onix</label>
      <label class="opcao-carro"><input type="radio" name="carro" value="Ford Ka">Ford Ka</label>
      <label class="opcao-carro"><input type="radio" name="carro" value="Nissan Versa">Nissan Versa</label>
      <label class="opcao-carro"><input type="radio" name="carro" value="Toyota Corolla">Toyota Corolla</label>
      <label class="opcao-carro"><input type="radio" name="carro" value="Honda Civic">Honda Civic</label>
      <label class="opcao-carro"><input type="radio" name="carro" value="BMW Série 3">BMW Série 3</label>
    </div>

    <div class="resumo" id="resumo-selecao">Nenhum carro selecionado.</div>

    <button type="submit" class="enviar-btn" name="submit">Confirmar Locação</button>
  </form>
</main>

<!-- Modal de confirmação -->
<div class="modal-confirmacao" id="modalConfirmacao">
  <div class="modal-conteudo">
    <h2 class="modal-titulo">Confirme seus dados</h2>
    <div class="dados-confirmacao" id="dadosConfirmacao"></div>
    <div class="botoes-confirmacao">
      <button class="btn-editar" onclick="editarDados()">Editar</button>
      <button type="submit" class="btn-confirmar" name="submit" onclick="confirmarLocacao()">Confirmar</button>
    </div>
  </div>
</div>

<script>
  // Seleciona os botões de rádio e o elemento de resumo
const radios = document.querySelectorAll('input[name="carro"]');
const resumo = document.getElementById("resumo-selecao");

// Atualiza o resumo ao mudar o carro
radios.forEach(radio => {
    radio.addEventListener("change", () => {
        if (radio.checked) {
            resumo.textContent = `Você selecionou: ${radio.value}`;
        }
    });
});

// Carrega carro salvo do localStorage ao carregar a página
window.addEventListener("load", function () {
    const carroSalvo = localStorage.getItem("carroSelecionadoLocacao");
    if (carroSalvo) {
        const carroObj = JSON.parse(carroSalvo);
        const radio = document.querySelector(`input[value="${carroObj.nome}"]`);
        if (radio) {
            radio.checked = true;
            resumo.textContent = `Você selecionou: ${carroObj.nome}`;
        }
    }
});

let shouldSubmit = false;

document.getElementById("form-locacao").addEventListener("submit", function(e) {
    if (shouldSubmit) {
        return;
    }
    e.preventDefault();

    const selected = document.querySelector('input[name="carro"]:checked');
    if (!selected) return alert("Por favor, selecione um carro.");

    const nome = document.getElementById("nome").value.trim();
    const cpf = document.getElementById("cpf").value.trim();
    const telefone = document.getElementById("telefone").value.trim();
    const dataInicio = document.getElementById("data-inicio").value;
    const dataFim = document.getElementById("data-fim").value;

    if (!nome || !cpf || !telefone || !dataInicio || !dataFim) {
        return alert("Preencha todos os campos.");
    }

    const dados = {
        nome,
        cpf,
        telefone,
        dataInicio,
        dataFim,
        carro: selected.value
    };

    abrirModalConfirmacao(dados);
});

function abrirModalConfirmacao(dados) {
    const html = `
        <p><strong>Nome:</strong> ${dados.nome}</p>
        <p><strong>CPF:</strong> ${dados.cpf}</p>
        <p><strong>Telefone:</strong> ${dados.telefone}</p>
        <p><strong>Data de início:</strong> ${dados.dataInicio}</p>
        <p><strong>Data de fim:</strong> ${dados.dataFim}</p>
        <p><strong>Carro:</strong> ${dados.carro}</p>
    `;
    document.getElementById("dadosConfirmacao").innerHTML = html;
    document.getElementById("modalConfirmacao").classList.add("active");
}

function editarDados() {
    document.getElementById("modalConfirmacao").classList.remove("active");
}

function confirmarLocacao() {
    alert("Locação confirmada!");

    // Define a flag para permitir o envio do formulário
    shouldSubmit = true;

    // Envia o formulário para o servidor
    document.getElementById("form-locacao").submit();

    // Limpa o formulário após o envio (opcional)
    setTimeout(() => {
        document.getElementById("form-locacao").reset();
        document.getElementById("resumo-selecao").textContent = "Nenhum carro selecionado.";
        shouldSubmit = false; // Reseta a flag após o envio
    }, 0);
}
</script>

</body>
</html>