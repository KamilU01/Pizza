<?php
include('config\config.inc.php');
if(isset($_GET['id'])){

    if (!empty($_GET['id'])){
        $id=$mysqli->real_escape_string($_GET['id']);

        $sql = "DELETE FROM ddd_menu_pizza WHERE id like ".$id.";";
        $result = $mysqli->real_query($sql);

        if($result){
            header('location: index.php?kom=2');
            exit;
        }else{
            header('location: index.php?kom=3');
            exit;
        }
    }else{
        header('location: index.php?kom=4');
        exit;
    }
}
?>