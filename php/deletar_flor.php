<?php

include '../DB/connect.php';

if(isset($_GET['deleteid'])){
    $id_flor=$_GET['deleteid'];

    $sql="DELETE from flor where id_flor= $id_flor";

    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "flor Deletado";
        header('location: Gerenciar_F.php');
    }else{
        die(mysqli_error($conn));

    }
}


?>
