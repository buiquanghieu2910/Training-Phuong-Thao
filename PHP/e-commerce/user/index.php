<?php
require_once "../config_database.php"; // Import file kết nối database
$connection = connectDatabase(); // Kết nối database

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
    <title>Danh sách | User</title>

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
        <h2 class="mt-3 mb-3">Danh sách người dùng</h2>
        <div class="d-flex justify-content-end">
            <a type="button" class="btn btn-primary mb-3" href="create.php">Thêm mới</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Lặp qua từng dòng dữ liệu và hiển thị ra bảng -->
                    <?php while ($row = $users->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <!-- Hiển thị ID -->
                                <?php echo $row["id"] ?>
                            </td>

                            <td>
                                <!-- Hiển thị tên -->
                                <?php echo htmlspecialchars($row["name"]) ?>
                            </td>

                            <td>
                                <!-- Hiển thị email -->
                                <?php echo htmlspecialchars($row["email"]) ?>
                            </td>

                            <td>
                                <!-- Hiển thị ngày tạo -->
                                <?php echo htmlspecialchars($row["created_at"]) ?>
                            </td>

                            <td>
                                <a class="btn btn-success" href="edit.php?id=<?php echo $row["id"]; ?>">Chỉnh sửa</a>


                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete_<?php echo $row["id"]; ?>">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                        <!-- Modal delete user -->
                        <div class="modal fade" id="modalDelete_<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có muốn xóa không ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row["id"]; ?>">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kết thúc vòng lặp -->
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<?php
$connection->close(); // Đóng kết nối
?>