<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minesweeper</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Minesweeper</h1>
    <?php
    $fieldSize = 20;
    $numMines = 10; 
    $mineField = array();

    for ($x = 0; $x < $fieldSize; $x++ ) {
        $mineField[$x] = array();
        for ($y = 0; $y < $fieldSize; $y++) {
            $mineField[$x][$y] = false;
        }
    }

    for ($i = 1; $i <= $numMines; $i++ ) {
        do {
            $mineX = rand(0, 19);
            $mineY = rand(0,19);

        } while ($mineField[$mineX][$mineY]);
        $mineField[$mineX][$mineY] = true;
    }
    
    echo "<pre>";
    for ($y=0; $y < $fieldSize; $y++ ) {
        for($x = 0; $x < $fieldSize; $x++ ) {
            echo ($mineField[$x][$y]) ? "* " : ". ";
        }
        echo "\n";
    }
    echo "</pre>";
    
    
    
    
    
    
    
    
    
    ?>

</body>
</html>