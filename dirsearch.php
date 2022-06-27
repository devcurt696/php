<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dir search</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Welcome to PHP, Chapter 11, Exercise 1</h1>
<?php
$currentFolder = getcwd();
define("TOP_LEVEL_DIR", "C:/xampp/htdocs" );
if (isset($_POST['posted'])) {
    // Get folder to search for
    $folderName = isset($_POST['folderName']) ? $_POST['folderName'] : "";
    // Search for folder
    echo "<p>Searching for '$folderName' in '" . TOP_LEVEL_DIR . "' ...</p>";
    $matches = array();
    searchFolder(TOP_LEVEL_DIR, $folderName, $matches);
    // display matches
    if ($matches) {
        echo "<h2>The following folder(s) matched your search:</h2>\n<ul>\n";
        foreach ($matches as $match) echo ("<li>$match</li>");
        echo "</ul>\n";
    } else {
        echo "<p>No matches found.</p>";
    }
}
/**
 * Recursively search directory for subdirectory
 * 
 * @param string Path to directory to search
 * @param string Subdirectory
 * @param stringref Current list of matches
 */
function searchFolder($currentFolder, $folderToFind, &$matches) {
    if(!($handle = opendir($currentFolder))) die("Cannot open $currentFolder folder.");
    while($entry = readdir($handle)) {
        if(is_dir("$currentFolder/$entry")) {
            if ($entry != "." && $entry != "..") {
                // entry is a valid folder
                // if it matches the folder name, add to list of matches
                if ($entry == $folderToFind) $matches[] = "$currentFolder/$entry";
                // search folder
                searchFolder("$currentFolder/$entry",$folderToFind,$matches);
            }
        }
    }
    closedir($handle);
}
// search form
?>
    <form action="" method="post">
        <div>
            <input type="hidden" name="posted" value="true"/>
            <label>Pease Enter a folder to search for:</label>
            <input type="text" name="folderName"/>
            <input type="submit" name="search" value="Search"/>
        </div>
    </form>
</body>
</html>