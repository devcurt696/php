<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using each with a while loop</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Using each with a while loop</h1>
    <dl>
        <?php 

        $authors = array("Steinbeck", "Kafka", "Tolkien", "Dickens");
        foreach($authors as &$val) {
            if ($val == "Tolkien") $val = "Hardy";
            echo $val . " ";
        }
        unset($val);
        echo "<br/>";
        print_r($authors);

        echo "<br/><br/>";
         $myBook = array("title" => "Grapes of Wrath", "author" => "Steinbeck", "pubYear" => "1939" );

         foreach ($myBook as $element => $value) {
             echo "<dt>$element</dt>";
             echo "<dd>$value</dd>";
         }
        
        ?>
    </dl>
</body>
</html>