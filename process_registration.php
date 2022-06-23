<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Thank You</h1>
    <p>Thanks for registering. You submitted the following information:</p>
<?php 
$favoriteWidgets = "";
$newsletters = "";
if (isset($_POST["favoriteWidgets"])) {
    foreach($_POST["favoriteWidgets"] as $widget) {
        $favoriteWidgets .= $widget . ", ";
    }
}
if(isset($_POST["newsletter"])) {
    foreach($_POST["newsletter"] as $newsletter) {
        $newsletters .= $newsletter . ", ";
    }
}

$favoriteWidgets = preg_replace("/, $/", "", $favoriteWidgets);
$newsletters = preg_replace("/, $/", "", $newsletters);
?>
    <dl>
        <dt>First Name</dt><dd><?php echo $_POST["firstName"]?></dd>
        <dt>Last Name</dt><dd><?php echo $_POST["lastName"]?></dd>
        <dt>Password</dt><dd><?php echo $_POST["password1"]?></dd>
        <dt>Retyped pasword</dt><dd><?php echo $_POST["password2"]?></dd>
        <dt>Gender</dt><dd><?php echo $_POST["gender"]?></dd>
        <dt>Favorite Widget</dt><dd><?php echo $favoriteWidgets?></dd>
        <dt>Do You want to receive our newsletter?</dt><dd><?php echo $newsletters?></dd>
        <dt>Comments</dt><dd><?php echo $_POST["comments"]?></dd>
    </dl>
</body>
</html>