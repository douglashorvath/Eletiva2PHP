<?php require("cabecalho.php"); ?>

<h1>Atribuição de Tarefa</h1>
<form action="exer4.php" method="post">
    <div class="row">
        <div class="col">
            <h3>Dados da Tarefa</h3>
            <label for="nome_tarefa" class="form-label">Nome da Tarefa:</label>
            <input type="text" name="nome_tarefa" id="nome_tarefa" class="form-control" placeholder="Ex: Desenvolver Módulo X" required />

            <label for="horas_tarefa" class="form-label">Total de Horas da Tarefa:</label>
            <input type="number" name="horas_tarefa" id="horas_tarefa" class="form-control" placeholder="Ex: 40" required />

            <label for="complexidade_tarefa" class="form-label">Complexidade da Tarefa:</label>
            <select name="complexidade_tarefa" id="complexidade_tarefa" class="form-control" required>
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select>
        </div>

        <div class="col">
            <h3>Dados do Funcionário</h3>
            <label for="nome_funcionario" class="form-label">Nome do Funcionário:</label>
            <input type="text" name="nome_funcionario" id="nome_funcionario" class="form-control" placeholder="Ex: João Silva" required />

            <label for="horas_disponiveis" class="form-label">Horas Disponíveis:</label>
            <input type="number" name="horas_disponiveis" id="horas_disponiveis" class="form-control" placeholder="Ex: 50" required />

            <label for="nivel_experiencia" class="form-label">Nível de Experiência:</label>
            <select name="nivel_experiencia" id="nivel_experiencia" class="form-control" required>
                <option value="junior">Júnior</option>
                <option value="pleno">Pleno</option>
                <option value="senior">Sênior</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-danger">Verificar Atribuição</button>
        </div>
    </div>
</form>

<?php
if ($_POST) {
    $nome_tarefa = $_POST['nome_tarefa'];
    $horas_tarefa = $_POST['horas_tarefa'];
    $complexidade_tarefa = $_POST['complexidade_tarefa'];

    $nome_funcionario = $_POST['nome_funcionario'];
    $horas_disponiveis = $_POST['horas_disponiveis'];
    $nivel_experiencia = $_POST['nivel_experiencia'];

    $horas_necessarias = $horas_tarefa * 1.1; // Adiciona 10% ao tempo necessário

    if ($horas_disponiveis < $horas_necessarias) {
        echo "<br/><b>$nome_funcionario</b> não tem horas suficientes para realizar a tarefa <b>$nome_tarefa</b>. Necessário pelo menos $horas_necessarias horas.";
        exit;
    }

    $pode_assumir = false;

    if ($nivel_experiencia == 'junior' && $complexidade_tarefa == 'baixa') {
        $pode_assumir = true;
    } elseif ($nivel_experiencia == 'pleno' && ($complexidade_tarefa == 'baixa' || $complexidade_tarefa == 'media')) {
        $pode_assumir = true;
    } elseif ($nivel_experiencia == 'senior' && ($complexidade_tarefa == 'media' || $complexidade_tarefa == 'alta')) {
        $pode_assumir = true;
    }

    if ($pode_assumir) {
        echo "<br/><b>$nome_funcionario</b> pode realizar a tarefa <b>$nome_tarefa</b>!";
    } else {
        echo "<br/><b>$nome_funcionario</b> não pode realizar a tarefa <b>$nome_tarefa</b> devido à incompatibilidade entre o nível de experiência e a complexidade da tarefa.";
    }
}

require("rodape.php");
?>