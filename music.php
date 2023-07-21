<?php
include('./partiels/header.php');
include('./connect/connect.php');



$idMusique = $_GET['id'];
$sql = ("SELECT * FROM musique WHERE id_musique = :idmusique;");
$query = $db->prepare($sql);
$query->bindValue(':idmusique', $idMusique, PDO::PARAM_INT);
$query->execute();
$musiques = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($musiques as $musique) {
    $pathmusique = $musique['path'];
}
?>




<body>
    <?php
    include('./partiels/marquee-rss.php')
    ?>
    <section>

        <div class="container2 d-flex justify-content-center my-4 mb-5">

            <div id="mobile-box">

                <!-- Card -->
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <?php

                        echo '<img   src=./img/' .  $musique['img'] . ' ';
                        ?> <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <?php
                        foreach ($musiques as $musique) {
                            echo $musique['title'];
                        }
                        ?>


                        <div class="player">
                            <a href="./audio/BICEP_OPAL.mp3"></a>
                            <audio id="audioPlayer" controls>
                                <?php echo '<source src="./audio/' . $pathmusique . '">'; ?>
                            </audio>

                            <div class="controls">
                                <?php
                                function getTrackLink($music)
                                {

                                    return 'music.php?id=' . $music;
                                }

                                $sql = 'SELECT COUNT(id_musique) AS musiqueCount  FROM musique';
                                $request = $db->query($sql);
                                $numero = $request->fetch();
                                $music = isset($_GET['id']) ? intval($_GET['id']) : 1;

                                $previousTrack = ($music > 1) ? $music - 1 : $music;
                                $nextTrack = $music + 1;


                                ?>


                                <button class="btn btn-primary" onclick="location.href='<?php echo getTrackLink($previousTrack); ?>'">Précédent</button>

                                <?php if ($_GET['id'] === $numero['musiqueCount']) { ?>

                                    <button disabled>suivant</button>

                                <?php } else { ?>

                                    <button class="btn btn-primary" onclick="location.href='<?php echo getTrackLink($nextTrack); ?>'">Suivant</button>

                                <?php } ?>
                                <?php
                                $idMusique = $_GET['id'];
                                $query = "SELECT id_playlist, tilte FROM playlist";
                                $listPlaylists = $db->query($query);

                                // Check if the form is submitted
                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    if (isset($_POST['selectedPlaylist'])) {
                                        $selectedPlaylist = $_POST['selectedPlaylist'];
                                        $insertQuery = "INSERT INTO musique_playlist (id_musique, id_playlist) VALUES ('$idMusique', '$selectedPlaylist')";
                                        $db->query($insertQuery);
                                    }
                                }
                                ?>

                                <label for="playlist"></label>
                                  
                                <form class="form-floating" method="POST">
                                    <select  name="selectedPlaylist" id="playlists">
                                        <?php
                                        foreach ($listPlaylists as $playlist) {
                                            $id_playlist = $playlist['id_playlist'];
                                            $title = $playlist['tilte'];
                                        ?>
                                            <option value="<?php echo $id_playlist; ?>"><?php echo $title; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                    <button class="btn btn-primary" type="submit">Add to Playlist</button>
                                </form>
                            </div>
                        </div>

                        <script>
                            let audioPlayer = document.getElementById("audioPlayer");
                            let audioSource = document.getElementById("audioSource");

                            function loadTrack(trackIndex) {
                                audioSource.src = playlist[trackIndex];
                                audioPlayer.load();
                                audioPlayer.play();
                            }
                        </script>


                    </div>
                </div>

            </div>
        </div>

    </section>

    <section>
        <?php
        $idMusique = $_GET['id'];
        ?>
        <div class="comment">

            <form action="traitementCommantaire.php?idMusique=<?php echo $idMusique ?>" method="POST">
                <input type="text" id="comm" name="comm" placeholder="comment" />
                <button type="submit" id="sub" class="btn btn-primary">Submite</button>
            </form>

        </div>
        <br><br>
        <div class="commAffiche">
            <!-- afficher les comm -->
            <?php
            include('./traitement/adCom.php');
            ?>
            <script>
                function refreshChat() {
                    fetch('music.php')
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('commAffiche').innerHTML = data;
                        })
                        .catch(error => console.error(error));
                }


                setInterval(refreshChat, 2500);
            </script>



        </div>
    </section>

    <section>
        
        <?php

        $sql = ("SELECT * FROM  playlist");
        $query = $db->prepare($sql);
        $query->execute();
        $playlists = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($playlists as $playlist) {
            $_GET['id'] = $playlist['id_playlist'];
            $playlistId = $playlist['id_playlist'];
            echo '<div class="box">';
            echo '<a href="playlist_player.php?id=' . $playlistId . '">';
            echo '<a href="playlist_player.php?id=' . $playlistId . '">';
            echo '<img src="../img/' . $playlist['img'] . '" alt="" />';
            echo '</a>';
            echo '</div>';
        }
        ?>


    </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>