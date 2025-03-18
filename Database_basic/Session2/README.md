# Quản lý Nhân Sự - Hướng dẫn tạo Database và Bài tập SQL

## 1. Giới thiệu
Cơ sở dữ liệu này giúp bạn thực hành SQL với chủ đề **Quản lý Nhân Sự**, bao gồm các bảng về nhân viên, phòng ban, lương, chấm công, cùng dữ liệu mẫu và bài tập thực hành.

---

## 2. Thiết Kế Database
Database có **5 bảng chính**:
- **Employees** (Nhân viên)
- **Departments** (Phòng ban)
- **Salaries** (Lương)
- **Attendance** (Chấm công)
- **Positions** (Chức vụ)

**Quan hệ:**
- **Departments** (1 - n) **Employees**
- **Employees** (1 - n) **Salaries**
- **Employees** (1 - n) **Attendance**
- **Positions** (1 - n) **Employees**

---

## 3. Tạo Database và Bảng
```sql
CREATE DATABASE HRM;
USE HRM;

CREATE TABLE Departments (
    DepartmentID INT PRIMARY KEY AUTO_INCREMENT,
    DepartmentName VARCHAR(100) NOT NULL
);

CREATE TABLE Positions (
    PositionID INT PRIMARY KEY AUTO_INCREMENT,
    PositionName VARCHAR(100) NOT NULL,
    SalaryGrade INT NOT NULL
);

CREATE TABLE Employees (
    EmployeeID INT PRIMARY KEY AUTO_INCREMENT,
    FullName VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Phone VARCHAR(15),
    HireDate DATE NOT NULL,
    DepartmentID INT,
    PositionID INT,
    FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID),
    FOREIGN KEY (PositionID) REFERENCES Positions(PositionID)
);

CREATE TABLE Salaries (
    SalaryID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    SalaryMonth DATE NOT NULL,
    BasicSalary DECIMAL(10,2),
    Bonus DECIMAL(10,2),
    TotalSalary DECIMAL(10,2),
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
);

CREATE TABLE Attendance (
    AttendanceID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    Date DATE NOT NULL,
    Status ENUM('Present', 'Absent', 'Late', 'On Leave') NOT NULL,
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
);
```

---

## 4. Thêm Dữ Liệu Mẫu
```sql
INSERT INTO Departments (DepartmentName) VALUES
('Phòng Kế Toán'), ('Phòng IT'), ('Phòng Nhân Sự');

INSERT INTO Positions (PositionName, SalaryGrade) VALUES
('Nhân viên', 1), ('Trưởng phòng', 2), ('Giám đốc', 3);

INSERT INTO Employees (FullName, Email, Phone, HireDate, DepartmentID, PositionID) VALUES
('Nguyễn Văn A', 'a@company.com', '0123456789', '2022-05-01', 2, 1),
('Trần Thị B', 'b@company.com', '0987654321', '2021-07-15', 1, 2),
('Lê Quốc C', 'c@company.com', '0978123456', '2020-03-10', 3, 3);

INSERT INTO Salaries (EmployeeID, SalaryMonth, BasicSalary, Bonus, TotalSalary) VALUES
(1, '2024-03-01', 10000000, 2000000, 12000000),
(2, '2024-03-01', 15000000, 500000, 15500000),
(3, '2024-03-01', 30000000, 10000000, 40000000);

INSERT INTO Attendance (EmployeeID, Date, Status) VALUES
(1, '2024-03-10', 'Present'),
(1, '2024-03-11', 'Late'),
(2, '2024-03-10', 'Absent'),
(3, '2024-03-10', 'On Leave');
```

---

## 5. Bài Tập SQL
### **Bài 1: Hiển thị danh sách nhân viên**
```sql

```

### **Bài 2: Tìm nhân viên thuộc phòng IT**
```sql

```

### **Bài 3: Tổng số nhân viên mỗi phòng ban**
```sql

```

### **Bài 4: Tính tổng lương của từng nhân viên trong tháng 3-2024**
```sql

```

### **Bài 5: Liệt kê nhân viên đi muộn**
```sql

```

### **Bài 6: Tìm phòng ban có nhiều nhân viên nhất**
```sql

```

### **Bài 7: Tìm nhân viên có mức lương cao nhất**
```sql

```

### **Bài 8: Tính tổng số ngày vắng mặt của từng nhân viên trong tháng 3-2024**
```sql

```

---

## 6. Kết luận
- **Database**: `HRM`
- **Bảng chính**: `Employees`, `Departments`, `Salaries`, `Attendance`, `Positions`
- **Bài tập**: Bao gồm các truy vấn đơn giản và nâng cao.

Bạn có thể mở rộng hệ thống bằng **Stored Procedures, Triggers** hoặc các bài tập nâng cao hơn. 🚀