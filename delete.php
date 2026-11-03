<?php

require 'config.php';

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    $stmt = $conn->prepare(
        "DELETE FROM products WHERE id = ?"
    );

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {

        echo "<script>
            alert('Product deleted successfully!');
            window.location='index.php';
        </script>";

    } else {

        echo "Error deleting product.";
    }

} else {

    header("Location: index.php");
}

?>