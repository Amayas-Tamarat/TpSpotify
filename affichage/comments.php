<?php
require_once('../connect/connect.php');
$idMusique = $_GET['idMusique'];
$sql = ("SELECT * FROM commentaire WHERE id_musique = :idmusique;");
$query = $db->prepare($sql);
$query->bindValue(':idmusique', $idMusique, PDO::PARAM_INT);
$query->execute();
$comments = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($comments as $comment) {
    echo $comment['content'];
}
?>