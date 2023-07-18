<?php
    require_once("./partiels/header.php");
    ?>
<body class="bcg">
    <?php
    require_once("./connect/connect.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="text-center">
                <?php

$idPlaylist = $_GET['id'];
$sql = "SELECT playlist.img, playlist.id_playlist
        FROM playlist
        WHERE playlist.id_playlist = :idPlaylist";

$query = $db->prepare($sql);
$query->bindValue(':idPlaylist', $idPlaylist, PDO::PARAM_INT);
$query->execute();
$playlists = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($playlists as $playlist) {
                    echo
                    '<a href="#">
    <img class="col-6" src=../img/' . $playlist['img'] . ' alt="" />
    </a>';
                }
                 ?>
//             </div>
//         </div>
//     </div>

    <div class="container">
  <?php
$idPlaylist = $_GET['id'];
$sql = ("SELECT musique.id_musique, musique.path, musique.title
        FROM musique, musique_playlist, playlist 
        WHERE musique.id_musique = musique_playlist.id_musique 
        AND musique_playlist.id_playlist = playlist.id_playlist 
        AND playlist.id_playlist = :idPlaylist; ");
$query = $db->prepare($sql);
$query->bindValue(':idPlaylist', $idPlaylist, PDO::PARAM_INT);
$query->execute();
$musiques = $query->fetchAll(PDO::FETCH_ASSOC);
  foreach ($musiques as $musique) {
    echo '
    <div class="row">
      <div class="col d-flex justify-content-center align-items-center">
        <div class="audio-player text-center">
          <audio src="./audio/' . $musique['path'] . '"></audio>
          <div class="controls">
            <button class="play-btn">Play</button>
          </div>
        </div>
      </div>
    </div>';
  }
  ?>
</div>



    <div class="container text-center">
        <?php
        foreach ($playlists as $playlist) {
            echo
            '<a href="#">
    <img class="col-8" src=../img/' . $playlist['img'] . ' alt="" />
    </a>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>