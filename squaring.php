<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Squaring</title>
    <link rel="stylesheet" href="common.css"/>
    <style>
        th{
            text-align: left;
            background-color: #999;
        }
        th, td {
            padding: 0.4em;
        }
        tr.alt td {
            background: #ddd;
        }
    </style>
</head>
<body>
<?php

define("PAGE_SIZE", 10);
$start = 0;

if (isset($_GET["start"]) and $_GET["start"] >= 0 and $_GET["start"] <= 1000) {
    $start = (int)$_GET["start"];
}

$end = $start + PAGE_SIZE - 1;
?>
    <h2>Number Squaring</h2>

<p>Displaying squares of the numbers <?php echo $start ?> to <?php echo $end ?>:</p>

    <table cellspacing="0" style="width: 20em; border: 1px solid #666;">
        <tr>
            <th>n</th>
            <th>n<sup>2</sup></th>
        </tr>
<?php
for ($i = $start; $i <= $end; $i++) 
{
?>
        <tr <?php if ($i % 2 != 0) echo ' class="alt"' ?>>
            <td><?php echo $i?></td>
            <td><?php echo pow($i, 2)?></td>
        </tr>
<?php
}
?>
    </table>
    <p>
<?php if ($start > 0) {?>
    <a href="squaring.php?start=<?php echo $start - PAGE_SIZE?>">
    &lt;Previous Page</a>    
<?php
}
?>

<a href="squaring.php?start=<?php echo $start + PAGE_SIZE ?>">Next Page</a>
    </p>
</body>
</html>