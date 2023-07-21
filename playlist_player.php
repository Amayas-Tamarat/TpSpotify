<?php
require_once("./partiels/header.php");
?>

<body class="bcg">
  <?php
  require_once("./connect/connect.php");
  ?>
 


        <?php

        $idPlaylist = $_GET['id'];
        $sql = "SELECT playlist.img, playlist.id_playlist, playlist.title
        FROM playlist
        WHERE playlist.id_playlist = :idPlaylist";

        $query = $db->prepare($sql);
        $query->bindValue(':idPlaylist', $idPlaylist, PDO::PARAM_INT);
        $query->execute();
        $playlists = $query->fetchAll(PDO::FETCH_ASSOC);


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
        ?>

        
        <style>
  .img-fond { 
    background-image: url(./img/<?php echo $playlists[0]['img']; ?>);
    background-size: cover;
    background-position: center;
    height: 50%;
  }
</style>

<div class="container-fluid">
    <div class="row">
      <div class="col-2">
      <div class="grey-back">
        <p>SpotHify</p>
        <div>
      <a href="./index.php">
      <svg class="svg" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22.262 10.468c-3.39-2.854-9.546-8.171-9.607-8.225l-.655-.563-.652.563c-.062.053-6.221 5.368-9.66 8.248-.438.394-.688.945-.688 1.509 0 1.104.896 2 2 2h1v6c0 1.104.896 2 2 2h12c1.104 0 2-.896 2-2v-6h1c1.104 0 2-.896 2-2 0-.598-.275-1.161-.738-1.532zm-8.262 9.532h-4v-5h4v5zm4-8l.002 8h-3.002v-6h-6v6h-3v-8h-3.001c2.765-2.312 7.315-6.227 9.001-7.68 1.686 1.453 6.234 5.367 9 7.681l-3-.001z"/></svg>      
   <span>Accueil</span> 
  </a>
        </div>
      
      </div>
      <div class="grey-back">
    <p>Bibliothèque</p>
        <div>
      <a href="./index.php">
      <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6h-6c0-1.104-.896-2-2-2h-4c-1.654 0-3 1.346-3 3v10c0 1.654 1.346 3 3 3h12c1.654 0 3-1.346 3-3v-8c0-1.654-1.346-3-3-3zm-12 0h4c0 1.104.896 2 2 2h6c.552 0 1 .448 1 1h-14v-2c0-.552.448-1 1-1zm12 12h-12c-.552 0-1-.448-1-1v-7h14v7c0 .552-.448 1-1 1z"/></svg>
      <span>En construction</span> 
  </a>
        </div>
      </div>

      </div>


      <div class="img-fond col-10">
      <div class="navbar bg-navbar">
  <button id="prev-btn"><</button>
  <button id="next-btn">></button>
</div>



<script>
  document.getElementById('prev-btn').addEventListener('click', function() {
    history.back(); 
  });

  document.getElementById('next-btn').addEventListener('click', function() {
    history.forward();
  });
</script>


      <div class="pt-5">
        <h2><?php echo $playlists[0]['title'] ?></h2>
      </div>
          <?php
          foreach ($musiques as $musique) {
            echo '
  <div class="row grey-back-no-border">
      <div class=" d-flex ">
          <div class="audio-player">
              <div class="controls">
                  <button class="play-btn" data-audio-path="./audio/' . $musique['path'] . '" data-audio-id="' . $musique['id_musique'] . '">
                      ' . $musique['title'] . '
                  </button>
              </div>
          </div>
      </div>
  </div>';
          }
          ?>


        </div>
      
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