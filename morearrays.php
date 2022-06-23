<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Author Names</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Adding Author Names</h1>
    <?php
    $authors = array( "Steinbeck", "Kafka", "Tolkien", "Dickens", "Milton", "Orwell" );
    $myBooks = array(
        array(
            "title" => "The Hobbit",
            "authorId" => 2,
            "pubYear" => 1937
        ),
        array(
            "title" => "The Grapes of Wrath",
            "authorId" => 0,
            "pubYear" => 1939
        ),
        array(
            "title" => "A Tale of Two Cities",
            "authorId" => 3,
            "pubYear" => 1859
        ),
        array(
            "title" => "Paradise Lost",
            "authorId" => 4,
            "pubYear" => 1667
        ),
        array(
            "title" => "Animal Farm",
            "authorId" => 5,
            "pubYear" => 1945
        ),
        array(
            "title" => "The Trial",
            "authorId" => 1,
            "pubYear" => 1925
        ),
      
        
        );

        foreach ($myBooks as &$book) {
            $book["authorName"] = $authors[$book["authorId"]];
        }
    
        echo "<pre>";
        print_r($myBooks);
        echo "</pre>";
    
    ?>
</body>
</html>