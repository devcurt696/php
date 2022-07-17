<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browser Info</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Browser Info</h1>
<?php
require_once("C:\wamp64\bin\php\php8.1.0\pear\Net\UserAgent\Detect.php");
$detect = new Net_UserAgent_Detect();
echo "You are running ". $detect->getBrowserString();
echo ". Your operating system is " . $detect->getOSString();
?>
</body>
</html>