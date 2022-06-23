<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Calculator</h1>

<?php 
class Calculator {
    protected $firstNum, $secondNum;
    
    public function __construct($num1, $num2) {
        $this->firstNum = $num1;
        $this->secondNum = $num2;
    }

    public function add() {
        return $this->firstNum + $this->secondNum;
    }

    public function subtract() {
        return $this->firstNum - $this->secondNum;
    }

    public function multiply() {
        return $this->firstNum * $this->secondNum;
    }

    public function divide() {
        return $this->firstNum / $this->secondNum;
    }
}

class AdvancedCalculator extends Calculator {
    private static $_allowedFunctions = array("pow"=>2, "sqrt"=>1,"exp"=>1);
    public function __construct($num1, $num2=null) {
        parent::__construct($num1, $num2);
    }
    public function __call($methodName, $functionArgs) {
        if (in_array($methodName, array_keys(AdvancedCalculator::$_allowedFunctions))) {
            $functionArgs = array($this->firstNum);
            if(AdvancedCalculator::$_allowedFunctions[$methodName] == 2) array_push($functionArgs, $this->secondNum);
            return call_user_func_array($methodName, $functionArgs);
        } else {
            die ("<p>Method 'AdvancedCalculator::$methodName' doesn't exist!</p>");
        }
    }
}
$ca = new AdvancedCalculator(100, 25);
echo "<p>3 + 4 = ". $ca->add()."</p>";
echo "<p>3 - 4 = ".$ca->subtract()."</p>";
echo "<p>".$ca->multiply()."</p>";
echo "<p>".$ca->divide()."</p>";
echo "<p>pow(3, 4) ". $ca->pow()."</p>";
echo "<p>sqrt(3, 4) ".$ca->sqrt()."</p>";
echo "<p>exp(3, 4) ".$ca->exp()."</p>";





?>
</body>
</html>