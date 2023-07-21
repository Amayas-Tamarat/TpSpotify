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


                                $music = isset($_GET['id']) ? intval($_GET['id']) : 1;
                                $previousTrack = ($music > 1) ? $music - 1 : $music;
                                $nextTrack = $music + 1;
                                ?>
                                <button onclick="location.href='<?php echo getTrackLink($previousTrack); ?>'">Précédent</button>

                                <button onclick="location.href='<?php echo getTrackLink($nextTrack); ?>'">Suivant</button>
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
        <div class="comment">
            <form action="" method="POST">
                <input type="text" id="comm" placeholder="comment" />
                <button type="submit" id="sub" class="btn btn-primary">Submite</button>
            </form>

        </div>
        <br><br>
        <div class="commAffiche">
            <!-- afficher les comm -->
            <?php
            $idMusique = $_GET['id'];
            $sql = ("SELECT * FROM commentaire WHERE id_musique = :idmusique;");
            $query = $db->prepare($sql);
            $query->bindValue(':idmusique', $idMusique, PDO::PARAM_INT);
            $query->execute();
            $comments = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($comments as $comment) {
                echo $comment['content'];
            }

            // Insérer un nouveau commentaire dans la base de données lorsque le formulaire est soumis
            if (isset($_POST)) {
                if (
                    isset($_POST['comm']) && !empty($_POST['comm'])
                ) {
                    $comm = strip_tags($_POST['comm']);
                    $sql = "INSERT INTO `commentaire` ( `content`,`id_musique`) 
            VALUES ( :comm $idMusique);";
                    $query = $db->prepare($sql);
                    $query->bindValue(':comm', $comm, PDO::PARAM_STR);
                    $query->execute();
                    header('Location: music.php');
                }
            }


            ?>
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
            echo '<img src="../img/' . $playlist['img'] . '" alt="" />';
            echo '</a>';
            echo '</div>';
        }
        ?>


    </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>