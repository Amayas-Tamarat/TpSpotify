<!DOCTYPE html>
<html>
<head>
    <title>Real-time Search Bar</title>
</head>
<body>
    <input type="text" id="searchInput" placeholder="Search for music...">
    <div id="searchResults"></div>

    <script>
        const searchInput = document.getElementById("searchInput");
        const searchResults = document.getElementById("searchResults");

        searchInput.addEventListener("input", function() {
            const searchText = searchInput.value;

            if (searchText.trim() !== "") {
                fetch(`search.php?query=${searchText}`)
                    .then(response => response.text())
                    .then(data => {
                        searchResults.innerHTML = data;
                    });
            } else {
                searchResults.innerHTML = "";
            }
        });
    </script>
</body>
</html>
