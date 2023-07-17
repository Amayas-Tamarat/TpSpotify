
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="./css/main.css" rel="stylesheet" />
</head>
<body class="bcg">
<?php
   require_once("./connect/connect.php");
        ?>
    <div class="container">
        <div class="row">
            <div class="text-center">
    <?php

$sql = ("SELECT * FROM  playlist");
$query = $db->prepare($sql);
$query->execute();
$playlists = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($playlists as $playlist) {
 echo 
    '<a href="#">
    <img class="col-8" src=../img/'.$playlist['img'].' alt="" />
    </a>';
}
?>
       </div>
        </div>
    </div>

    <div class="container text-center">
    <?php

$sql = ("SELECT * FROM  musique");
$query = $db->prepare($sql);
$query->execute();
$musiques = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($musiques as $musique) {

 echo 
    '<audio
    controls src="./audio/'.$musique['path'].'" ></audio>';
}
?>
    </div>

    <div class="container text-center">
    <?php
    foreach ($playlists as $playlist) {
 echo 
    '<a href="#">
    <img class="col-8" src=../img/'.$playlist['img'].' alt="" />
    </a>';
}
?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>