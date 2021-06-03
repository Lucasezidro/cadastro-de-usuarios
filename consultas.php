<?php

include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "select * from usuarios where profissao like '%$filtro%' order by name";
$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../style.css">
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
                <h1>Consultas</h1>
                <hr> <br> <br>

                <form action="" method="get">
                    Filtrar por Profissão <input type="text" name="filtro" class="campo" required autofocus>
                    <input type="submit" value="Pesquisar" class="btn">
                </form>

                <?php


                    echo "resultado da pesquisa com a palavra <strong>$filtro</strong> <br> <br>";
                    echo "$registros registros encontrados";

                   while($exibirRegistros = mysqli_fetch_array($consulta)){

                        $codigo = $exibirRegistros[0];
                        $nome = $exibirRegistros[1];
                        $email = $exibirRegistros[2];
                        $profissao = $exibirRegistros[3];

                        echo "<article>";

                        echo "$codigo <br>";
                        echo "$nome <br>";
                        echo "$email <br>";
                        echo "$profissao";

                        echo "<article>";
                   }

                   mysqli_close($conexao);
                ?>

               
            </section>
        
    </div>
    
</body>
</html>