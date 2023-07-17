<?php
include('./partiels/header.php');
?>


<body>
    <section>
       
        <div class="container2 d-flex justify-content-center my-4 mb-5">

            <div id="mobile-box">

                <!-- Card -->
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img class="card-img-top" src="https://i1.sndcdn.com/artworks-000140788375-166f62-t500x500.jpg" alt="Card image cap">
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body text-center">

                        <h5 class="h5 font-weight-bold"><a href="#" target="_blank">Bicep - Just</a></h5>
                        

                        <div class="player">
  <audio id="audioPlayer" controls>
    <source id="audioSource" src="./img/Bicep - Just.mp3" type="audio/mp3">
  </audio>
  
  <div class="controls">
    <button onclick="playPrevious()">Précédent</button>
    <button onclick="playNext()">Suivant</button>
  </div>
</div>

<script>
  let audioPlayer = document.getElementById("audioPlayer");
  let audioSource = document.getElementById("audioSource");
  let playlist = [
    "chemin/vers/audio1.mp3",
    "chemin/vers/audio2.mp3",
    "chemin/vers/audio3.mp3"
  ];
  let currentTrack = 0;

  function loadTrack(trackIndex) {
    audioSource.src = playlist[trackIndex];
    audioPlayer.load();
    audioPlayer.play();
  }

  function playPrevious() {
    currentTrack--;
    if (currentTrack < 0) {
      currentTrack = playlist.length - 1;
    }
    loadTrack(currentTrack);
  }

  function playNext() {
    currentTrack++;
    if (currentTrack >= playlist.length) {
      currentTrack = 0;
    }
    loadTrack(currentTrack);
  }
</script>


                    </div>
                </div>

            </div>
        </div>

    </section>

    <section >
        <div class="comment" >
        <input type="text" id="comm" placeholder="comment"/>
        </div>
        <div class="commAffiche">

        </div>
    </section>

    <section>
        <?php
             include('./partiels/playlist.php')
        ?>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>