
<?php
require_once 'config.php';
require_once 'functions.php';

// Count total products
$result = $conn->query("SELECT COUNT(*) AS total FROM products");
$totalProducts = $result->fetch_assoc()['total'];

// Calculate total stock
$result = $conn->query("SELECT SUM(stock_quantity) AS total FROM products");
$totalStock = $result->fetch_assoc()['total'] ?? 0;

// Calculate inventory value
$result = $conn->query("SELECT SUM(price * stock_quantity) AS total FROM products");
$inventoryValue = $result->fetch_assoc()['total'] ?? 0;

// Count low stock
$result = $conn->query("SELECT COUNT(*) AS total FROM products WHERE stock_quantity <= 5");
$lowStock = $result->fetch_assoc()['total'];

// Search products
$search = $_GET['search'] ?? '';
$searchSafe = $conn->real_escape_string($search);

$sql = "SELECT * FROM products
        WHERE product_name LIKE '%$searchSafe%'
        OR category LIKE '%$searchSafe%'
        ORDER BY id DESC";

$products = $conn->query($sql);

if (!$products) {
    die("Products query error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weaves Shop Management System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f3fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .header {
            background: #713b83;
            color: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #ddd;
        }

        .card h3 {
            color: #713b83;
        }

        .card p {
            font-size: 25px;
            font-weight: bold;
        }

        .products {
            background: white;
            padding: 20px;
            border-radius: 10px;
            overflow-x: auto;
        }

        input {
            padding: 10px;
            width: 230px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button, .add-btn {
            background: #713b83;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 13px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #713b83;
            color: white;
        }

        .edit {
            color: #16803c;
            text-decoration: none;
        }

        .delete {
            color: #d12b43;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="header">
    <h1>Weaves Shop Management System</h1>
    <p>Manage your products and monitor your shop inventory.</p>
</div>

<div class="cards">

    <div class="card">
        <h3>Total Products</h3>
        <p><?php echo $totalProducts; ?></p>
    </div>

    <div class="card">
        <h3>Total Stock</h3>
        <p><?php echo $totalStock; ?></p>
    </div>

    <div class="card">
        <h3>Inventory Value</h3>
        <p>KSh <?php echo number_format($inventoryValue, 2); ?></p>
    </div>

    <div class="card">
        <h3>Low Stock</h3>
        <p><?php echo $lowStock; ?></p>
    </div>

</div>

<div class="products">

    <h2>Product Inventory</h2>

    <a href="product_form.php" class="add-btn">+ Add New Product</a>

    <br><br>

    <form method="GET">
        <input type="text" name="search"
               placeholder="Search product or category..."
               value="<?php echo e($search); ?>">

        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price (KSh)</th>
                <th>Stock</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php if ($products->num_rows > 0): ?>

            <?php while ($row = $products->fetch_assoc()): ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo e($row['product_name']); ?></td>
                    <td><?php echo e($row['category']); ?></td>
                    <td><?php echo number_format($row['price'], 2); ?></td>
                    <td><?php echo $row['stock_quantity']; ?></td>
                    <td><?php echo e($row['description']); ?></td>

                    <td>
                        <a class="edit"
                           href="product_form.php?id=<?php echo $row['id']; ?>">
                           Edit
                        </a>

                        |

                        <a class="delete"
                           href="delete.php?id=<?php echo $row['id']; ?>"
                           onclick="return confirm('Are you sure you want to delete this product?')">
                           Delete
                        </a>
                    </td>
                </tr>

            <?php endwhile; ?>

        <?php else: ?>

            <tr>
                <td colspan="7">No products found.</td>
            </tr>

        <?php endif; ?>

        </tbody>
    </table>

</div>

</body>
</html>
