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
    <h1>Example Quick Form</h1>
<?php
require_once("C:\wamp64\bin\php\php8.1.0\pear\HTML\QuickForm.php");
$form = new HTML_QuickForm("", "post", "", "", null, true);
$form->addElement("text", "username", "Username");
$password = $form->addElement("password", "password", "Password");
$password->setValue("");
$buttons = array();
$buttons[] = $form->createElement("submit", "submitButton", "Send Details");
$buttons[] = $form->createElement("reset", "resetButton", "Reset Form");
$form->addGroup($buttons, null, null, "");
if ($form->isSubmitted()) {
    echo "<p>Thank your for the information!</p>";
} else {
    echo $form->toHtml();
}
?>
</body>
