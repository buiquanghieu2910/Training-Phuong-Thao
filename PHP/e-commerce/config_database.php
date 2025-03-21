<?php
// Hàm kết nối database
function connectDatabase()
{
    // Khai báo thông tin kết nối
    $host = "localhost"; // Host của MySQL
    $username = "root"; // Tên đăng nhập
    $password = "12345678"; // Mật khẩu
    $port = 23306; // Port để kết nối
    $database_name = "sql_learning"; // Tên database

    $connection = new mysqli($host, $username, $password, $database_name, $port); // Tạo kết nối

    // Kiểm tra kết nối
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error); // Ngắt kết nối và hiển thị lỗi
    }

    return $connection;
}
