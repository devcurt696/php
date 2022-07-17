<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roman Numerals</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>1-100 in Roman Numerals</h1>
<?php 
require_once("C:\wamp64\bin\php\php8.1.0\pear\HTML\QuickForm.php");
require_once("C:\wamp64\bin\php\php8.1.0\pear\Numbers\Roman.php");
$form = new HTML_QuickForm("convertForm", "get", "", "", null, true);
$form->removeAttribute("name");
$form->addElement("text", "number", "Number (in Arabic or Roman Numerals)");
$form->addElement("submit", "convertButton", "Convert");
$form->addRule("number", "Please Enter a number", "required");
$numerals = "";
if ($form->isSubmitted() and $form->validate()) {
    convertNumbers(HTML_QuickForm::getSubmitValue());
}
echo $form->toHtml();
function convertNumber($values) {
    $originalNum = $values["number"];
    
    if (is_numeric($originalNum)) {
        $numerals= "Roman";
        $originalNum = (int) $originalNum;
        
        $convertedNum = Numbers_Roman::toNumeral($originalNum);
    } else {
        $numerals = "Arabic";
        $originalNum = preg_replace("/[^IVXLCDM]/i", "", $originalNum);
        $convertedNum = Numbers_Roman::toNumber($originalNum);
    }
    echo "<p>$originalNum in $numerals is: $convertedNum.</p>";
}
    
?>

</body>
</html>