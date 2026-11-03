<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>PHP is working!</h2>";

require_once "config.php";

echo "<p>Database connection successful!</p>";

$result = $conn->query("SELECT * FROM products");

if (!$result) {
    die("Query error: " . $conn->error);
}

echo "<p>Number of products: " . $result->num_rows . "</p>";
?>