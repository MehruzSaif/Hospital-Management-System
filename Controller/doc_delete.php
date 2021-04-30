<?php require_once('MVC/Model/include/db.php') ;?>
<?php require_once('MVC/Model/include/config.php') ;?>
<?php require_once('MVC/Model/include/session.php') ;
if(isset($_GET['id'])){
    $query = "DELETE FROM doctors where id=".$_GET['id'];
    $res = $mysqli->query($query);
    if($res){
        header('Location: '.ROOT_URL.'doctors.php');
    }else{
        echo 'Something went wrong';
    }
}else{
    header('Location: '.ROOT_URL.'doctors.php');
}


;?>
