<?php
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


$users = $connection->query("SELECT * FROM users"); // Lấy danh sách người dùng
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integration database</title>
</head>

<body>
    <h2>Danh sách người dùng</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>
            <!-- Lặp qua từng dòng dữ liệu và hiển thị ra bảng -->
            <?php while($row = $users->fetch_assoc()): ?>
            <tr>
                <td>
                    <!-- Hiển thị ID -->
                    <?php echo $row["id"]?>
                </td>

                 <td>
                    <!-- Hiển thị tên -->
                    <?php echo $row["name"]?>
                </td>

                <td>
                    <!-- Hiển thị email -->
                    <?php echo $row["email"]?>
                </td>

                <td>
                    <!-- Hiển thị ngày tạo -->
                    <?php echo $row["created_at"]?>
                </td>
            </tr>
            <!-- Kết thúc vòng lặp -->
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>

<?php
$connection->close(); // Đóng kết nối
?>