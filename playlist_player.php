<?php
require_once("./partiels/header.php");
?>

<body class="bcg">
  <?php
  require_once("./connect/connect.php");
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-4">
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
<p>s</p>
      </div>
  <div class="col-8">
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
    <img class="col-3" src=../img/' . $playlist['img'] . ' alt="" />
    </a>';
        }
        ?>
      


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
      <div class="col-8 d-flex ">
          <div class="audio-player">
              <div class="controls">
                  <button class="play-btn" data-audio-path="./audoi/' . $musique['path'] . '" data-audio-id="' . $musique['id_musique'] . '">
                      ' . $musique['title'] . '
                  </button>
              </div>
          </div>
      </div>
  </div>';
    }
    ?>
    <script>
      let currentAudio = null;

      function stopAudio() {
        if (currentAudio !== null && !currentAudio.paused) {
          currentAudio.pause();
          currentAudio.currentTime = 0;
        }
      }

      const playButtons = document.querySelectorAll('.play-btn');

      playButtons.forEach(button => {
        button.addEventListener('click', function() {
          const audioPath = this.getAttribute('data-audio-path');
          const audioId = this.getAttribute('data-audio-id');
          const audio = new Audio(audioPath);

          if (currentAudio !== null && currentAudio.getAttribute('data-audio-id') !== audioId) {
            stopAudio();
          }

          if (audio.paused) {
            audio.play();
            currentAudio = audio;
          } else {
            audio.pause();
            currentAudio = null;
          }
        });
      });
    </script>

  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>