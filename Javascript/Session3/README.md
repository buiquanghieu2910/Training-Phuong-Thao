# Session3

### Các lệnh logic

#### if

- Cú pháp

```javascript
if (condition) {
  // Code here
}
```

- Ví dụ

```javascript
var x = 3;
var y = 4;
if (x == y) {
  console.log("x bằng y");
}
```

#### if else

- Cú pháp

```javascript
if (condition) {
  // code here
} else {
  // code here
}
```

- Ví dụ

```javascript
var x = 3;
var y = 4;
if (x == y) {
  console.log("x bằng y");
} else {
  console.log("x không bằng y");
}
```

#### else if

- Cú pháp

```javascript
if (condition) {
  // code here
} else if (condition) {
  // code here
} else if (condition) {
  // code here
} else if (condition) {
  // code here
} else {
  // code here
}
```

- Ví dụ

```javascript
var score = 10;
if (score >= 8.5 && score <= 10) {
  console.log("Điểm giỏi");
} else if (score >= 6.5 && score < 8.5) {
  console.log("Điểm khá");
} else if (score >= 5 && score < 6.5) {
  console.log("Điểm trung bình");
} else if (score >= 3 && score < 5) {
  console.log("Điểm yếu");
} else if (score >= 0 && score < 3) {
  console.log("Điểm kém");
} else {
  console.log("Không xác định");
}
```

#### Toán tử bậc 3 có điều kiện (toán tử 3 ngôi)

- Cú pháp

```javascript
condition ? expression_if_true : expression_if_false;
```

- Ví dụ

```javascript
var x = 3;
var y = 4;
x == y ? console.log("x bằng y") : console.log("x không bằng y");
```

#### switch case

- Cú pháp

```javascript
switch (expression) {
  case value1:
    // code to be executed
    break;
  case value2:
    // code to be executed
    break;
  case value3:
    // code to be executed
    break;
  case value - n:
    // code to be executed
    break;
  default:
    // when no cases match
    break;
}
```

- Lưu ý: switch-case dùng để kiểm tra giá trị của 1 biến, chứ không so sánh được như if-else if-else

### Loops (vòng lặp)

#### Lệnh lặp không biết trước số lần lặp

##### while

- Cú pháp

```javascript
while (condition) {
  // code here
}
```

- Lưu ý: xử lý khéo, không thì dẫn đến vòng lặp vô hạn => crash chương trình, sập hệ thống

##### do while

- Cú pháp

```javascript
do {
  // code here
} while (condition);
```

- Lưu ý:
  - do: thực thi đoạn code ít nhất là 1 lần
  - while (condition): tiếp tục lặp nếu điều kiện true

#### Lệnh lặp biết trước số lần lặp

##### for

- Cú pháp

```javascript
for (initialization; condition; iteration) {}
// initialization: Khởi tạo biến đếm
// condition: Điều kiện tiếp tục để lặp
// iteration: Bước lặp, cập nhật biến đếm
```

##### for of

```javascript
for (const variable of array) {
  // Code to execute
}
```

##### for in

##### break, continue
- Cả break và continue đều được sử dụng trong vòng lặp, nhưng chúng có tác dụng khác nhau

| Câu lệnh  | Chức năng |
|-----------|----------|
| `break`   | Dừng vòng lặp ngay lập tức và thoát khỏi vòng lặp. |
| `continue` | Bỏ qua phần còn lại của vòng lặp trong lần lặp hiện tại và chuyển sang lần lặp tiếp theo. |


# Homework
## Bài tập JavaScript

### 1️⃣ Câu lệnh `if`, `else`, `else if`
#### **Bài 1: Kiểm tra số chẵn lẻ**
Viết chương trình yêu cầu người dùng nhập một số nguyên. Nếu số đó chia hết cho 2, in ra `"Số chẵn"`, ngược lại in `"Số lẻ"`.

#### **Bài 2: Xếp loại học lực**
Viết chương trình nhập vào điểm trung bình của học sinh và xuất ra xếp loại.

---

### 2️⃣ `switch-case`
#### **Bài 3: Kiểm tra ngày trong tuần**
Viết chương trình nhập vào một chuỗi từ thứ 2 đến chủ nhật và in ra màn hình, nếu không phải thì in ra không xác định.

---

### 3️⃣ Vòng lặp `for`
#### **Bài 4: In dãy số từ 1 đến 100**
Viết chương trình sử dụng vòng lặp `for` để in ra các số từ 1 đến 100.

#### **Bài 5: Tính tổng từ 1 đến `n`**
Nhập một số nguyên `n` từ bàn phím và tính tổng các số từ 1 đến `n`.

---

### 4️⃣ `while`
#### **Bài 6: Đếm ngược từ `n` về 1**
Viết chương trình sử dụng vòng lặp `while` đếm ngược từ `n` về 1.

---

### 5️⃣ `do...while`
#### **Bài 7: Nhập mật khẩu**
Yêu cầu người dùng nhập mật khẩu cho đến khi nhập đúng một giá trị cố định.

---

### 6️⃣ `break` và `continue`
#### **Bài 8: Tìm số đầu tiên chia hết cho `7`**
Viết chương trình tìm số đầu tiên trong khoảng 1-100 chia hết cho 7 và dừng ngay khi tìm thấy.

#### **Bài 9: In các số từ 1 đến 20 nhưng bỏ qua bội số của 3**
Sử dụng vòng lặp `for` kết hợp với `continue` để bỏ qua các số chia hết cho 3 trong khoảng 1-20.

---

💡 **Hãy thử chạy và viết lại các bài tập này để nâng cao kỹ năng lập trình JavaScript!** 🚀
