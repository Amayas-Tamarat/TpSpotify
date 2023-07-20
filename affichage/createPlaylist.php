<?php
require_once("../connect/connect.php");
$idPlaylist = $_GET['id'];
$sql = ("SELECT tilte FROM playlist WHERE id_playlist = :idPlaylist ");
$query = $db->prepare($sql);
$query->bindValue(':idPlaylist',$idPlaylist, PDO::PARAM_INT);
$query->execute();
$playlist = $query->fetchAll(PDO::FETCH_ASSOC);
if ($playlist == false) {
    if(isset($_POST)){
    if(
        isset($_POST['playlistTitle']) && !empty($_POST['playlistTitle'])
        && isset($_POST['playlistImg']) && !empty($_POST['playlistImg'])
        ){
            $dateHour = strip_tags($_POST['dateHour']);
            $idPatients = strip_tags($_POST['idPatients']);
            $sql = "INSERT INTO `playlist` ( `title`, `img`) 
                    VALUES ( :playlistTitle, :playlistImg);";
            $query = $db->prepare($sql);
            $query->bindValue(':playlistImg', $playlistImg, PDO::PARAM_STR);
            $query->bindValue(':playlistTitle', $playlistTitle, PDO::PARAM_STR);
            $query->execute();
            header('Location: index.php');
        }
    }
    }  
 else {
    echo "cette playlist existe deja.";
}




// if(isset($_POST)){
//     if(
//         isset($_POST['playlistTitle']) && !empty($_POST['playlistTitle'])
//         && isset($_POST['playlistImg']) && !empty($_POST['playlistImg'])
//         ){
//             $dateHour = strip_tags($_POST['dateHour']);
//             $idPatients = strip_tags($_POST['idPatients']);
//             $sql = "INSERT INTO `playlist` ( `title`, `img`) 
//                     VALUES ( :playlistTitle, :playlistImg);";
//             $query = $db->prepare($sql);
//             $query->bindValue(':playlistImg', $playlistImg, PDO::PARAM_STR);
//             $query->bindValue(':playlistTitle', $playlistTitle, PDO::PARAM_STR);
//             $query->execute();
//             header('Location: index.php');
//         }
//     }