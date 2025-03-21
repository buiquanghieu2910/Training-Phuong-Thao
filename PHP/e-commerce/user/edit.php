<?php
require_once "../config_database.php"; // Import file kết nối database
$connection = connectDatabase(); // Kết nối database

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete = "SELECT * FROM users WHERE id = ?";
    $stmt = $connection->prepare($sql_delete);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy người dùng";
        exit();
    }

    $stmt->close();
} else {
    echo "Không có ID hợp lệ";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST['id']) ?? ''; // Lấy giá trị từ form
    $name = htmlspecialchars($_POST['name']) ?? ''; // Lấy giá trị từ form
    $email = htmlspecialchars($_POST['email']) ?? ''; // Lấy giá trị từ form

    $sql_update = "UPDATE users set name = ?, email = ? WHERE id = ?"; // Khai báo câu lệnh SQL
    $stmt = $connection->prepare($sql_update); // Chuẩn bị câu lệnh SQL
    $stmt->bind_param("ssi", $name, $email, $id); // Đổ dữ liệu vào câu lệnh SQL
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
    <title>Chỉnh sửa | User</title>

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
        <h2 class="mt-3 mb-3">Chỉnh sửa</h2>
        <form action="" method="POST">
            <input class="form-control" type="text" id="id" name="id" value="<?php echo $user['id']; ?>" hidden>

            <div class="mb-3">
                <label for="formFile" class="form-label">Tên</label>
                <input class="form-control" type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Ngày tạo</label>
                <input class="form-control" type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['created_at']); ?>" disabled>
            </div>

            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Cập nhật</button>
            </div>
        </form>
    </div>
</body>

</html>