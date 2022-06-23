<?php
session_start();
define("USERNAME", "curtis");
define("PASSWORD", "secret");

if(isset($_POST["login"])) {
    login();
} elseif(isset($_GET["action"]) and $_GET["action"] == "logout") {
    logout();
} elseif(isset($_SESSION["username"])) {
    displayPage();
} else {
    displayLoginForm();
}

function login() {
    if(isset($_POST["username"]) and isset($_POST["password"])) {
        if ($_POST["username"] == USERNAME and $_POST["password"] == PASSWORD ) {
            $_SESSION["username"] = USERNAME;
            session_write_close();
            header("Location: logon.php");
        } else {
            displayLoginform("Sorry that username/password could not be found. Try again.");
        }
    }
}

function logout() {
    unset($_SESSION["username"]);
    session_write_close();
    header("Location: logon.php");
}

function displayPage() {
    displayPageHeader();
?>
    <p>Welcome, <strong><?php echo $_SESSION["username"] ?></strong>! You are currently logged in.</p>

    <p><a href="logon.php?action=logout">Logout</a></p>
  </body>
</html>
<?php
}

function displayLoginForm($message="") {
    displayPageHeader();
?>
    <?php if ($message) echo '<p class="error">' . $message . '</p>' ?>

    <form action="logon.php" method="post">
        <div style="width:30em;">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value=""/>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value=""/>
            <div style="clear:both;">
                <input type="submit" name="login" value="Login"/>
            </div>    
        </div>
    </form>
  </body>
</html>
<?php
}

function displayPageHeader() {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A login/logout system</title>
    <link rel="stylesheet" href="common.css" />
    <style>
        .error {
            background: #d33; 
            color: white;
            padding: 0.2em;
        }
    </style>
</head>
<body>
    <h1>A login/logout system</h1>
<?php
}
?>