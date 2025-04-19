<?php
$id = $_GET['id'];
$xml = simplexml_load_file("users.xml");

foreach ($xml->user as $user) {
    if ($user->id == $id) {
        echo "User Found:<br>";
        echo "Name: " . $user->name . "<br>";
        echo "Email: " . $user->email . "<br>";
        exit;
    }
}
echo "User not found.";
?>
