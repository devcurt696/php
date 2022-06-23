<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padding</title>
</head>
<body>
    <h1>Padding</h1>
<?php 
$myString = "Hello, world!";
$desiredLength = 20;
echo "<pre>Original String: '$myString'</pre>";
while(strlen($myString) < 20 ){
    $myString .= " ";
}
echo "<pre>Padded String: '$myString'</pre>";
?>
</body>
</html>