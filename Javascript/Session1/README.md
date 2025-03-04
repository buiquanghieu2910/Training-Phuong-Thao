# Session1

## Tổng quan về Javascript

### Giới thiệu về Javascript
- Javascript là 1 một ngôn ngữ lập trình được thiết kế đặc biệt để làm việc với World Wide Web

- Web thông thường sẽ gồm 3 tầng
  - Content (HTML): Nội dung
  - Presentation (CSS): Cách trình bày
  - Behavior (Javascript): Hành động của trang Web
  => VD: Javascript hồi đáp lại các tương tác của người dùng: khi người dùng click,...

### Sự phát triển của Javascript
- 1995: Javascript ra đời với tên gọi Livescript
- 1997: Tiêu chuẩn ECMA được thiết lập
- 1999: ES3 ra mắt
- 2000-2005: Ajax trở nên phổ biến trong các ứng dụng
- 2009: ES5 ra đời
- 2015: ES6/ECMAScript 2015 ra đời
- 2019: ECMAScript 8

# Vì sao nên học Javascript ?
- Javascript là ngôn ngữ lập trình thông dịch, nhẹ
- Ngôn ngữ lập trình dành cho người mới bắt đầu: phổ biến, dễ học
- Cộng đồng Javscript lớn
- Sử dụng để viết nhiều loại ứng dụng
- Nhiều thử viện và frameworks

# Javascript có thể làm gì ?
- Thực hiện các tác vụ phía Client (người dùng tương tác)
  - Tạo menu xổ xuống
  - Thay đổi nội dung trên trang web
  - Thêm các thành phần động vào trang web
  - Xác định tính hợp lệ của form (Validate form)
  - Làm việc với ảnh đề hồi đáp người dùng

## Javascript code

### Biến và kiểu dữ liệu
- Variable (biến) dùng để lưu trữ dữ liệu
- Cú pháp: var/let/const <variable_name>
- Cách đặt tên biến:
  - Tên biến bao gồm chữ cái và số, nhưng không được bắt đầu là số
  - Tên biến không bao gồm dấu cách, dấu câu, ngoại trừ dấu gạch dưới (_)
- Có thể khai báo biến trên 1 dòng
  - VD: var x,y,z
- Có thể vừa khai báo vừa khởi tạo giá trị ban đầu cho biến
  - VD:
    - var x = 1;
    - var x = 1, y = "Hello";

### Kiểu dữ liệu
- Javascript hỗ trợ những kiểu dữ liệu - Primitive data sau:
  - String
  - Number
  - BigInt
  - Boolean
  - ...

#### Kiểu dữ liệu - String
- Cách để khai báo string
  - Dấu nháy đôi ""
  - Dấu nháy đơn ''
  - Backticks  ``
- Ví dụ:
  - let funActivity = 'Let's learn JavaScript’;
  - let language = "JavaScript";
  - let message = \`Let's learn ${language}`;

- Ký tự đặc biệt

  | Ký tự     | Giải thích    |
  |-----------|---------------|
  | \\'       | '             |
  | \\"       | "             |
  | \\t       | Dấu tab       |
  | \\n       | Xuống dòng    |
  |

- Thuộc tính length: tính độ dài chuỗi
- Phương thức substring: cắt chuỗi
- Phương thức concat: nối chuỗi
- Phương thức toUpperCase: in hoa
- Phương thức toLowerCase: in thường

#### Kiểu dữ liệu - Number
- Javascript không chia ra kiểu Double, Integer... như các ngôn ngữ khsac
- Javascript gộp lại thành 1 kiểu duy nhất là Number
- Phương thức isNan():
  - Xác định xem tham số truyền vào có phải là số hay không
  - Nếu là số, trả về False và ngược lại

#### Kiểu dữ liệu - Boolean
- Kiểu boolean có hai giá trị là true và false
- Các biểu thức Boolean thường được sử dụng trong các cấu trúc điều
khiển