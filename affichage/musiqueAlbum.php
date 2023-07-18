<?php
require_once('../connect/connect.php');
$idAlbum = $_GET['id'];
$sql = ("SELECT * FROM  musique WHERE id_album = :idAlbum ");
$query = $db->prepare($sql);
$query->bindValue(':idAlbum', $idAlbum, PDO::PARAM_INT);
$query->execute();
$musiques = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($musiques as $musique) {
    $_GET['id_musique'] = $musique['id_musique'];
    $musiqueId = $musique['id_musique'];
    $musicPath = $musique['path'];
    echo '<a href="comments.php?idMusique='.$musiqueId.'">azaza';
    echo '<audio controls>';
    echo '<source src="../audio/'.$musicPath.'" type="audio/mpeg">';
    echo '</audio>';
}
?>