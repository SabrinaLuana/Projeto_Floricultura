<?php
    include '../DB/connect.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floricultura Rosa Vida</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <header>
        <h1>Rosa Vida Floricultura</h1>
        <p>Beleza e Amor em Cada Flor</p>
    </header>

    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="Gerenciar.php">Gerenciar</a></li>
        </ul>
    </nav>

    <div class="container">
        <section class="produtos">

        <?php

            $sql ="SELECT * FROM flor";

            $result=mysqli_query($conn,$sql);

            if($result){

                while($row=mysqli_fetch_assoc($result)){
                    $id_flor=$row['id_flor'];
                    $nome=$row['nome'];
                    $preco=$row['preco'];
                    $qtd=$row['qtd'];
                        
                    echo '
                    <div class="produto">
                        <img src="../img/buquê.jfif" alt="Buquê de Rosas">
                        <h3> '.$nome.' </h3>
                        <p>R$  '.$preco.' </p>
                    </div>
                    
                    ';
                }
            }
            ?>
        </section>


        <footer>
            <p>&copy; 2024 Rosa Vida Floricultura. Todos os direitos reservados.</p>
        </footer>   
    </div>

    
</body>
</html>