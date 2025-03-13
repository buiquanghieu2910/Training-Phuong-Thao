# SQL Learning Database

## 1. Giới thiệu

Cơ sở dữ liệu `sql_learning` mô phỏng hệ thống thương mại điện tử đơn giản với các bảng:

- `users`: Lưu thông tin người dùng.
- `products`: Lưu thông tin sản phẩm.
- `orders`: Lưu thông tin đơn hàng.
- `order_items`: Lưu chi tiết đơn hàng.

## 2. Tạo cơ sở dữ liệu

```sql
CREATE DATABASE IF NOT EXISTS sql_learning;
USE sql_learning;
```

## 3. Cấu trúc bảng

### Bảng `users`

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Bảng `products`

```sql
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Bảng `orders`

```sql
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### Bảng `order_items`

```sql
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id)
);
```

## 4. Dữ liệu mẫu

### Dữ liệu cho bảng `users`

```sql
INSERT INTO users (name, email) VALUES
('Nguyen Van A', 'a@example.com'),
('Tran Thi B', 'b@example.com'),
('Le Van C', 'c@example.com'),
('Pham Hong D', 'd@example.com'),
('Hoang Anh E', 'e@example.com'),
('Vu Minh F', 'f@example.com'),
('Bui Thi G', 'g@example.com'),
('Nguyen Van H', 'h@example.com');
```

### Dữ liệu cho bảng `products`

```sql
INSERT INTO products (name, price, stock) VALUES
('Laptop', 15000000.00, 10),
('Smartphone', 8000000.00, 20),
('Tablet', 5000000.00, 15),
('Smartwatch', 3000000.00, 25),
('Headphones', 2000000.00, 30),
('Keyboard', 1000000.00, 40),
('Mouse', 500000.00, 50),
('Monitor', 7000000.00, 12);
```

### Dữ liệu cho bảng `orders`

```sql
INSERT INTO orders (user_id, total_price) VALUES
(1, 23000000.00),
(2, 8000000.00),
(3, 5000000.00),
(4, 3000000.00),
(5, 7000000.00),
(6, 15000000.00),
(7, 1000000.00),
(8, 2000000.00);
```

### Dữ liệu cho bảng `order_items`

```sql
INSERT INTO order_items (order_id, product_id, quantity, price) VALUES
(1, 1, 1, 15000000.00),
(1, 3, 1, 5000000.00),
(1, 5, 2, 4000000.00),
(2, 2, 1, 8000000.00),
(3, 4, 1, 3000000.00),
(4, 6, 1, 1000000.00),
(5, 8, 1, 7000000.00),
(6, 1, 1, 15000000.00),
(7, 7, 2, 1000000.00),
(8, 5, 1, 2000000.00);
```

## 5. Bài tập SQL cơ bản

### Bài 1: Lấy danh sách tất cả người dùng

```sql

```

### Bài 2: Lấy danh sách tất cả sản phẩm có giá lớn hơn 5 triệu

```sql

```

### Bài 3: Lấy thông tin đơn hàng của người dùng có `user_id = 1`

```sql

```

### Bài 4: Lấy danh sách chi tiết đơn hàng của đơn hàng có `order_id = 1`

```sql

```

### Bài 5: Lấy danh sách tất cả đơn hàng kèm tên người dùng

```sql

```

### Bài 6: Lấy danh sách sản phẩm có số lượng tồn kho dưới 20

```sql

```

### Bài 7: Lấy tổng doanh thu từ tất cả đơn hàng

```sql

```

### Bài 8: Lấy danh sách sản phẩm được đặt nhiều nhất

```sql

```

### Bài 9: Lấy thông tin người dùng đã đặt hàng ít nhất một lần

```sql

```

### Bài 10: Tính số lượng sản phẩm trung bình trên mỗi đơn hàng

```sql

```

### Bài 11: Tìm người dùng có tổng giá trị đơn hàng cao nhất

```sql

```

### Bài 12: Liệt kê sản phẩm chưa từng được đặt hàng

```sql

```

---

Tài liệu này cung cấp tổng quan về cơ sở dữ liệu `sql_learning` cùng với một số bài tập SQL cơ bản để thực hành. Chúc bạn học tốt!
