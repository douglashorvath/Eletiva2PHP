<?php require("cabecalho.php"); ?>

<h1>Avaliação de Desempenho do Projeto</h1>
<form action="exer7.php" method="post">
    <div class="row">
        <div class="col">
            <label for="nome_projeto" class="form-label">Nome do Projeto:</label>
            <input type="text" name="nome_projeto" id="nome_projeto" class="form-control" placeholder="Ex: Desenvolvimento de Sistema" required />
        </div>
        <div class="col">
            <label for="prazo_dias" class="form-label">Prazo (em dias):</label>
            <input type="number" name="prazo_dias" id="prazo_dias" class="form-control" placeholder="Ex: 30" required />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="atividades_total" class="form-label">Total de Atividades:</label>
            <input type="number" name="atividades_total" id="atividades_total" class="form-control" placeholder="Ex: 50" required />
        </div>
        <div class="col">
            <label for="atividades_realizadas" class="form-label">Atividades Realizadas:</label>
            <input type="number" name="atividades_realizadas" id="atividades_realizadas" class="form-control" placeholder="Ex: 20" required />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="produtividade_diaria" class="form-label">Produtividade Diária (atividades por dia):</label>
            <input type="number" name="produtividade_diaria" id="produtividade_diaria" class="form-control" placeholder="Ex: 5" required />
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-danger">Avaliar Desempenho</button>
        </div>
    </div>
</form>

<?php
if ($_POST) {
    // Captura os dados do formulário
    $nome_projeto = $_POST['nome_projeto'];
    $prazo_dias = $_POST['prazo_dias'];
    $atividades_total = $_POST['atividades_total'];
    $atividades_realizadas = $_POST['atividades_realizadas'];
    $produtividade_diaria = $_POST['produtividade_diaria'];

    // Calcula o progresso atual do projeto
    $progresso_atual = ($atividades_realizadas / $atividades_total) * 100;

    // Calcula quantas atividades ainda faltam
    $atividades_restantes = $atividades_total - $atividades_realizadas;

    // Calcula quantos dias serão necessários para concluir o projeto com a produtividade atual
    $dias_para_conclusao = ceil($atividades_restantes / $produtividade_diaria);

    // Verifica se o projeto está no prazo
    if ($dias_para_conclusao <= $prazo_dias) {
        $status_projeto = "No prazo";
        $mensagem_prazo = "Você conseguirá terminar o projeto dentro do prazo!";
    } else {
        $status_projeto = "Atrasado";
        $dias_excedidos = $dias_para_conclusao - $prazo_dias;
        $mensagem_prazo = "O projeto excederá o prazo por " . $dias_excedidos . " dias.";
    }

    // Exibe o relatório de desempenho do projeto
    echo "<br/><b>Avaliação do Projeto: $nome_projeto</b>";
    echo "<br/>Progresso Atual: " . number_format($progresso_atual, 2) . "%";
    echo "<br/>Atividades Restantes: $atividades_restantes";
    echo "<br/>Dias para Conclusão: $dias_para_conclusao";
    echo "<br/><b>Status do Projeto: $status_projeto</b>";
    echo "<br/>$mensagem_prazo";
}

require("rodape.php");
?>