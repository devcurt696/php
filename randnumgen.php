<?php 
function randomNumGen() {
    $numDice= $_POST["numDice"];

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Number Generator</title>
</head>
<body>
    <main>
        <header>
            <h1>Random Number Generator</h1>
        </header>

        <form method="POST">
            <label for="numDice">Enter a number of dice...</label><br/>
            <input type="number" name="numDice"/><br>
            <label for="numSides">Select Number of Sides:</label><br>
            <select name="numSides">
                <option>d4</option>
                <option>d6</option>
                <option>d8</option>
                <option>d10</option>
                <option>d12</option>
            </select><br>
            <input type="submit" value="roll dice">

        </form>
    </main>
    


    
</body>
</html>