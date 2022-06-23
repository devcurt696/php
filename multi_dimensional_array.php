<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Looping through 2-D Arrays</title>
    <link rel="stylesheet" href = "common.css"/>
</head>
<body>
    <h1>Looping through a 2-D Array</h1>
    <?php 
    $myBooks = array(
        array(
            "title" => "The Grapes of Wrath",
            "author" => "Steinbeck",
            "pubYear" => 1939
        ),
        array(
            "title" => "The Trial",
            "author" => "Franz Kafka",
            "pubYear" => 1925
        ),
        array(
            "title" => "The Hobbit",
            "author" => "J. R. R. Tolkien",
            "pubYear" => 1937
        ),
        array(
            "title" => "A Tale of Two Cities",
            "author" => "Charles Dickens",
            "pubYear" => 1859
        )
        );

        $bookNum = 0;

        foreach($myBooks as $book) {
            $bookNum++;
            echo "<h2>Book #$bookNum: </h2>";
            echo "<dl>";

            foreach ($book as $key => $value) {
                echo "<dt>$key</dt>";
                echo "<dd>$value</dd>";
            }
            echo "</dl>";
        }
        
        array_multisort($myBooks);
        echo "<pre>";
        print_r($myBooks);
        echo "</pre>";
        
        
    ?>
</body>
</html>