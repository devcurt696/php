<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorials</title>
    <link rel="stylesheet" href="common.css"/>
    <style>
        table {border: 0;width: 20em;border:1px solid #666;}
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
    <h1>Factorials</h1>
    <table cellspacing="0">
        <tr>
            <th>Integer</th>
            <th>Factorial</th>
        </tr>
    <?php 
    $iterations = 10;
    function factorial($n) {
        if ($n==0) return 1;
        return factorial($n -1) * $n;
    }
    
    
    for ($i = 0; $i < $iterations;$i++) {
    ?>
    <tr <?php if($i % 2 != 0) echo ' class="alt"'?>>
        <td><?php echo $i ?></td>
        <td><?php echo factorial($i)?></td>
    </tr>
    <?php } ?>
    </table>
</body>
</html>