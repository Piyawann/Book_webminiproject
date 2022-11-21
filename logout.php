<?php
	session_start();
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
	session_destroy(); // ทำลาย session
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงชื่อออก</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylelogin.css">
</head>

<body>
    <div class="header">
        <h2>ลงชื่อออก</h2>
    </div>
    <form action="check-login.php" method="POST">
        <div class="input-group">
            <p>ออกจากระบบสำเร็จแล้ว<br>
                หากต้องการเข้าสู่ระบบอีกครั้งโปรดคลิก
                <a href='login-form.php'>เข้าสู่ระบบ</a><br>
                <a href="index.php">กลับหน้าหลัก</a>
            </p>
        </div>

    </form>

</body>

</html>