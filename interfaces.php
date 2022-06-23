<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating and Using an Interface</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Creating and Using an Interface</h1>

<?php 
interface Sellable {
    public function addStock($numItems);
    public function sellItem();
    public function getStockLevel(); 

}

class Television implements Sellable {
    private $_screenSize;
    private $_stockLevel;

    public function getScreenSize() {
        return $this->_screenSize;
    }

    public function setScreenSize($screenSize) {
        $this->_screenSize = $screenSize;
    }

    public function addStock($numItems) {
     $this->_stockLevel += $numItems;  
    }

    public function sellItem() {
        if ($this->_stockLevel > 0) {
            $this->_stockLevel--;
            return true;
        } else {
            return false;
        }
    }
    
    public function getStockLevel() {
        return $this->_stockLevel;
    }
}

class TennisBall implements Sellable {
    private $color;
    private $ballsLeft;

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }
    
    public function addStock($numItems) {
       $this->ballsLeft += $numItems;
    }

    public function sellItem() {
        if ($this->ballsLeft > 0) {
            $this->ballsLeft--;
            return true;
        } else {
            return false;
        }
    }
    public function getStockLevel() {
        return $this->ballsLeft;
    }
}

class StoreManager {
    private $prodList = array();

    public function addProduct(Sellable $product) {
        $this->prodList[] = $product;
    }

    public function stockUp() {
        foreach ($this->prodList as $product) {
            $product->addStock(100);
        }
    }
}

$tv = new Television;
$tv->setScreenSize(42);
$ball = new TennisBall;
$ball->setColor("yellow");
$manager = new StoreManager();
$manager->addProduct($tv);
$manager->addProduct($ball);
$manager->stockUp();
echo "<p>There are ".$tv->getStockLevel(). " ".$ball->getColor();
echo " tennis balls in stock.</p>";
echo "<p>Selling a television...</p>";
$tv->sellItem();
echo "<p>Selling two tennis balls...</p>";
$ball->sellItem();
$ball->sellItem();
echo "<p>There are now ". $tv->getStockLevel()." ".$tv->getScreenSize();
echo "-inch television and ". $ball->getStockLevel(). " ".$ball->getColor();
echo " tennis balls in stock.</p>";




?>
</body>
</html>