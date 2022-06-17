



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Number Generator</title>
    <link rel="stylesheet" href="/php/style.css"/>
</head>
<body>
    <main>
        <header>
            <h1>Random Number Generator</h1>
        </header>

        <form method="POST">
            <label for="numDice">Enter a number of dice...</label><br/>
            <input type="number" min="1" id="numDice" name="numDice"/><br>
            <label for="numSides">Select Number of Sides:</label><br>
            <select name="numSides" id="numSides">
                <option>d4</option>
                <option>d6</option>
                <option>d8</option>
                <option>d10</option>
                <option>d12</option>
            </select><br>
            <button type="submit" ></button>

        </form>
        <?php
        $numDice = $_POST["numDice"];
        $sides = $_POST["numSides"];
    if (isset($sides)) {
        for ($i = 0; $i < $numDice; $i++) {
            echo "Number of Dice ".($i+1).": ";
            echo rand(1, $sides);
            echo "<br>";
        }
    }


?>


    </main>
    


    
</body>
</html>