<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Get and Set</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Using Get and Set</h1>

    <?php 
    class Car {
        public $manufacturer;
        public $model;
        public $color;
        private $_extraData = array();

        public function __get($propertyName) {
            if (array_key_exists($propertyName, $this->_extraData)) {
                return $this->_extraData[$propertyName];
            } else {
                return null;
            }
        }

        public function __set($propertyName , $propertyValue) {
            $this->_extraData[$propertyName] = $propertyValue;
        }
    }

    $myCar = new Car();
    $myCar->manufacturer = "Volkswagen";
    $myCar->model = "Beetle";
    $myCar->color = "red";
    $myCar->engineSize = 1.8;
    $myCar->otherColors = array("green", "blue", "purple");

    echo "<h2>Some Properties:</h2>";
    echo "<p>My cars manufacturer is " . $myCar->manufacturer . ".</p>";
    echo "<p>My cars engine size is " . $myCar->engineSize . ".</p>";
    echo "<p>My cars Fuel type is " . $myCar->fuelType . ".</p>";
    echo "<h2>The \$myCar Object:</h2><pre>";
    print_r($myCar);
    echo "</pre>";
    ?>
    
</body>
</html>