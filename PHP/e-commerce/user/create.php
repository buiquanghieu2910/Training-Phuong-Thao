<?php
require_once "../config_database.php"; // Import file kết nối database
$connection = connectDatabase(); // Kết nối database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']) ?? ''; // Lấy giá trị từ form
    $email = htmlspecialchars($_POST['email']) ?? ''; // Lấy giá trị từ form

    $sql_insert = "INSERT INTO users (name, email) VALUES (?, ?)"; // Khai báo câu lệnh SQL
    $stmt = $connection->prepare($sql_insert); // Chuẩn bị câu lệnh SQL
    $stmt->bind_param("ss", $name, $email); // Đổ dữ liệu vào câu lệnh SQL
    $stmt->execute(); // Thực thi câu lệnh SQL
    $stmt->close(); // Đóng kết nối
    header("Location: index.php"); // Chuyển hướng về trang index.php
    exit(); // Kết thúc chương trình
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới | User</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php include '../menu.php' ?>
    <div class="container">
        <h2 class="mt-3 mb-3">Thêm mới</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="formFile" class="form-label">Tên</label>
                <input class="form-control" type="text" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Email</label>
                <input class="form-control" type="email" id="email" name="email" required>
            </div>

            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </form>
    </div>

</body>

</html>