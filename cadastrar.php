<?php
date_default_timezone_set('America/Sao_Paulo');
include_once "conexao.php"
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ponto</title>
</head>

<body>
    <h2>Registrar horario</h2>
    <div>
    <div class="conteudo">
    <form method="POST" action="">
        <label>Horario de entrada</label>
        <input type="time" name="entrada" value="" required><br><br>
        <label>Horario de saida</label>
        <input type="time" name="saida" required><br>
        <input class="btn" type="submit" value="Cadastra" name="CadHorario">
    </div>

    </form>
    </div>
</body>
</html>