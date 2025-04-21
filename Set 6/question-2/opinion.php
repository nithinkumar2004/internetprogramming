<?php
$conn = new mysqli("localhost", "root", "3306", "opinions_db");

$product_id = intval($_GET['product_id'] ?? 0);
if ($product_id <= 0) die("Invalid product");

$product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();

// Handle opinion submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['opinion'])) {
    $opinion = trim($_POST['opinion']);
    $stmt = $conn->prepare("INSERT INTO opinions (product_id, opinion) VALUES (?, ?)");
    $stmt->bind_param("is", $product_id, $opinion);
    $stmt->execute();
}

// Fetch opinions
$result = $conn->query("SELECT opinion FROM opinions WHERE product_id = $product_id");
$opinions = [];
while ($row = $result->fetch_assoc()) {
    $opinions[] = $row['opinion'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Opinions for <?php echo htmlspecialchars($product['name']); ?></title>
</head>
<body>
    <h1>Opinions for "<?php echo htmlspecialchars($product['name']); ?>"</h1>
    <form method="post">
        <textarea name="opinion" placeholder="What do you think?" required></textarea>
        <button type="submit">Submit Opinion</button>
    </form>

    <h2>Total Opinions: <?php echo count($opinions); ?>/500</h2>
    <ul>
        <?php foreach ($opinions as $op): ?>
            <li><?php echo htmlspecialchars($op); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
