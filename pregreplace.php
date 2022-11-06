<?php
$text = "The wholesale price is $89.50.";
echo preg_replace( "/\\$\d+\.\d{2}/", "[CENSORED]", $text );
?>