<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    $myNum = 5;

    function &getMyNum() {
        global $myNum;
        return $myNum;
    }
    
    $numRef =& getMyNum();
    $numRef++;

    echo "\$myNum = $myNum<br/>";
    echo "\$numRef = $numRef<br/>";
    
    ?>
</body>
</html>