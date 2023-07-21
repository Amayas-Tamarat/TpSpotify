<?php
require_once("../connect/connect.php");

if (isset($_GET['query'])) {
    $searchText = $_GET['query'];

    try {
        $stmt = $db->prepare("SELECT `title` FROM `musique` WHERE `title` LIKE ?");
        $searchText = "%" . $searchText . "%";
        $stmt->execute([$searchText]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
            foreach ($results as $result) {
                echo "<p>" . $result['title'] . "</p>";
            }
        } else {
            echo "No results found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

