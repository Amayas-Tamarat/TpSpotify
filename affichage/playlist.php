<?php
require_once("../connect/connect.php");
$sql = ("SELECT * FROM  playlist");
$query = $db->prepare($sql);
$query->execute();
$playlists = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($playlists as $playlist) {
    $_GET['id'] = $playlist['id_playlist'];
    $playlistId = $playlist['id_playlist'];
    echo '<a href="playlistMusique.php?id='.$playlistId.'">';
    echo '<img src="../img/'.$playlist['img'].'" alt="" />';
    echo '</a>';
}
?>