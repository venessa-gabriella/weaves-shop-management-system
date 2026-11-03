<?php
require 'config.php';
require 'functions.php';

$id = $_GET['id'] ?? '';

$name = "";
$category = "";
$price = "";
$stock = "";
$description = "";

if ($id != "") {

    $stmt = $conn->prepare(
        "SELECT * FROM products WHERE id = ?"
    );

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if (!$product) {
        die("Product not found.");
    }

    $name = $product['product_name'];
    $category = $product['category'];
    $price = $product['price'];
    $stock = $product['stock_quantity'];
    $description = $product['description'];
}

if (isset($_POST['save'])) {

    $name = trim($_POST['product_name']);
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock_quantity'];
    $description = trim($_POST['description']);

    if ($id != "") {

        $stmt = $conn->prepare(
            "UPDATE products SET
            product_name=?,
            category=?,
            price=?,
            stock_quantity=?,
            description=?
            WHERE id=?"
        );

        $stmt->bind_param(
            "ssdisi",
            $name,
            $category,
            $price,
            $stock,
            $description,
            $id
        );

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO products
            (product_name, category, price, stock_quantity, description)
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "ssdis",
            $name,
            $category,
            $price,
            $stock,
            $description
        );
    }

    if ($stmt->execute()) {
        echo "<script>
            alert('Product saved successfully!');
            window.location='index.php';
        </script>";
        exit;
    } else {
        echo "Error: " . e($stmt->error);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product | Weave & Co.</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="sidebar">
    <h2>✿ Weave & Co.</h2>
    <a href="index.php">Dashboard</a>
    <a href="product_form.php" class="active">Add Product</a>
</div>

<div class="main">

    <header>
        <div>
            <p>PRODUCT MANAGEMENT</p>
            <h1><?= $id != "" ? "Edit Product" : "Add New Product" ?></h1>
        </div>
    </header>

    <div class="form-container">

        <h2>Product Details</h2>
        <p>Enter the details of your weave product below.</p>

        <form method="POST">

            <label>Product Name</label>

            <input type="text"
                   name="product_name"
                   value="<?= e($name) ?>"
                   placeholder="Enter product name"
                   required>

            <label>Category</label>

            <select name="category" required>
                <option value="">Select Category</option>

                <?php
                $categories = [
                    "Braids",
                    "Human Hair",
                    "Synthetic Hair",
                    "Wigs",
                    "Weaves",
                    "Twists",
                    "Accessories"
                ];

                foreach($categories as $cat):
                ?>

                <option value="<?= e($cat) ?>"
                    <?= $category == $cat ? "selected" : "" ?>>
                    <?= e($cat) ?>
                </option>

                <?php endforeach; ?>

            </select>

            <label>Price (KSh)</label>

            <input type="number"
                   name="price"
                   min="0"
                   step="0.01"
                   value="<?= e($price) ?>"
                   placeholder="Enter price"
                   required>

            <label>Stock Quantity</label>

            <input type="number"
                   name="stock_quantity"
                   min="0"
                   value="<?= e($stock) ?>"
                   placeholder="Enter stock quantity"
                   required>

            <label>Description</label>

            <textarea name="description"
                      placeholder="Describe the product"><?= e($description) ?></textarea>

            <button type="submit" name="save" class="save-btn">
                <?= $id != "" ? "Update Product" : "Save Product" ?>
            </button>

            <a href="index.php" class="cancel-btn">Cancel</a>

        </form>

    </div>

</div>

</body>
</html>