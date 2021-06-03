<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$profissao = $_POST['profissao'];

$sql = "insert into usuarios (nome, email, profissao) values ('$nome', '$email', '$profissao')";
$salvar = mysqli_query($conexao, $sql);

$linhas = mysqli_affected_rows($conexao);

mysqli_close($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Sistema de cadastro</title>
</head>
<body>

    <div class="container">
        <nav>
            <ul class="menu">
                <a href="index.php"><li>Cadastro</li></a>
                <a href="consultas.php"><li>Consultas</li></a>
            </ul>
        </nav>
            <section>
                <h1>Confirmação de cadastro</h1>
                <hr> <br> <br>

                <?php
                    if($linhas == 1) {
                        echo "Cadastro efetuado com sucesso";
                    } else{
                        echo "Cadastro não efetuado. <br>Já existe um usuario com este e-mail.";
                    }
                ?>

               
            </section>
        
    </div>
    
</body>
</html>