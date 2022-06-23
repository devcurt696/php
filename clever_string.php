<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating a Wrapper Class with __call()</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Creating a Wrapper Class with __call()</h1>

<?php
class CleverString {
    private $_theString = "";
    private static $_allowedFunctions = array("strlen", "strtoupper", "strpos");

    public function setString($stringVal) {
        $this->_theString = $stringVal;
    }

    public function getString() {
        return $this->_theString;
    }

    public function __call($methodName, $arguments) {
        if (in_array($methodName, CleverString::$_allowedFunctions)) {
            array_unshift($arguments, $this->_theString);
            return call_user_func_array($methodName, $arguments);
        } else {
            die("<p>Method 'CleverString::$methodName' doesn't exist</p>");
        }
    }
}

$myString = new CleverString;
$myString->setString("Hello!");
echo "<p>The String is: " . $myString->getString() . ".</p>";
echo "<p>The Length of the string is: " . $myString->strlen() . "</p>";
echo "<p>The string in uppercase is: " . $myString->strtoupper() . "</p>";
echo "<p>The letter 'e' occurs at position: " . $myString->strpos("e") . "</p>";
$myString->madUpMethod();





?>
</body>
</html>