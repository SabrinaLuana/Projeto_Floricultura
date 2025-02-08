<?php
include '../DB/connect.php';

$id_flor=$_GET['editarid'];

$sql="SELECT * FROM `flor` where id_flor=$id_flor";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

$nome=$row['nome'];
$preco=$row['preco'];
$qtd=$row['qtd'];


if(isset($_POST['editar'])){

    $nome=$_POST['nome'];
    $preco=$_POST['preco'];
    $qtd=$_POST['qtd'];
 


    $sql= "UPDATE `flor` set nome='$nome',preco='$preco',qtd='$qtd' where id_flor=$id_flor";

    

    $result = mysqli_query($conn,$sql);

    if($result){
        // echo "Dados atualizados com sucesso!!";
        header('location: Gerenciar_F.php');
    }else{
        die(mysqli_error($conn));

    }
}


?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Rosa Vida</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/Gerenciar_F.css">

    
</head>
<body>
    <div class="admin-container">
        <div class="menu">
            <header>
                <h1>Rosa Vida Floricultura</h1>
                <p>Beleza e Amor em Cada Flor</p>
            </header>
        
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Gerenciar.php">Clientes</a></li>
                    <li><a href="Gerenciar_V.php">Vendedores</a></li>
                    <li><a href="Gerenciar_F.php">Flores</a></li>
                </ul>
            </nav>

        <div class="admin-content">

            <h1>Gerenciar Flores</h1>
            <section id="clientes">
                
                <div class="form-container">
                    <h2>Editar Dados</h2>
                    <form method="POST">
                        <input type="text" placeholder="Nome" required name="nome" autocomplete="off" value=<?php echo $nome;?>>
                        <input type="number" min="1" step="any" placeholder="preço" required name="preco" autocomplete="off" value=<?php echo $preco;?>>
                        <input type="number" min="1" step="any" placeholder="Quantidade" required  name="qtd" autocomplete="off" value=<?php echo $qtd;?>>
                        <button type="submit" name="editar">Editar Flor</button>
                    </form>
                </div>

                <div class="table-container">
                    <h2>Lista de Flores</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            $sql ="SELECT * FROM flor";

                            $result=mysqli_query($conn,$sql);

                            if($result){

                                while($row=mysqli_fetch_assoc($result)){
                                    $id_flor=$row['id_flor'];
                                    $nome=$row['nome'];
                                    $preco=$row['preco'];
                                    $qtd=$row['qtd'];




                                    echo ' <tr>
                                    <th scope="row">'.$id_flor.'</th>
                                    <td>'.$nome.'</td>
                                    <td>'.$preco.'</td>
                                    <td>'.$qtd.'</td>

                                    <td class="action-buttons">
                                        <button class="edit-btn">
                                            <a href="Gerenciar_F-editar.php?editarid='.$id_flor.'">Editar</a>
                                        </button>

                                        <button class="remove-btn">
                                            <a href="deletar_flor.php?deleteid='.$id_flor.'"onclick="return confirm(\'Tem certeza que deseja deletar este produto?\')">Deletar</a>
                                        </button>
                                    </td>
                                    </tr>';
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Rosa Vida Floricultura. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
