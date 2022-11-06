<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Links</title>
    <link rel="stylesheet" href="common.css"/>
    </head>
    <body>
        <h1>Find Linked URLs in a web page</h1>
    <?php
    displayForm();
    if (isset($_POST["submitted"])) {
        processForm();

    }
    function displayForm() {
    ?>
        <h2>Enter a URL to scan:</h2>
        <form action="" method="post" style="30em;">
            <div>
                <input type="hidden" name="submitted" value="1"/>
                <label for="url">URL:</label>
                <input type="text" name="url" id="url" value=""/>
                <label></label>
                <input type="submit" name="submitButton" value="Find Links"/>
            </div>
        </form>
    <?php
    }
    function processForm() {
        $url = $_POST["url"];
        if(!preg_match('|^http(s)?://|', $url)) $url = "http://$url";
        $html = file_get_contents($url);
        preg_match_all("/<a\s*href=['\"](.+?)['\"].*?>(.*?)<\/a>/i", $html, $matches);
        echo '<div style="clear: both;"></div>';
        echo "<h2>Linked URLs found at ".htmlspecialchars($url).":</h2>";
        echo "<table><tr><th>URL</th><th>Link text</th>";
        for($i = 0; $i < count($matches[1]); $i++) {
            echo "<tr><td>".htmlspecialchars($matches[1][$i])."</td>";
            echo "<td>".htmlspecialchars($matches[2][$i])."</td></tr>";
        }
        echo "</table>";
    }
    ?>
    </body>
</html>