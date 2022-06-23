<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="common.css">
    <style>
        div.map {float: left; text-align: center; border: 1px solid #666; background-color: #fcfcfc; margin: 5px; padding: 1em;}
        span.home, span.pigeon{font-weight: bold;}
        span.empty {color: #666;}
    </style>
</head>
<body>
    <?php
    
    $mapSize = 10;

    do {
        $homeX = rand (0, $mapSize -1);
        $homeY = rand (0, $mapSize -1);
        $pigeon1X = rand (0, $mapSize-1);
        $pigeon1Y = rand (0,$mapSize -1);
        $pigeon2X = rand (0, $mapSize-1);
        $pigeon2Y = rand (0,$mapSize -1);
    } while (((abs($homeX - $pigeon1X) < $mapSize/2) && (abs($homeY - $pigeon1Y) < $mapSize/2) || (abs($homeX - $pigeon2X ) < $mapSize / 2) && (abs($homeY - $pigeon2Y) < $mapSize /2)));

    do {

        if ($pigeon1X < $homeX) {
            $pigeon1X++;
        } else if($pigeon1X > $homeX){
            $pigeonX--;
        } 
        if ($pigeon1Y < $homeY) {
            $pigeon1Y++;
        }else if($pigeon1Y > $homeY) {
            $pigeon1Y--;
        }
        if ($pigeon2X < $homeX) {
            $pigeon2X++;
        } else if($pigeon2X > $homeX){
            $pigeon2X--;
        } 
        if ($pigeon2Y < $homeY) {
            $pigeon2Y++;
        }else if($pigeon2Y > $homeY) {
            $pigeon2Y--;
        }
    
        echo '<div class="map" style="width: ' . $mapSize . 'em;"><pre>';
        for($y = 0; $y < $mapSize; $y++) {
            for ($x = 0; $x < $mapSize;$x++) {
                if ($x == $homeX && $y == $homeY){
                    echo '<span class="home">+</span>';
                } else if (($x == $pigeon1X && $y == $pigeon1Y) || ($x == $pigeon2X && $y == $pigeon2Y)) {
                    echo '<span class="pigeon">%</span>';
                } else {
                    echo '<span class="empty">.</span>';
                }
                echo ($x != $mapSize -1) ? " ": "";
            }
            echo "\n";
        }
        echo "</pre></div>\n";
    } while ($pigeon1X != $homeX || $pigeon1Y != $homeY || $pigeon2X != $homeX || $pigeon2Y != $homeY);
    

    ?>
</body>
</html>