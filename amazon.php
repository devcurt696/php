<?php
if (isset($_POST["submitButton"])) {
    switch ($_POST["store"]) {
        case ".com":
            header("Location: https://www.amazon.com" );
            break;
        case ".ca":
            header("Location: https://www.amazon.ca");
            break;
        case ".co.uk":
            header("Location: https://www.amazon.co.uk");
            break;
    }
} else {
    displayForm();
}
function displayForm() {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Store Selector</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Amazon Store Selector</h1>
    <form action="" method="post">
        <label for="store">Choose your Amazon Store</label>
        <select name="store" id="store" size="1">
            <option value=".com">Amazon.com</option>
            <option value=".ca">Amazon.ca</option>
            <option value=".co.uk">Amazon.co.uk</option>
        </select>
        <div style="clear:both;">
        <input type="submit" name="submitButton" id="submitButton" value="Visit Store"/>
        </div>
    </form>
<?php
}
?>
</body>
</html>