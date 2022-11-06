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

use phpunit\TestCase;

/**
 * Car Simulation example
 * 
 * This script demonstrates how to use OOP
 * @author Curtis Crouse
 * @version 1.0
 * @package CarSimulator
 */
/**
 * Represents a real-world automobile
 * 
 * This class represents an automobile. Automobile can have a color, manufacturer
 * , and model. Methods provided to accelerate and slow down car, and to retrieve
 * the current speed.
 * 
 * @package CarSimulator
 */
 class Car {
    /**
     * @var string color
     */
    public $color;
    /**
     * @var string manufacturer
     */
    public $manufacturer;
    /**
     * @var string model
     */
    public $model;
    /**
     * @var string Current speed of car
     */
    private $_speed = 0;
    /**
     * Speeds up car
     * 
     * Accelerates car by 10 mph to 100mph
     * 
     * @return boolean true if the car was succesfully accelerated; false otherwise.
     */
    public function accelerate() {
        if ($this->_speed >= 100 ) return false;
        $this->_speed += 10;
        return true;
    }
    /**
     * Slows down the car
     * 
     * @return boolean True if car successfully decelerated; false otherwise.
     */
    public function brake() {
        if ($this->_speed <= 0 ) return false;
        $this->_speed -= 10;
        return true;
    }
    /**
     * Returns speed of vehicle in MPH
     * 
     * @return int the car's speed in mph
     */
    public function getSpeed() {
        return $this->_speed;
    }

 }

class CarTest extends TestCase {
    public function testInitialSpeedIsZero() {
        $car = new Car();
        $this->assertEquals(0, $car->getSpeed());
    }
    public function testAccelerate() {
        $car = new Car();
        $car->accelerate();
        $this->assertEquals(10, $car->getSpeed());
    }
    public function testMaxSpeed() {
        $car = new Car();
        for($i = 0; $i < 10; $i++) {
            $car->accelerate();
        }
        $this->assertEquals(100, $car->getSpeed());
    }
}
$testSuite = new PHPUnit_Framework_TestSuite();
$testSuite->addTest( new CarTest("testIntialSpeedIsZero"));
$testsuite->addTest(new CarTest("testAccelerate"));
$testSuite->addTest(new CarTest("testMaxSpeed"));
PHP_TextUI_TestRunner::run($testSuite);
?>
</body>
</html>