<?php
if (!isset($_COOKIE["firstVisitTime"])) {
    setcookie("firstVisitTime", time(), time() + 60 * 60 * 24 * 365, "/","");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remember Time</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h2>Remember Time</h2>
<?php if (isset($_COOKIE["firstVisitTime"])) {
    $elapsedTime = time() - $_COOKIE["firstVisitTime"];
    $elapsedTimeMinutes = (int) ($elapsedTime / 60);
    $elapsedTimeSeconds = $elapsedTime % 60;

?>
    <p>Hi! You first visited this page <?php echo $elapsedTimeMinutes?> minute<?php echo $elapsedTimeMinutes != 1 ? "s" : ""?> and <?php echo $elapsedTimeSeconds ?> second<?php echo $elapsedTimeSeconds != 1 ? "s" : "" ?> ago.</p>
<?php } else { ?>
    <p>It's your first visit, welcome!</p>
<?php } ?>
</body>
</html>