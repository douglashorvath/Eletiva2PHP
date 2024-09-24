<?php require("cabecalho.php"); ?>

<h1>Calcular Salário Semanal</h1>
<form action="exer2.php" method="post">
    <div class="row">
        <div class="col">
            <label for="horas_mensais" class="form-label">Informe as horas trabalhadas no mês:</label>
            <input type="number" name="horas_mensais" id="horas_mensais" class="form-control" placeholder="Ex: 160" required />
        </div>
        <div class="col">
            <label for="valor_hora" class="form-label">Informe o valor da hora trabalhada (em R$):</label>
            <input type="number" step="0.01" name="valor_hora" id="valor_hora" class="form-control" placeholder="Ex: 25.50" required />
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-danger">Calcular</button>
        </div>
    </div>
</form>

<?php
if ($_POST) {
    $horas_mensais = $_POST['horas_mensais'];
    $valor_hora = $_POST['valor_hora'];

    $salario_mensal = $horas_mensais * $valor_hora;

    $salario_semanal = $salario_mensal / 4;

    echo "<br/>Salário Semanal: R$ " . number_format($salario_semanal, 2, ',', '.');
}

require("rodape.php");
?>