<?php

include '../DB/connect.php';

if(isset($_GET['deleteid'])){
    $id_vend=$_GET['deleteid'];

    $sql="DELETE from vendedor where id_vend= $id_vend";

    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "vendedor Deletado";
        header('location: Gerenciar_V.php');
    }else{
        die(mysqli_error($conn));

    }
}


?>
