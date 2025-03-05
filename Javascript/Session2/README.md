# Session2

### Kiểu dữ liệu - Undefined và null
- Null (giá trị rỗng) & undefined: không thuộc bất kỳ mô tả nào
- Là giá trị đặc biệt đại diện cho nothing (không có gì), empty (rỗng) hoặc value unknown (không xác định)

### Array (Mảng)
- Là kiểu dữ liệu dùng để lưu 1 tập các dữ liệu có kiểu giống nhau
- Tạo mảng:
  - var arr1 = new Array('Hồng', 'Thảo', 'Hiếu');
  - var arr2 = ['Hồng', 'Thảo', 'Hiếu']
- Truy xuất phần tử (element)
  - var name = arr1[1]
  - Lưu ý: Truy xuất vị trí tối đa là độ dài của mảng - 1
- Ghi đè phần tử (overwriting element)
- Phương thức thêm và thay thế phần tử
  - push(): Thêm phần tử vào cuối mảng
  - unshift(): Thêm phần tử vào đầu mảng
  - splice(x, y): Xóa y phần tử bắt đầu từ vị trí x
  - pop(): Xóa phần tử cuối trong mảng
  - concat(): Nối 2 mảng với nhau
  - indexOf(): Xác định vị trí của phần tử x

### Operators (Toán tử)
#### Toán tử số học
  | Toán tử   | Giải thích    |
  |-----------|---------------|
  | +         | Cộng          |
  | -         | Trừ           |
  | *         | Nhân          |
  | /         | Chia          |
  | %         | Chia lấy dư   |
  |

#### Toán tử quan hệ và toán tử bằng
  | Toán tử   | Giải thích          |
  |-----------|---------------------|
  | >         | Lớn hơn             |
  | <         | Bé hơn              |
  | >=        | Lớn hơn hoặc bằng   |
  | <=        | Bé hơn hoặc bằng    |
  | ==        | Bằng                |
  | !=        | Khác                |
  |

#### Toán tử logic
  | Toán tử   | Giải thích  |
  |-----------|-------------|
  | &         | Và          |
  | \|        | Hoặc        |
  | !         | Not         |
  |

### Math methods
- Math có nhiều methods cho phép thực hiện các phép tính và phép toán trên nhiều số
- Tìm số lớn nhất và nhỏ nhất
  - Math.max()
  - Math.min()
- Căn bậc 2 và lũy thừa
  - Math.sqrt(x): căn bậc 2 của x
  - Math.pow(x, y): x^y
- Chuyển số thập phân thành số nguyên
  - Math.round()
  - Math.ceil()