<?php 
    include_once "../../db/controllers/todamember.php";
     $check_user = new TodaController();
      
     $id = $_GET['id'];
     $result = $check_user->remove_toda($id);

    if($result != 0){
        echo 'susnkjkjnkjv';
        header('Location: ../todamember.php');
    }
    else{
        echo 'flkdjfldkkljhvk';
    }
?>