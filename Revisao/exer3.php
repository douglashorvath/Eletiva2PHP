<?php require("cabecalho.php"); ?>

<h1>Distribuição de Bônus Anual</h1>
<form action="exer3.php" method="post">
    <div class="row">
        <div class="col">
            <label for="nome_funcionario" class="form-label">Nome do Funcionário:</label>
            <input type="text" name="nome_funcionario" id="nome_funcionario" class="form-control" placeholder="Ex: João Silva" required />
        </div>
        <div class="col">
            <label for="lucros_empresa" class="form-label">Lucros da Empresa (em R$):</label>
            <input type="number" step="0.01" name="lucros_empresa" id="lucros_empresa" class="form-control" placeholder="Ex: 1000000.00" required />
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <label for="desempenho" class="form-label">Desempenho do Funcionário (1 a 5):</label>
            <select name="desempenho" id="desempenho" class="form-control" required>
                <option value="1">1 - 0,1% do lucro</option>
                <option value="2">2 - 0,2% do lucro</option>
                <option value="3">3 - 0,3% do lucro</option>
                <option value="4">4 - 0,5% do lucro</option>
                <option value="5">5 - 0,7% do lucro</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-danger">Calcular Bônus</button>
        </div>
    </div>
</form>

<?php
if ($_POST) {
    $nome_funcionario = $_POST['nome_funcionario'];
    $lucros_empresa = $_POST['lucros_empresa'];
    $desempenho = $_POST['desempenho'];

    switch ($desempenho) {
        case 1:
            $porcentagem_bonus = 0.001;
            break;
        case 2:
            $porcentagem_bonus = 0.002;
            break;
        case 3:
            $porcentagem_bonus = 0.003;
            break;
        case 4:
            $porcentagem_bonus = 0.005;
            break;
        case 5:
            $porcentagem_bonus = 0.007;
            break;
        default:
            $porcentagem_bonus = 0;
            break;
    }

    $bonus = $lucros_empresa * $porcentagem_bonus;

    echo "<br/>Funcionário: " . htmlspecialchars($nome_funcionario);
    echo "<br/>Desempenho: " . $desempenho;
    echo "<br/>Bônus Recebido: R$ " . number_format($bonus, 2, ',', '.');
}

require("rodape.php");
?>