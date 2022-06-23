<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort Words by Length</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Sort Words by Length</h1>
<?php 

$myText = <<<END_TEXT
But think not that this famous town has 
only harpooners, cannibals, and 
bumpkins to show her visitors. Not at 
all. Still New Bedford is a queer place.
Had it not been for us whalemen, that 
tract of land would this day perhaps
have been in as howling condition as the
coast of Labrador.
END_TEXT;

echo "<h2>The Text: </h2>";
echo "<div style=\"width: 30em;\">$myText</div>";

$myText = preg_replace("/[\,\.]/", "",$myText);
$words = array_unique(preg_split("/[ \n\n\t]+/", $myText));
usort($words, function($a, $b) { return strlen($a) - strlen($b);});

echo "<h2>The sorted words: </h2>";
echo "<div style= \"width: 30em;\">";

foreach ($words as $word) {
    echo "$word";
}

echo "</div>";


?>

</body>
</html>