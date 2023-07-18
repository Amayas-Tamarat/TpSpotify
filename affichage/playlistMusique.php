<?php
require_once('../connect/connect.php');
$idPlaylist = $_GET['id'];
$sql = ("SELECT * FROM musique, musique_playlist WHERE musique_playlist.id_playlist = :idPlaylist ;");
$query = $db->prepare($sql);
$query->bindValue(':idPlaylist', $idPlaylist, PDO::PARAM_INT);
$query->execute();
$musiques = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($musiques as $musique) {
    $musicPath = $musique['path'];
    echo '<audio controls>';
    echo '<source src="../audio/'.$musicPath.'" type="audio/mpeg">';
    echo '</audio>';
}
?>