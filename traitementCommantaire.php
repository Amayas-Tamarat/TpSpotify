<?php
include('./connect/connect.php');
$idMusique = $_GET['idMusique'];
var_dump($idMusique);


if (isset($_POST)) {
    if (
        isset($_POST['comm']) && !empty($_POST['comm'])
    ) { 
        $comm = strip_tags($_POST['comm']);
        $sql = "INSERT INTO `commentaire` ( `content`,`id_musique`) 
        VALUES ( :comm, $idMusique);";
        $query = $db->prepare($sql);
        $query->bindValue(':comm', $comm, PDO::PARAM_STR);
        $query->execute();
    }
    header("location:music.php?id=$idMusique");
}
?>