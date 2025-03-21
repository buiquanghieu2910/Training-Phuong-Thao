<?php
require_once "../config_database.php"; // Import file kết nối database
$connection = connectDatabase(); // Kết nối database

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM users WHERE id = ?";
    $stmt = $connection->prepare($sql_delete);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit();
?>