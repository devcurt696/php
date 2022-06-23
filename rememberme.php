<?php

if (isset( $_POST["sendInfo"])) {
    storeInfo();
} elseif (isset($_GET["action"]) and $_GET["action"] == "forget") {
    forgetInfo();
} else {
    displayPage();
}

function storeInfo() {
    if(isset($_POST["firstName"])) {
        setcookie("firstName", $_POST["firstName"], time() + 60 * 60 * 24 * 365, "", "", false, true);
    }

    if(isset($_POST["location"])) {
        setcookie("location", $_POST["location"], time() + 60 *60 * 24 * 365, "", "", false, true);
    }

    header("Location: rememberme.php");
}

function forgetInfo() {
    setcookie("firstName", "", time() - 3600, "", "", false, true);
    setcookie("location", "", time() - 3600, "", "", false, true);
    header("Location: rememberme.php");
}

function displayPage() {
    $firstName = (isset($_COOKIE["firstName"])) ? $_COOKIE["firstName"] : "";
    $location = (isset($_COOKIE["location"])) ? $_COOKIE["location"] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remembering User Info</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h2>Remembering User Info</h2>

<?php if($firstName or $location) { ?>
    <p>Hi, <?php echo $firstName ? $firstName : "visitor" ?><?php echo $location ? " in $location" : "" ?>!</p>

    <p>Here's a little nursery rhyme I know:</p>

    <p><em>Hey diddle diddle,<br/>
    The cat palyed the fiddle,<br/>
    The cow jumped over the moon.<br/>
    The little dog laughed to see such sport,<br/>
    And the dish ran away with the spoon.</em></p>

    <p><a href="rememberme.php?action=forget">Forget about me!</a></p>
<?php
} else { ?>
    <form action="rememberme.php" method="post">
        <div style="width:30em;">
            <label for="firstName">What's your first name?</label>
            <input type="text" name="firstName" value=""/>
            <label for="location">Where do you live?</label>
            <input type="text" name="location" value=""/>
            <div style="clear:both">
                <input type="submit" name="sendInfo" value="Send Info"/>
            </div>
        </div>
    </form>
<?php } ?>

<?php
}
?>
</body>
</html>