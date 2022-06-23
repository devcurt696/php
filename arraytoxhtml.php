<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Definition List</title>
    <link rel="stylesheet" href="common.css"/>
    <style>
        
        dl {text-align: left; background-color: #999};
        dt, dd {
            padding: 0.4em;
        }
        dt.alt dd {
            background: #ddd;
        }
    </style>
</head>
<body>
    <h2>Function to Create a Definition List</h2>

    <?php 
    function defList($contents) {
        $markup = "<dl>\n";
        foreach($contents as $key => $value) {
            $markup .= "  <dt>$key</dt><dd>$value</dd>\n";
        }
        $markup .= "</dl>\n";
        return $markup;

    }
    
    $myBook = array("title" => "The Grapes of Wrath", "author" => "John Steinbeck", "pubYear" => 1939);
    echo defList($myBook);
    
    
    ?>
</body>
</html>