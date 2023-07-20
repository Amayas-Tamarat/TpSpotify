<?php
require_once('../connect/connect.php');
$idPlaylist = $_GET['id'];
$sql = ("SELECT musique.id_musique, musique.path, musique.title, musique.id_album 
        FROM musique, musique_playlist, playlist 
        WHERE musique.id_musique = musique_playlist.id_musique 
        AND musique_playlist.id_playlist = playlist.id_playlist 
        AND playlist.id_playlist = :idPlaylist; ");
$query = $db->prepare($sql);
$query->bindValue(':idPlaylist', $idPlaylist, PDO::PARAM_INT);
$query->execute();
$musiques = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($musiques as $musique) {
    $musiqueId = $musique['id_musique'];
    $musicPath = $musique['path'];
    $musicPath = $musique['path'];
    echo '<a href="comments.php?idMusique='.$musiqueId.'">azaza<br>';
    echo '<audio controls>';
    echo '<source src="../audio/'.$musicPath.'" type="audio/mpeg">';
    echo '</audio>';
}
?>