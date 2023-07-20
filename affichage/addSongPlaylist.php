<?php
require_once("../connect/connect.php");
$idMusique = $_GET['idMusique'];
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

<label for="playlist">Playlist</label>

<form method="POST">
    <select name="selectedPlaylist" id="playlists">
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

    <button type="submit">Add to Playlist</button>
</form>