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
if(!($handle = opendir($dirPath))) die("Cannot open the directory.");
?>
    <p><?php echo $dirPath?> contains the following files and folders:</p>
    <ul>
<?php
while ($file = readdir($handle)) {
    if ($file !="." && $file != "..") echo "<li>$file</li>";
}
closedir($handle);
?>
</body>
</html>