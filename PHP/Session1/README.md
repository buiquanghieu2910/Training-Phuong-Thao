### Giới thiệu về PHP
- PHP là ngôn ngữ lập trình kịch bản phía server, chủ yếu được sử dụng để phát triển web.
- Có thể nhúng PHP vào HTML
- PHP miễn phí và chạy trên nhiều hệ điều hành (Windows, MacOS, Linux)
- Máy chủ phổ biến: Apache, Nginx

### Cài đặt môi trường PHP
- Sử dụng XAMPP hoặc MAMP để thiết lập môi trường nhanh chóng
- Cài đặt Apache + PHP + MySQL theo cách thủ công nếu cần
- Kiểm tra phiên bản PHP: ```php -v```

### Chú pháp cơ bản
- PHP bắt đầu bằng ```<?php``` và kết thúc bằng ```?>```
- Dòng lệnh kết thúc bằng dấu ```;```
### Kết nối cơ sở dữ liệu

- Sử dụng MySQLi để kết nối cơ sở dữ liệu MySQL:
    ```php
    <?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
    }
    echo "Kết nối thành công";
    ?>
    ```

- Sử dụng PDO để kết nối cơ sở dữ liệu MySQL:
    ```php
    <?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database";

    try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Thiết lập chế độ lỗi PDO thành ngoại lệ
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Kết nối thành công";
    } catch(PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
    }
    ?>
    ```

    ### Lấy dữ liệu và hiển thị lên bảng

    - Sử dụng MySQLi để lấy dữ liệu và hiển thị lên bảng:
        ```php
        <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "database";

        // Tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $sql = "SELECT id, firstname, lastname FROM MyGuests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Name</th></tr>";
            // Output dữ liệu của mỗi hàng
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        ```

    - Sử dụng PDO để lấy dữ liệu và hiển thị lên bảng:
        ```php
        <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "database";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
            $stmt->execute();

            // Thiết lập chế độ lấy dữ liệu thành mảng kết hợp
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            echo "<table><tr><th>ID</th><th>Name</th></tr>";
            foreach($stmt->fetchAll() as $row) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
            }
            echo "</table>";
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
        $conn = null;
        ?>
        ```