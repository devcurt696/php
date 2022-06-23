<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Simulator</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Car Simulator</h1>

<?php 
 class Car {
    public $color;
    public $manufacturer;
    public $model;
    private $_speed = 0;

    public function accelerate() {
        if ($this->_speed >= 100 ) return false;
        $this->_speed += 10;
        return true;
    }

    public function brake() {
        if ($this->_speed <= 0 ) return false;
        $this->_speed -= 10;
        return true;
    }

    public function getSpeed() {
        return $this->_speed;
    }

 }

 $myCar = new Car();
 $myCar->color = "red";
 $myCar->manufacturer = "Volkswagen";
 $myCar->model = "Beetle";

 echo "<p>I'm driving a $myCar->color $myCar->manufacturer $myCar->model.</p>";

 echo "<p>Stepping on the gas...<br />";

 while ($myCar->accelerate()) {
    echo "Current speed: " . $myCar->getSpeed() . " mph<br/>";
 }

 echo "</p><p>Top speed! Slowing down...<br/>";

 while ($myCar->brake()) {
    echo "Current speed: " . $myCar->getSpeed(). "mph<br />";
 }

 echo "</p><p>Stopped!</p>";

?>
</body>
</html>