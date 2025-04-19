<?php
$number = $_GET['number'];
$xml = simplexml_load_file("groceries.xml");

foreach ($xml->customer as $customer) {
    if ($customer->number == $number) {
        echo "Customer No: " . $customer->number . "<br>";
        echo "Item: " . $customer->item . "<br>";
        echo "Quantity: " . $customer->quantity . "<br>";
        exit;
    }
}
echo "No grocery record found for that number.";
?>
