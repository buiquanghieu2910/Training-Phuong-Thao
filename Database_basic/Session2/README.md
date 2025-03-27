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
SELECT * FROM Employees;
```

### **Bài 2: Tìm nhân viên thuộc phòng IT**
```sql
SELECT e
FROM Employees e
JOIN Departments d ON e.DepartmentID = d.DepartmentID
WHERE d.DepartmentName = 'Phòng IT';
```

### **Bài 3: Tổng số nhân viên mỗi phòng ban**
```sql
SELECT d.DepartmentName, COUNT(e.EmployeeID) AS TotalEmployees
FROM Departments d
LEFT JOIN Employees e ON d.DepartmentID = e.DepartmentID
GROUP BY d.DepartmentName;
```

### **Bài 4: Tính tổng lương của từng nhân viên trong tháng 3-2024**
```sql
SELECT e.FullName, SUM(s.TotalSalary) AS TotalSalaryInMarch
FROM Salaries s
         JOIN Employees e ON s.EmployeeID = e.EmployeeID
WHERE MONTH(s.SalaryMonth) = 3
  AND YEAR(s.SalaryMonth) = 2024
GROUP BY e.FullName;
```

### **Bài 5: Liệt kê nhân viên đi muộn**
```sql
SELECT e.FullName, a.Date
FROM Attendance a
JOIN Employees e ON a.EmployeeID = e.EmployeeID
WHERE a.Status = 'Late';
```

### **Bài 6: Tìm phòng ban có nhiều nhân viên nhất**
```sql
# Cơ bản
SELECT d.DepartmentName, COUNT(e.EmployeeID) AS TotalEmployees
FROM Departments d
JOIN Employees e ON d.DepartmentID = e.DepartmentID
GROUP BY d.DepartmentName
ORDER BY TotalEmployees DESC
LIMIT 1;


# Nâng cao
select d.DepartmentID, d.DepartmentName, count(e.EmployeeID) as TotalEmployees
from Departments d
         join Employees e on d.DepartmentID = e.DepartmentID
group by d.DepartmentID, d.DepartmentName
having TotalEmployees = (select max(TotalEmployees)
                         from (select d.DepartmentID, count(e.EmployeeID) as TotalEmployees
                               from Departments d
                                        join Employees e on d.DepartmentID = e.DepartmentID
                               group by d.DepartmentID) as sub);
```

### **Bài 7: Tìm nhân viên có mức lương cao nhất**
```sql
# Cơ bản
SELECT e.FullName, s.TotalSalary 
FROM Salaries s
JOIN Employees e ON s.EmployeeID = e.EmployeeID
ORDER BY s.TotalSalary DESC
LIMIT 1;


# Nâng cao
SELECT DISTINCT e.EmployeeID, e.FullName, s.TotalSalary
FROM Employees e
         JOIN Salaries s ON e.EmployeeID = s.EmployeeID
WHERE s.TotalSalary = (SELECT MAX(TotalSalary) FROM Salaries);
```

### **Bài 8: Tính tổng số ngày vắng mặt của từng nhân viên trong tháng 3-2024**
```sql
# Cách 1 lọc theo Year() và Month()
SELECT e.EmployeeID, e.FullName, count(a.AttendanceID) AS DaysAbsent
FROM Employees e
         JOIN Attendance a ON e.EmployeeID = a.EmployeeID
WHERE a.Status = 'Absent'
  AND YEAR(a.Date) = 2024
  AND MONTH(a.Date) = 3
GROUP BY e.EmployeeID, e.FullName;


# Cách 2 dùng BETWEEN
SELECT e.EmployeeID, e.FullName, count(a.AttendanceID) AS DaysAbsent
FROM Employees e
         JOIN Attendance a ON e.EmployeeID = a.EmployeeID
WHERE a.Status = 'Absent'
  AND a.Date BETWEEN '2024-03-01' AND '2024-03-31'
GROUP BY e.EmployeeID, e.FullName;


# Cách 3 dùng >= và <=
SELECT e.EmployeeID, e.FullName, count(a.AttendanceID) AS DaysAbsent
FROM Employees e
         JOIN Attendance a ON e.EmployeeID = a.EmployeeID
