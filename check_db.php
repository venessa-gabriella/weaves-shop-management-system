<?php
require_once "config.php";

// Check the database PHP is connected to
$result = $conn->query("SELECT DATABASE() AS db");
$row = $result->fetch_assoc();

echo "Connected database: " . $row['db'] . "<br><br>";

// Check whether the products table exists
$result = $conn->query("SHOW TABLES");

echo "Tables found:<br>";

while ($row = $result->fetch_array()) {
    echo $row[0] . "<br>";
}
?>