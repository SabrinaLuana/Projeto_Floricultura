<?php

include '../DB/connect.php';

if(isset($_GET['deleteid'])){
    $id_cli=$_GET['deleteid'];

    $sql="DELETE from cliente where id_cli= $id_cli";

    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "Cliente Deletado";
        header('location: Gerenciar.php');
    }else{
        die(mysqli_error($conn));

    }
}


?>
