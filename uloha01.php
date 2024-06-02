<?php
require_once "connect.php";

// Požiadavka 01
echo "<h1>požiadavka 01</h1>";
$result = $conn->query("SELECT * FROM customers");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo implode(" | ", $row) . "<br>";
    }
}

$result = $conn->query("SELECT * FROM orders");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo implode(" | ", $row) . "<br>";
    }
}

$result = $conn->query("SELECT * FROM suppliers");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo implode(" | ", $row) . "<br>";
    }
}

// Požiadavka 02
echo "<h1>požiadavka 02</h1>";
$result = $conn->query("SELECT * FROM customers ORDER BY country, companyname");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo implode(" | ", $row) . "<br>";
    }
}

// Požiadavka 03
echo "<h1>požiadavka 03</h1>";
$result = $conn->query("SELECT * FROM orders ORDER BY orderdate");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo implode(" | ", $row) . "<br>";
    }
}

// Požiadavka 04
echo "<h1>požiadavka 04</h1>";
$result = $conn->query("SELECT COUNT(*) as count FROM orders WHERE YEAR(orderdate) = 1997");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Počet objednávok v roku 1997: " . $row['count'] . "<br>";
}

// Požiadavka 05
echo "<h1>požiadavka 05</h1>";
$result = $conn->query("SELECT contactname FROM customers WHERE contacttitle LIKE '%Manager%' ORDER BY contactname");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['contactname'] . "<br>";
    }
}

// Požiadavka 06
echo "<h1>požiadavka 06</h1>";
$result = $conn->query("SELECT * FROM orders WHERE orderdate = '1997-05-19'");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo implode(" | ", $row) . "<br>";
    }
}

$conn->close();
?>
