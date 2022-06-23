<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justifying Text with PHP</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Justifying Text with PHP</h1>

<?php 
$myText = <<<END_TEXT
But think not that this famous town has
only harpooners, cannibals, and 
bumpkins to show her visitors. Not at 
all. Still New Bedford is a queer place. 
Had it not been for us whalemen, that 
tract of land would this day perhaps 
have bben in as howling condition as the 
coast of Labrador.

END_TEXT;

$myText = str_replace("\n\n", "\n", $myText);

$lineLength  = 40;
$myTextJustified = "";
$numLines = substr_count($myText, "\n");
$startOfLine = 0;

for ($i = 0; $i < $numLines; $i++) {
    $originalLineLength = strpos($myText, "\n", $startOfLine) - $startOfLine;
    $justifiedLine = substr($myText, $startOfLine, $originalLineLength);
    $justifiedLineLength = $originalLineLength;
    
    while ($i < $numLines - 1 && $justifiedLineLength < $lineLength) {
        for ($j = 0; $j < $justifiedLineLength; $j++) {
            if ($justifiedLineLength < $lineLength && $justifiedLine[$j] == " ") {
                $justifiedLine = substr_replace($justifiedLine, " ", $j, 0);
                $justifiedLineLength++;
                $j++;
            }
        }
    }
    $myTextJustified .= "$justifiedLine\n";
    $startOfLine += $originalLineLength +1;
}

?>

<h2>Original text:</h2>
<pre><?php echo $myText; ?></pre>

<h2>Justified text:</h2>
<pre><?php echo $myTextJustified;?></pre>
</body>
</html>