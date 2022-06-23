<?php
session_start();

class Product {
    private $prodID;
    private $prodName;
    private $price;

    public function __construct($prodID, $prodName, $price) {
        $this->prodID = $prodID;
        $this->prodName = $prodName;
        $this->price = $price;
    }

    public function getID() {
        return $this->prodID;
    }

    public function getName() {
        return $this->prodName;
    }

    public function getPrice() {
        return $this->price;
    }
}

$products = array(
    1 => new Product(1, "SuperWidget", 19.99),
    2 => new Product(2, "MegaWidget", 29.99), 
    3 => new Product(3, "WonderWidget", 39.99)
);

if (!isset($_SESSION["cart"])) $_SESSION["cart"] = array();

if (isset($_GET["action"]) and $_GET["action"] == "addItem") {
    addItem();
} elseif (isset($_GET["action"]) and $_GET["action"] == "removeItem") {
    removeItem();
} else {
    displayCart();
}

function addItem() {
    global $products;
    if(isset($_GET["prodID"]) and $_GET["prodID"] >= 1 and $_GET["prodID"] <= 3) {
        $prodID = (int) $_GET["prodID"];

        if (!isset($_SESSION["cart"][$prodID])) {
            $_SESSION["cart"][$prodID] = $products[$prodID];
        }
    }

    session_write_close();
    header("Location: shoppingcart.php");
}

function removeItem() {
    global $products;
    if(isset($_GET["prodID"]) and $_GET["prodID"] >= 1 and $_GET["prodID"] <= 3) {
        $prodID = (int) $_GET["prodID"];

        if (isset($_SESSION["cart"][$prodID])) {
            unset($_SESSION["cart"][$prodID]);
        }
    }

    session_write_close();
    header("Location: shoppingcart.php");
}

function displayCart() {
    global $products;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="common.css" />
</head>
<body>
    <h1>Shopping Cart</h1>

    <dl>
<?php
$totalPrice = 0;
foreach($_SESSION["cart"] as $product) {
    $totalPrice += $product->getPrice();
?>
        <dt><?php echo $product->getName() ?></dt>
        <dd><?php echo number_format($product->getPrice(), 2) ?>
        <a href="shoppingcart.php?action=removeItem&prodID=<?php echo $product->getID() ?>">Remove</a></dd>       

<?php } ?>
        <dt>Cart Total:</dt>
        <dd><strong>$<?php echo number_format($totalPrice, 2) ?></strong></dd>
    </dl>

    <h1>Product List</h1>

    <dl>
<?php foreach($products as $product) { ?>
        <dt><?php echo $product->getName() ?></dt>
        <dd><?php echo number_format($product->getPrice(), 2) ?>
        <a href="shoppingcart.php?action=addItem&amp;prodID=<?php echo 
        $product->getID() ?>">Add Item</a></dd>
<?php } ?>
    </dl>

<?php 
}
?>
</body>
</html>