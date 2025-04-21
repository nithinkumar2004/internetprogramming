<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "3306", "opinions_db");

// Handle product submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'])) {
    $product = trim($_POST['product_name']);
    if (!empty($product)) {
        $stmt = $conn->prepare("INSERT INTO products (name) VALUES (?)");
        $stmt->bind_param("s", $product);
        $stmt->execute();
        $product_id = $stmt->insert_id;
        header("Location: opinion.php?product_id=$product_id");
        exit();
    }
}

// Fetch existing products
$products = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Opinion Poll</title>
</head>
<body>
    <h1>What do people think?</h1>
    <form method="post">
        <label>Enter Product Name:</label>
        <input type="text" name="product_name" required>
        <button type="submit">Ask 500 People</button>
    </form>

    <h2>Existing Products</h2>
    <ul>
        <?php while($row = $products->fetch_assoc()): ?>
            <li><a href="opinion.php?product_id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></a></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
