<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form with Validation</title>
    <link rel="stylesheet" href="common.css"/>
    </head>
    <body>
        <h1>Order Form With Validation</h1>
<?php 
if (isset($_POST["submitted"])) {
    processForm();
} else {
    displayForm();
}
function displayForm() {
?>
    <h2>Please enter your order details below and click Send</h2>
    <form action="" method="post" style="width:30em;">
        <div>
            <input type="hidden" name="submitted" value="1"/>
            <label for="emailAddress">Your E-Mail Address: </label>
            <input type="email" name="emailAddress" id="emailAddress" value=""/>
            <label for="phoneNumber">Phone Number: </label>
            <input type="text" name="phoneNumber" id="phoneNumber" value=""/>
            <label for="productCodes">Product codes to Order: </label>
            <input type="text" name="productCodes" id="productCodes" value=""/>
            <label> </label>
            <input type="submit" name="submitButton" value="Send"/>
        </div>
    </form>
    <div style="clear:both;"></div>
        <p>(Separate product codes by commas. Codes are SW, MW, WW followed by 2 digits.)</p>
    <?php
}
function processForm() {
    $errMessages = array();
    $emailPattern ="/^\w+((-|\.)\w+)*\@[A-Za-z\d]+((-|\.)[A-Za-z\d]+)*\.[A-Za-z\d]+$/x";
    $phoneNumberPattern = "/^(\(\d{3}\)[-. ]?|\d{3}[-. ]?)?\d{3}[-.]\d{4}$/x";
    $prodCodePattern = "/^(SW|MW|WW)(\d{2})$/i";
    if(!preg_match($emailPattern, $_POST["emailAddress"])) {
        $errMessages[] = "Invalid E-mail address";
    }
    if(!preg_match($phoneNumberPattern, $_POST["phoneNumber"])){
        $errMessages[] = "Invalid phone Number";
    }
    if($errMessages) {
        echo "<p>There was a problem with the form you submitted:</p><ul>";
        foreach($errMessages as $errMessage) {
            echo "<li>$errMessage</li>";
        }
           
        echo '<p>Please <a href="javascript:history.go(-1)">go back</a> and try again.</p>';
    } else {
        echo "<p>Thanks for your order! You ordered the following items:</p><ul>";
        $productCodes = preg_split("/\W+/", $_POST["productCodes"], -1, PREG_SPLIT_NO_EMPTY);
        $products = preg_replace_callback($prodCodePattern, "expandProductCodes", $productCodes);
        foreach($products as $product) echo "<li>$product</li>";
        echo "</ul>";
    }
}
function expandProductCodes($matches) {
    $productCodes = array(
        "SW" => "SuperWidget",
        "MW" => "MegaWidget",
        "WW" => "WonderWidget"
    );
    return $productCodes[$matches[1]] . " model #" . $matches[2];
}
?>
</body>
</html>  