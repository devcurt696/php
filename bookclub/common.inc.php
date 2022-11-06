<?php

function displayPageHeader($pageTitle) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle?></title>
    <link rel="stylesheet" href="common.css"/>
    <style>
        th{
            text-align: left;
            background-color: #bbb;
        }
        th, td {
            padding: 0.4em;
        }
        tr.alt td {
            background: #ddd;
        }
        .error {
            background: #d33; color: white; padding: 0.2em;
        }
    </style>
</head>
<body>
    <h1><?php echo $pageTitle?></h1>
<?php
}
function displayPageFooter() {
?>
</body>
</html>
<?php
}
?>