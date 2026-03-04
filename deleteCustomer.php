<?php
require 'connect.php';

$sql = "DELETE FROM customer WHERE CustomerID=:CustomerID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':CustomerID', $_GET['CustomerID']);

if ($stmt->execute()) {
    $message = "Successfully delete customer" . $_GET['CustomerID'] . ".";
} else {
    $message = "Fail to delete customer information";
}
echo $message;
require 'icon_success.php';
$conn = null;
