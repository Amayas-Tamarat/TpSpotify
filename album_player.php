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
<p>SpotHify</p>

      </div>
    <div class="col-8">

                <?php
                $idAlbum = $_GET['id'];
                $sql = ("SELECT * FROM  album WHERE id_album = :idAlbum ");
                $query = $db->prepare($sql);
                $query->bindValue(':idAlbum', $idAlbum, PDO::PARAM_INT);
                $query->execute();
                $albums = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($albums as $album) {

                    echo
                    '<a href="#">
    <img class="col-6" src=../img/' . $album['img'] . ' alt="" />
    </a>';
                }
                ?>




    <div class="container">
  <?php
$sql = ("SELECT * FROM  musique WHERE id_album = :idAlbum ");
       $query = $db->prepare($sql);
       $query->bindValue(':idAlbum', $idAlbum, PDO::PARAM_INT);
       $query->execute();
       $musiques = $query->fetchAll(PDO::FETCH_ASSOC);
         foreach ($musiques as $musique) {
          $_GET['id_musique'] = $musique['id_musique'];
          $musiqueId = $musique['id_musique'];
          
            echo '
        <div class="row">
            <div class="col-8 d-flex ">
                <div class="audio-player">
                    <div class="controls">

                    <button class="redirect-btn" onclick="redirectToMusiquePage(' . $musique['id_musique'] . ')">>
                            ' . $musique['title'] . '
                    </button>    

                    </div>
                </div>
            </div>
        </div>';
          }
  ?>
</div>



    <div class="container text-center">
        <?php
        foreach ($albums as $album) {
            echo
            '<a href="#">
    <img class="col-8" src=../img/' . $album['img'] . ' alt="" />
    </a>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>