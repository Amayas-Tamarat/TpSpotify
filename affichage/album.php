<?php
require_once("../connect/connect.php");
$sql = ("SELECT * FROM  album");
$query = $db->prepare($sql);
$query->execute();
$albums = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($albums as $album) {
    $_GET['id'] = $album['id_album'];
    $albumId = $album['id_album'];
    echo '<a href="musiqueAlbum.php?id='.$albumId.'">';
    echo '<img src="../img/'.$album['img'].'" alt="" />';
    echo '</a>';
}
?>



