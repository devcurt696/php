<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Microtime</title>
    <link rel="stylesheet" href="common.css"/>
    </head>
    <body>
        <h1>Microtime</h1>
    <?php 
    //start timer
    $startTime = microtime(true);
    
    for($i=0;$i<10;$i++) {
        echo "<p>Hello World!</p>";
    }

    $endTime = microtime(true);
    $elapsedTime = $endTime - $startTime;
    printf("<p>The operation took %0.6f seconds to execute.</p>", $elapsedTime);
    ?>
    
    </body>
</html>