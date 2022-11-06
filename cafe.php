<?php 
$drinks = ["coffee" => 2.99, "tea" => 2.99, "orange juice" => 1.99, "water" => 0, "soda" => 2.99];

$pastries = ["doughnuts", "cookies", "croissant", "bagels", "muffins"];
?>

<h1>Welcome to the Repetitive Cafe</h1>

<h3>Drinks!</h3>
<ul>
<?php foreach($drinks as $drink=>$price): ?>
<li><?="$drink: $$price"?></li>
<?php endforeach; ?>
</ul>
<h3>Pastries! ($2 each)</h3>
<ul>
<?php for($i = 0; $i < count($pastries); $i++): ?>
<li><?="$pastries[$i]"?></li>
<?php endfor; ?>
</ul>