<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A simple hit counter</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>A simple hit counter</h1>
<?php
$counterFile = "./count.dat";
if(!file_exists($counterFile)){
    if (!($handle = fopen($counterFile, "w"))) {
        die("Cannot create the counter file.");
    }
     else {
        fwrite($handle, 0);
        fclose($handle);
    }
}
if (!($handle = fopen($counterFile, "r"))) {
    die("Cannot read the counter file");
}
$counter = (int) fread($handle, 20);
fclose($handle);
$counter++;
echo "<p>You're visitor No. $counter.</p>";
if (!($handle = fopen($counterFile, "w"))) {
    die("Cannot open the counter file for writing");
}
fwrite($handle, $counter);
fclose($handle);
?>

</body>
</html>