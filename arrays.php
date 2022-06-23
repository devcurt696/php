<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
<?php 
         $authors = array( "Steinbeck", "Kafka", "Tolkien", "Dickens" );
        $myBook = array("title" => "Grapes of Wrath", "author" => "Steinbeck", "pubYear" => "1939" );
        echo '<h2>$authors: </h2><pre>';
        print_r($authors);
        $authorsSlice = array_slice($authors, 1, 2);
        print_r($authorsSlice);
        echo '</pre><h2>$myBook</h2><pre>';
        print_r($myBook);
        echo "</pre>";

        $myBookSlice = array_slice($myBook, 1, 2);
        print_r($myBookSlice);

        $newAuthors = array("Hardy", "Melville");
        echo array_push($authors, $newAuthors)."<br/>";

        print "<pre>";
        print_r($authors);
        print "</pre>";
?>
</body>
</html>