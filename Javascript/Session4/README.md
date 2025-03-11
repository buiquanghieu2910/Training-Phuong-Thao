# Session4:

## Hàm (function)

- Hàm: để thực hiện 1 chức năng cụ thể
- Cú pháp:

  - Hàm cơ bản
  - Ham có tham số
  - Hàm trả về giá trị

- Ví dụ:

  - Hàm cơ bản

    - Cú pháp

      ```javascript
      function nameOfTheFunction() {
        // content of the function
      }

      nameOfTheFunction();
      ```

    - VÍ dụ

      ```javascript
      function sayHello() {
        let name = prompt("What is your name? ");
        console.log("Hello " + name + "!");
      }

      sayHello();
      ```

  - Hàm có tham số:

    - Cú pháp

      ```javascript
      function nameOfTheFunction(param1, param2,...) {
        // content of the function
      }

      nameOfTheFunction(param, param2);
      ```

    - Ví dụ

      ```javascript
      function sumTwoNumbers(x, y) {
        let sum = x + y;
        console.log(sum);
      }

      sumTwoNumbers(2, 3);
      ```

  - Hàm trả về kết quả:

    - Cú pháp

      ```javascript
      function nameOfTheFunction(param1, param2,...) {
      // content of the function
        return ...
      }

      nameOfTheFunction();
      ```

    - Ví dụ

      ```javascript
      function sumTwoNumbers(x, y) {
        let sum = x + y;
        console.log(sum);
        return sum;
      }

      sumTwoNumbers(2, 3);
      ```

## Xử lý sự kiện (events)

- Events: là những thứ/những điều xảy ra trên 1 trang web
- Ví dụ: nhấp chuột (click) vào cái gì đó, di chuyển chuột qua (mouse over) một phần tử (element),...
- Tất cả các element trên trang web đều có 1 tập các sự kiện tương ứng
- Một số sự kiện:
  - onClick: được kích hoạt khi nhấn chuột vào một element
  - onload và onUnload: được kích hoạt khi người dùng vào hoặc thoát khỏi trang web


# Bài Tập Xử Lý Sự Kiện Trong JavaScript

## Bài 1: Thay đổi màu nền khi click
**Mô tả:** 
Tạo một nút bấm, khi click vào nút này thì màu nền của trang web sẽ thay đổi ngẫu nhiên.

**Gợi ý:** 
- Sử dụng `document.getElementById` để lấy phần tử nút.
- Gán sự kiện `onclick` cho nút.
- Dùng `Math.random()` để tạo màu ngẫu nhiên.

---

## Bài 2: Hiển thị thông báo khi nhập vào input
**Mô tả:** 
Tạo một ô input, mỗi khi người dùng nhập vào ô này thì hiển thị giá trị vừa nhập lên màn hình.

**Gợi ý:** 
- Lắng nghe sự kiện `input` hoặc `keyup`.
- Lấy giá trị từ `event.target.value`.
- Hiển thị giá trị trong một phần tử HTML khác.

---

## Bài 3: Ẩn/hiện nội dung khi nhấn nút
**Mô tả:** 
Tạo một đoạn văn bản và một nút bấm. Khi bấm vào nút thì ẩn/hiện đoạn văn bản đó.

**Gợi ý:** 
- Sử dụng `style.display` để thay đổi hiển thị.
- Dùng `if-else` để kiểm tra trạng thái hiện tại.

---

## Bài 4: Đếm số lần click vào nút
**Mô tả:** 
Tạo một nút bấm, mỗi lần click vào nút thì hiển thị số lần đã click.

**Gợi ý:** 
- Tạo một biến đếm (`let count = 0`).
- Cập nhật biến mỗi lần click.
- Hiển thị giá trị mới lên giao diện.

---

## Bài 5: Thay đổi nội dung khi di chuột vào
**Mô tả:** 
Tạo một đoạn văn bản, khi di chuột vào đoạn văn bản thì nội dung của nó thay đổi, khi di chuột ra thì trở lại như ban đầu.

**Gợi ý:** 
- Lắng nghe sự kiện `mouseenter` và `mouseleave`.
- Dùng `innerText` hoặc `textContent` để thay đổi nội dung.

---

## Bài 6: Bấm phím để thay đổi màu nền
**Mô tả:** 
Khi người dùng nhấn một phím bất kỳ trên bàn phím, màu nền của trang web sẽ thay đổi.

**Gợi ý:** 
- Lắng nghe sự kiện `keydown` hoặc `keypress`.
- Thay đổi `document.body.style.backgroundColor`.

---

Chúc bạn học tốt JavaScript! 🚀
