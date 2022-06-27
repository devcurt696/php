<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing the contents of a directory</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Listing the contents of a directory</h1>
<?php
$dirPath = "../images";
function traverseDir($dir) {
    echo "<h2>Listing $dir ...</h2>";
    if(!($handle = opendir($dir))) die("Cannot open $dir.");
    $files = array();
    while($file = readdir($handle)) {
        if($file != "." && $file != "..") {
            if(is_dir($dir . "/" . $file)) $file .= "/";
            $files[] = $file;
        }
    }
    sort($files);
    echo "<ul>";
    foreach($files as $file) echo "<li>$file</li>";
    echo "</ul>";
    foreach($files as $file) {
        if(substr($file, -1) == "/") traverseDir("$dir/".substr($file, 0, -1));
    }
    closedir($handle);
}
traverseDir($dirPath);
?>
</body>
</html>