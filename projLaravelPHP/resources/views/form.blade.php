<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <form method="post" action="/processarForm">
        @CSRF 
        <label for="nome">Valor:</label>
        <input type="text" id="valor" name="valor" required><br><br>

        <input type="submit" value="Enviar">
    </form>
    </form>
</body>
</html>