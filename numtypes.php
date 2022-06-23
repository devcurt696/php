<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Numbers</title>
    <link rel="stylesheet" href="common.css" />

</head>
<body>
    <h1> Testing Numbers </h1>
    <table style="border: 1px solid black;">
        <tr>
            <th>Number</th>
            <th>Odd or Even?</th>
            <th>Prime?</th>
        </tr>
        <?php
        for ($i = 1; $i <= 12; $i++) {
            $oddEven = ($i % 2 == 0) ? "Even" : "Odd";
            switch ($i) {
                case 2:
                case 3:
                case 5:
                case 7:
                    $prime = "Yes";
                    break;
                default:
                    $prime = "No";
            }
        
        
        
        ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $oddEven;?></td>
                <td><?php echo $prime?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>