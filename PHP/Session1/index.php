<?php
$name = $_GET['name'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PHP</title>
</head>

<body>
    <h1>Chào mừng đến với PHP</h1>
    <p>Hãy nhập tên của bạn vào ô dưới đây:</p>

    <form action="" method="GET">
        <input type="text" name="name" id="name" required>
        <input type="password" name="password" id="password" required>
        <button type="submit">Gửi</button>
    </form>

    <h2>Xin chào, <?php echo $name; ?></h2>
</body>

</html>