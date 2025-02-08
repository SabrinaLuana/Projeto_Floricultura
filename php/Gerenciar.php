
<?php

include '../DB/connect.php';

if(isset($_POST['cadastrar'])){

    $nome=$_POST['nome'];
    $cpf=$_POST['cpf'];
    $email=$_POST['email'];
    $fone=$_POST['fone'];
    $endereco=$_POST['endereco'];
    $senha=$_POST['senha'];
    $conf_senha=$_POST['conf_senha'];


    $sql= "INSERT INTO cliente (nome,cpf,email,fone,endereco) VALUES('$nome','$cpf','$email','$fone','$endereco')";

    

    $result = mysqli_query($conn,$sql);

    if($result){
        // echo "Dados cadastrados com sucesso!!";
        header('location: Gerenciar.php');
    }else{
        die(mysqli_error($conn));

    }
}


?>

<!-- CLIENTES -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Rosa Vida</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/Gerenciar.css">

    
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

            <h1>Gerenciar Clientes</h1>
            <section id="clientes">
                
                <div class="form-container">
                    <h2>Cadastrar Cliente</h2>
                    <form method="POST">
                        <input type="text" placeholder="Nome Completo" required name="nome" autocomplete="off">
                        <input type="text" placeholder="CPF" required name="cpf" autocomplete="off">
                        <input type="email" placeholder="E-mail" required name="email" autocomplete="off">
                        
                        <input type="tel" placeholder="Telefone" required name="fone" autocomplete="off"> 
                        <input type="text" placeholder="Endereço" required name="endereco" autocomplete="off">
                        <button type="submit" name="cadastrar">Cadastrar Cliente</button>
                    </form>
                </div>

                <div class="table-container">
                    <h2>Lista de Clientes</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            $sql ="SELECT * FROM cliente";

                            $result=mysqli_query($conn,$sql);

                            if($result){

                                while($row=mysqli_fetch_assoc($result)){
                                    $id_cli=$row['id_cli'];
                                    $nome=$row['nome'];
                                    $cpf=$row['cpf'];
                                    $email=$row['email'];
                                    $fone=$row['fone'];
                                    $endereco=$row['endereco'];


                                    echo ' <tr>
                                    <th scope="row">'.$id_cli.'</th>
                                    <td>'.$nome.'</td>
                                    <td>'.$cpf.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$fone.'</td>
                                    <td>'.$endereco.'</td>

                                    <td class="action-buttons">
                                        <button class="edit-btn">
                                            <a href="Gerenciar-editar.php?editarid='.$id_cli.'">Editar</a>
                                        </button>

                                        <button class="remove-btn">
                                            <a href="deletar_cli.php?deleteid='.$id_cli.'"onclick="return confirm(\'Tem certeza que deseja deletar este cliente?\')">Deletar</a>
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

