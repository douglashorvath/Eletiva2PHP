<?php require("cabecalho.php"); ?>

<h1>Estimativa de Custos do Projeto</h1>
<form action="exer6.php" method="post">
    <div class="row">
        <div class="col">
            <label for="nome_projeto" class="form-label">Nome do Projeto:</label>
            <input type="text" name="nome_projeto" id="nome_projeto" class="form-control" placeholder="Ex: Desenvolvimento de Sistema" required />
        </div>
        <div class="col">
            <label for="horas_previstas" class="form-label">Horas Previstas:</label>
            <input type="number" name="horas_previstas" id="horas_previstas" class="form-control" placeholder="Ex: 120" required />
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="taxa_hora" class="form-label">Taxa por Hora (R$):</label>
            <input type="number" step="0.01" name="taxa_hora" id="taxa_hora" class="form-control" placeholder="Ex: 50.00" required />
        </div>
        <div class="col">
            <label for="custos_adicionais" class="form-label">Custos Adicionais (R$):</label>
            <input type="number" step="0.01" name="custos_adicionais" id="custos_adicionais" class="form-control" placeholder="Ex: 1000.00" required />
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-danger">Calcular Custos</button>
        </div>
    </div>
</form>

<?php
if ($_POST) {
    $nome_projeto = $_POST['nome_projeto'];
    $horas_previstas = $_POST['horas_previstas'];
    $taxa_hora = $_POST['taxa_hora'];
    $custos_adicionais = $_POST['custos_adicionais'];

    $custo_mao_obra = $horas_previstas * $taxa_hora;

    $custo_total = $custo_mao_obra + $custos_adicionais;

    echo "<br/><b>$nome_projeto</b> terá os seguintes custos estimados:";
    echo "<br/>Custo da Mão de Obra: R$ " . number_format($custo_mao_obra, 2, ',', '.');
    echo "<br/>Custos Adicionais: R$ " . number_format($custos_adicionais, 2, ',', '.');
    echo "<br/><b>Custo Total do Projeto: R$ " . number_format($custo_total, 2, ',', '.') . "</b>";
}

require("rodape.php");
?>