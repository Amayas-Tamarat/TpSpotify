<?php
include('./connect/connect.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <title>spoty-Clone</title>
</head>

<body>

<?php
include('./partiels/marquee-rss.php');
?>
    <section class="sec1">
        <div class="head">
            <button class="btn btn-primary">Accueil</button><br><br>
            <button class="btn btn-primary">connexion</button><br><br>
            <input class="recherche" placeholder="Recherche" type="text">
        </div>

    </section>

    <section class="album">
        <h2>album</h2>

        <?php
        $sql = ("SELECT * FROM  album");
        $query = $db->prepare($sql);
        $query->execute();
        $albums = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($albums as $album) {
            $_GET['id'] = $album['id_album'];
            $albumId = $album['id_album'];
            echo '<div class="box">';
            echo '<a href="playlist-player.php?id=' . $albumId . '">';
            echo '<img src="../img/' . $album['img'] . '" alt="" />';
            echo '<h5>' . $album['title'] . '</h5>';
            echo '</a>';
            echo '</div>';
        }
        ?>

    </section>

    <section class="playlist">
        <h2>playlist</h2>
        <?php

        $sql = ("SELECT * FROM  playlist");
        $query = $db->prepare($sql);
        $query->execute();
        $playlists = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($playlists as $playlist) {
            $_GET['id'] = $playlist['id_playlist'];
            $playlistId = $playlist['id_playlist'];
            echo '<div class="box">';
            echo '<a href="playlist-player.php?id=' . $playlistId . '">';
            echo '<img src="../img/' . $playlist['img'] . '" alt="" />';
            echo '</a>';
            echo '</div>';
        }
        ?>

    </section>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>