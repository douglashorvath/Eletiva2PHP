<?php require("cabecalho.php"); ?>

<h1>Cálculo de Dias de Férias</h1>
<form action="exer5.php" method="post">
    <div class="row">
        <div class="col">
            <label for="nome_funcionario" class="form-label">Nome do Funcionário:</label>
            <input type="text" name="nome_funcionario" id="nome_funcionario" class="form-control" placeholder="Ex: João Silva" required />
        </div>
        <div class="col">
            <label for="dias_trabalhados" class="form-label">Dias Trabalhados:</label>
            <input type="number" name="dias_trabalhados" id="dias_trabalhados" class="form-control" placeholder="Ex: 365" required />
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-danger">Calcular Férias</button>
        </div>
    </div>
</form>

<?php
if ($_POST) {
    $nome_funcionario = $_POST['nome_funcionario'];
    $dias_trabalhados = $_POST['dias_trabalhados'];

    $dias_ferias = floor($dias_trabalhados / 30);

    if ($dias_ferias > 30) {
        $dias_ferias = 30;
    }

    echo "<br/><b>$nome_funcionario</b> tem direito a <b>$dias_ferias</b> dias de férias com base nos <b>$dias_trabalhados</b> dias trabalhados.";
}

require("rodape.php");
?>