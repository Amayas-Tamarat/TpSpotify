<?php
require_once("../connect/connect.php");
$idAlbum = $_GET['id'];
$sql = ("SELECT id_playlist FROM playlist WHERE id_playlist = :idAlbum ");
$query = $db->prepare($sql);
$query->bindValue(':idAlbum',$idAlbum, PDO::PARAM_INT);
$query->execute();
$albums = $query->fetchAll(PDO::FETCH_ASSOC);
if ($albums == false) {
    echo "ye";
}else
foreach ($albums as $album ) {
    var_dump($album);
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
// }
?>