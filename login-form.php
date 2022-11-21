<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงชื่อเข้าใช้</title>

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="stylelogin.css">
</head>

<body>

    <div class="header">
        <h2>ลงชื่อเข้าใช้</h2>
    </div>

    <form action="check-login.php" method="POST">
        <div class="input-group">
            <label for="email">อีเมล</label>
            <input type="email" name="email" placeholder="someone@example.com" pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                id="email" required>
        </div>
        <div class="input-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" name="password" placeholder="รหัสผ่าน" id="password" required>
        </div>
        <div class="input-group">
            <button type="submit" name="Login" class="btn">เข้าสู่ระบบ</button>
        </div>
        <p>ยังไม่ได้เป็นสมาชิกใช่ไหม? <a href="register.php">สมัครสมาชิก</a>
        </p><a href="c.php">เปลี่ยนรหัส</a>
        <a href="index.php">กลับหน้าหลัก</a>
    </form>

</body>

</html>