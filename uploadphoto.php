<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photos</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
<?php
if (isset($_POST["sendPhoto"])) {
    processForm();
} else {
    displayForm();
}
function processForm() {
    if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        if ($_FILES["photo"]["type"] != "image/jpeg") {
            echo "<p>JPEG photos only!</p>";
        } elseif (!move_uploaded_file($_FILES["photo"]["tmp_name"],"photos/" . basename($_FILES["photo"]["name"]))) {
            echo "<p>Problem uploading that photo.</p>". $_FILES["photo"]["error"];
        }else {
            displayThanks();
        }
    } else {
        switch($_FILES["photo"]["error"]) {
            case UPLOAD_ERR_INI_SIZE: 
                $message = "The photo is too large for the server!";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $message ="This photo is too large for the script!";
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = "No file was uploaded. Choose a file to upload.";
                break;
            default:
                $message = "Contact Server Administrator for help.";
        }
        echo "<p>Problem Uploading photo. $message</p>";
    }
}
function displayForm() {
?>
    <h1>Upload Photos</h1>
    <p>Please enter your name and choose a photo to upload.</p>
    <form action="uploadphoto.php" method="post" enctype="multipart/form-data">
        <div style="width:30em;">
            <input type="hidden" name="MAX_FILE_SIZE" value="500000"/>
            <label for="visitorName">Enter your Name: </label>
            <input type="text" name="visitorName" id = "visitorName" value=""/>
            <label for="photo">Upload photo: </label>
            <input type="file" name="photo" id = "photo" value=""/>
            <div style="clear:both;">
                <input type="submit" name="sendPhoto" value="Send Photo"/>
            </div>
        </div>
    </form>
<?php 
}
function displayThanks() {
?>
    <h1>Thank You</h1>
    <p>Thanks for uploading your photo<?php if ($_POST["visitorName"]) echo ", " . $_POST["visitorName"] ?>!</p>
    <p>Here's your photo:</p>
    <p><img src="photos/<?php echo $_FILES["photo"]["name"]?>" alt="photo"/></p>
<?php
}
?>
</body>
</html>