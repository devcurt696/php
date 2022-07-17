<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci</title>
    <link rel="stylesheet" href="common.css"/>
    <style>
        th {text-align: left; background-color: #999};
        th, td {
            padding: 0.4em;
        }
        tr.alt td {
            background: #ddd;
        }
    </style>
</head>
<body>
    <h1>Fibonacci Sequence</h1>
    
    <?php
    require_once("C:\wamp64\bin\php\php8.1.0\pear\HTML\Table.php");

  
    $attrs = array("cellspacing" => 0, "border" => 0, "style" => "width: 20em; border: 1px solid #666");
    $table = new HTML_Table();
    $table->addRow(array("Sequence #", "Value"), null, "th");
    $iterations = 10;
    $num1 = 0;
    $num2 = 1;
    $table->addRow(array("F<sub>0</sub>", "0"));
    $table->addRow(array("F<sub>1</sub>", "1"));

    
    for ($i =2; $i <= $iterations; $i++) {
        $sum = $num1 + $num2;
        $num1 = $num2;
        $num2 = $sum;
        $table->addRow(array("F<sub>$i</sub>", $num2));
    }
    $attrs = array("class" => "alt");
    $table->altRowAttributes(1, null, $attrs, true);
    echo $table->toHtml();
    ?>

    </table>
</body>
</html>