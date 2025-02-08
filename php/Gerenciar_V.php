
<?php

include '../DB/connect.php';

if(isset($_POST['cadastrar'])){

    $nome=$_POST['nome'];
    $cpf=$_POST['cpf'];
    $email=$_POST['email'];
    $fone=$_POST['fone'];
    // $senha=$_POST['senha'];
    // $conf_senha=$_POST['conf_senha'];


    $sql= "INSERT INTO vendedor (nome,cpf,email,fone) VALUES('$nome','$cpf','$email','$fone')";

    

    $result = mysqli_query($conn,$sql);

    if($result){
        // echo "Dados cadastrados com sucesso!!";
        header('location: Gerenciar_V.php');
    }else{
        die(mysqli_error($conn));

    }
}


?>




<!-- VENDEDOR -->


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Rosa Vida</title>
    <link rel="stylesheet" href="../css/Gerenciar_V.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

            <h1>Gerenciar Vendedores</h1>
            <section id="clientes">
                
                <div class="form-container">
                    <h2>Cadastrar Vendedores</h2>
                    <form method="POST">
                        <input type="text" placeholder="Nome Completo" required name="nome" autocomplete="off">
                        <input type="text" placeholder="CPF" required name="cpf" autocomplete="off">
                        <input type="email" placeholder="E-mail" required name="email" autocomplete="off">
                        
                        <input type="tel" placeholder="Telefone" required name="fone" autocomplete="off">
                        <button type="submit" name="cadastrar" >Cadastrar Vendedor</button>
                    </form>
                </div>

                <div class="table-container">
                    <h2>Lista de Vendedores</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            $sql ="SELECT * FROM vendedor";

                            $result=mysqli_query($conn,$sql);

                            if($result){

                                while($row=mysqli_fetch_assoc($result)){
                                    $id_vend=$row['id_vend'];
                                    $nome=$row['nome'];
                                    $cpf=$row['cpf'];
                                    $email=$row['email'];
                                    $fone=$row['fone'];


                                    echo ' <tr>
                                    <th scope="row">'.$id_vend.'</th>
                                    <td>'.$nome.'</td>
                                    <td>'.$cpf.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$fone.'</td>

                                    <td class="action-buttons">
                                        <button class="edit-btn">
                                            <a href="Gerenciar_V-editar.php?editarid='.$id_vend.'">Editar</a>
                                        </button>

                                        <button class="remove-btn">
                                            <a href="deletar_vend.php?deleteid='.$id_vend.'"onclick="return confirm(\'Tem certeza que deseja deletar este vendedor?\')">Deletar</a>
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


        <footer>
            <p>&copy; 2024 Rosa Vida Floricultura. Todos os direitos reservados.</p>
        </footer>
    </div>
    
</body>
</html>
