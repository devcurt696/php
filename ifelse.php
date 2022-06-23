<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola</title>
    <link rel="stylesheet" href="common.css">
</head>
<body>
    <?php 
    $hour = date("G");
    $year = date("Y");
    if ($hour >= 5 && $hour < 12) {
        echo "<h1>Good Morning!</h1>";
    } else if ($hour >= 12 && $hour < 18) {
        echo "<h1>Good afternoon!</h1>";
    } else if ($hour >= 18 && $hour <22) {
        echo "<h1>Good Evening!</h1>";
    } else {
        echo "<h1>Good night!</h1>";
    }
    $leapYear = false;
    if ((($year % 4 == 0) && ($year %100 !=0)) || ($year % 400 == 0))
        $leapYear = true;
    echo "<p>Did you know that $year is ".($leapYear ? "":" not")." a leap year?</p>";
    
    ?>
    
</body>
</html>