WHERE a.Status = 'Absent'
  AND a.Date >= '2024-03-01' AND a.Date <= '2024-03-31'
GROUP BY e.EmployeeID, e.FullName;
```

### **Bài 9: Tìm nhân viên có mức lương cao nhất trong mỗi phòng ban**

```sql
SELECT e.FullName, d.DepartmentName, s.TotalSalary
FROM Employees e
         JOIN Departments d ON e.DepartmentID = d.DepartmentID
         JOIN Salaries s ON e.EmployeeID = s.EmployeeID
WHERE s.TotalSalary = (SELECT MAX(s2.TotalSalary)
                       FROM Salaries s2
                                JOIN Employees e2 ON s2.EmployeeID = e2.EmployeeID
                       WHERE e2.DepartmentID = e.DepartmentID)
GROUP BY e.FullName, d.DepartmentName, s.TotalSalary;
```

### **Bài 10: Tìm phòng ban có tổng lương cao nhất**

```sql
SELECT d.DepartmentName, SUM(s.TotalSalary) AS TotalSalaryInDepartment
FROM Departments d
         JOIN Employees e ON d.DepartmentID = e.DepartmentID
         JOIN Salaries s ON e.EmployeeID = s.EmployeeID
GROUP BY d.DepartmentName
ORDER BY TotalSalaryInDepartment DESC
LIMIT 1;
```

### **Bài 11: Tìm nhân viên có thời gian làm việc lâu nhất trong công ty**

```sql
SELECT e.FullName, DATEDIFF(CURRENT_DATE, e.HireDate) AS YearsWorked
FROM Employees e
ORDER BY YearsWorked DESC
LIMIT 1;
```

### **Bài 12: Tính tổng số ngày nghỉ phép của từng nhân viên**

```sql
SELECT e.EmployeeID, e.FullName, SUM(CASE WHEN a.Status = 'On Leave' THEN 1 ELSE 0 END) AS DaysOnLeave
FROM Employees e
         JOIN Attendance a ON e.EmployeeID = a.EmployeeID
GROUP BY e.EmployeeID, e.FullName;
```

### **Bài 13: Tìm những nhân viên chưa nhận lương trong tháng 3-2024**

```sql
SELECT e.FullName, s.*
FROM Employees e
         LEFT JOIN Salaries s ON e.EmployeeID = s.EmployeeID
                                     AND YEAR(s.SalaryMonth) = 2024
                                     AND MONTH(s.SalaryMonth) = 3
WHERE s.SalaryID IS NULL;
```

### **Bài 14: Tính số ngày làm việc của nhân viên trong tháng 3-2024**

```sql
SELECT e.EmployeeID, e.FullName, COUNT(a.AttendanceID) AS DaysWorked
FROM Employees e
         JOIN Attendance a ON e.EmployeeID = a.EmployeeID
WHERE a.Status = 'Present'
  AND YEAR(a.Date) = 2024
  AND MONTH(a.Date) = 3
GROUP BY e.EmployeeID, e.FullName;
```

### **Bài 15: Tính tổng số lương của nhân viên theo từng chức vụ trong tháng 3-2024**

```sql
SELECT p.PositionName, SUM(s.TotalSalary) AS TotalSalary
FROM Employees e
         JOIN Salaries s ON e.EmployeeID = s.EmployeeID
         JOIN Positions p ON e.PositionID = p.PositionID
WHERE YEAR(s.SalaryMonth) = 2024
  AND MONTH(s.SalaryMonth) = 3
GROUP BY p.PositionName
ORDER BY TotalSalary DESC;
```

---

## 6. Kết luận
- **Database**: `HRM`
- **Bảng chính**: `Employees`, `Departments`, `Salaries`, `Attendance`, `Positions`
- **Bài tập**: Bao gồm các truy vấn đơn giản và nâng cao.

Bạn có thể mở rộng hệ thống bằng **Stored Procedures, Triggers** hoặc các bài tập nâng cao hơn. 🚀