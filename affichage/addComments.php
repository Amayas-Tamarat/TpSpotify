<?php 
require_once("../connect/connect.php");
if(isset($_POST)){
    if(
        isset($_POST['comm']) && !empty($_POST['comm'])
        ){
            $comm = strip_tags($_POST['comm']);
            $sql = "INSERT INTO `commentaire` ( `content`,) 
                    VALUES ( :comm );";
            $query = $db->prepare($sql);
            $query->bindValue(':comm', $comm, PDO::PARAM_STR);
            $query->execute();
            header('Location: music.php');  
        }  
  

}
?>