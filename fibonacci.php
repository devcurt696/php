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
    <table cellspacing="0" style="width: 20em; border: 1px solid #666;">
    <tr>
        <th>Sequence Number</th>
        <th>Value</th>
    </tr>
   
    <?php
    $iterations = 20;
    function fibonacci($n) {
        if(($n == 0) || ($n ==1)) return $n;
        return fibonacci($n - 2) + fibonacci($n -1);
    }
    for ($i =2; $i <= $iterations; $i++) {
    ?>
        <tr <?php if ($i%2 != 0) echo ' class="alt"'; ?>>
            <td>F<sub><?php echo $i;?></sub></td>
            <td><?php echo fibonacci($i); ?></td>
        </tr>

    <?php 
    }
    ?>

    </table>
</body>
</html>