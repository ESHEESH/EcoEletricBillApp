<?php


$name = $_REQUEST['consumer_name'];
$previous = floatval($_REQUEST['previous_reading']);
$current = floatval($_REQUEST['current_reading']);
$type = $_REQUEST['customer_type'];

if ($current < $previous) {
echo "<h3 style='color:red; text-align:center;'>Invalid Reading: Current reading cannot be lower than previous.</h3>";
echo "<div style='text-align:center;'><a href='index.html'>Go Back</a></div>";
exit();
}


$usage = $current - $previous;

if ($usage <= 200) {
$rate = 10.00;
} else {
$rate = 15.00;
}


$total = $usage * $rate;


$surcharge = 0;
if ($type == "Commercial") {
$surcharge = 500;
$total += $surcharge;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Bill Result</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
<h2>Electric Bill Summary</h2>

<p><strong>Consumer Name:</strong> <?php echo htmlspecialchars($name); ?></p>
<p><strong>Customer Type:</strong> <?php echo $type; ?></p>
<p><strong>Usage:</strong> <?php echo $usage; ?> kWh</p>
<p><strong>Rate per kWh:</strong> ₱<?php echo number_format($rate,2); ?></p>
<p><strong>Surcharge:</strong> ₱<?php echo number_format($surcharge,2); ?></p>

<p style="font-weight:bold; color:darkgreen;">
Total Bill: ₱<?php echo number_format($total,2); ?>
</p>

<a href="index.html">Calculate Again</a>
</div>

</body>
</html>