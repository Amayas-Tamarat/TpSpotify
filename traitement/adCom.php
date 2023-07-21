<?php
// $dsn = 'mysql:host=localhost;dbname=spotify;charset=utf8';
//     $user = 'root';
//     $password = '';


//     try {
//         $db = new PDO($dsn, $user, $password);


//         $query = "SELECT * FROM commentaire WHERE id_musique = :id_musique ";
//         $result = $db->query($query);


//         while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//             echo '<p>' . $row['message'] . '</p>';
//             echo '<hr>';
//         }
//     } catch (PDOException $e) {
//         echo 'An error occurred: ' . $e->getMessage();
//     }


$idMusique = $_GET['id'];
$sql = ("SELECT * FROM commentaire WHERE id_musique = :idmusique;");
$query = $db->prepare($sql);
$query->bindValue(':idmusique', $idMusique, PDO::PARAM_INT);
$query->execute();
$comments = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($comments as $comment) {
    echo $comment['content'].'<hr>';
}


    
?>
