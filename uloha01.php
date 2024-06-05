<?php
require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uloha 01</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>požiadavka 01</h1>
    <?php
    // Fetch data from Customers, Orders, and Suppliers tables
    $query1 = "SELECT * FROM Customers";
    $stmt1 = $conn->query($query1);
    echo "<h2>Customers</h2><table><tr>";
    for ($i = 0; $i < $stmt1->columnCount(); $i++) {
        $col = $stmt1->getColumnMeta($i);
        echo "<th>{$col['name']}</th>";
    }
    echo "</tr>";
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>{$cell}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Fetch and display data from Orders and Suppliers tables
    $query2 = "SELECT * FROM Orders";
    $stmt2 = $conn->query($query2);
    echo "<h2>Orders</h2><table><tr>";
    for ($i = 0; $i < $stmt2->columnCount(); $i++) {
        $col = $stmt2->getColumnMeta($i);
        echo "<th>{$col['name']}</th>";
    }
    echo "</tr>";
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>{$cell}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    $query3 = "SELECT * FROM Suppliers";
    $stmt3 = $conn->query($query3);
    echo "<h2>Suppliers</h2><table><tr>";
    for ($i = 0; $i < $stmt3->columnCount(); $i++) {
        $col = $stmt3->getColumnMeta($i);
        echo "<th>{$col['name']}</th>";
    }
    echo "</tr>";
    while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>{$cell}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h1>požiadavka 02</h1>
    <?php
    // Fetch and display customers in alphabetical order by country and name
    $query2 = "SELECT * FROM Customers ORDER BY Country, CustomerName";
    $stmt2 = $conn->query($query2);
    echo "<table><tr>";
    for ($i = 0; $i < $stmt2->columnCount(); $i++) {
        $col = $stmt2->getColumnMeta($i);
        echo "<th>{$col['name']}</th>";
    }
    echo "</tr>";
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>{$cell}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h1>požiadavka 03</h1>
    <?php
    // Fetch and display orders by date
    $query3 = "SELECT * FROM Orders ORDER BY OrderDate";
    $stmt3 = $conn->query($query3);
    echo "<table><tr>";
    for ($i = 0; $i < $stmt3->columnCount(); $i++) {
        $col = $stmt3->getColumnMeta($i);
        echo "<th>{$col['name']}</th>";
    }
    echo "</tr>";
    while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>{$cell}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h1>požiadavka 04</h1>
    <?php
    // Count orders from 1995
    $query4 = "SELECT COUNT(*) as TotalOrders FROM Orders WHERE YEAR(OrderDate) = 1995";
    $stmt4 = $conn->query($query4);
    $row = $stmt4->fetch(PDO::FETCH_ASSOC);
    echo "<p>Total orders in 1995: {$row['TotalOrders']}</p>";
    ?>

<h1>požiadavka 05</h1>
<?php
// Adjust the query to the correct column if ContactTitle does not exist
$query5 = "SELECT FirstName, LastName FROM Employees WHERE Title LIKE '%Manager%' ORDER BY FirstName";
$stmt5 = $conn->query($query5);
echo "<ul>";
while ($row = $stmt5->fetch(PDO::FETCH_ASSOC)) {
    echo "<li>{$row['FirstName']} {$row['LastName']}</li>";
}
echo "</ul>";
?>

    <h1>požiadavka 06</h1>
    <?php
    // Fetch orders from September 28, 1995
    $query6 = "SELECT * FROM Orders WHERE OrderDate = '1995-09-28'";
    $stmt6 = $conn->query($query6);
    echo "<table><tr>";
    for ($i = 0; $i < $stmt6->columnCount(); $i++) {
        $col = $stmt6->getColumnMeta($i);
        echo "<th>{$col['name']}</th>";
    }
    echo "</tr>";
    while ($row = $stmt6->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>{$cell}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
