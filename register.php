<?php 
    include('connect.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylelogin.css">
   
</head>

<body>

    <div class="header">
        <h2>สมัครสมาชิก</h2>
    </div>

    <form action="register2.php" method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <h3>
                <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
            </h3>
        </div>
        <?php endif ?>
        <div class="input-group">
            <label for="name">ชื่อ-สกุล*</label>
            <input type="text" name="name" placeholder="ชื่อ-สกุล" id="name" required>
        </div>
        <div class="input-group">
            <label for="idcard">เลขบัตรประชาชน*</label>
            <input type="varchar" name="idcard" placeholder="xxxxxxxxxxxxx" id="idcard" required>
        </div>
        <div class="input-group">
            <label for="email">อีเมล*</label>
            <input type="email" name="email" placeholder="someone@example.com" id="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" required>
        </div>
        <div class="input-group">
            <label for="mobile">เบอร์มือถือ*</label>
            <input type="tel" name="mobile" placeholder="0xxxxxxxxx" id="mobile" pattern="[0][6,8,9]{1}[0-9]{8}" required>
        </div>
        <div class="input-group">
            <label for="password">รหัสผ่าน*</label>
            <input type="password" name="password" placeholder="รหัสผ่าน" id="password" required>
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">ยืนยัน</button>
        </div>
        <p>มีบัญชีแล้วใช่ไหม? <a href="login-form.php">เข้าสู่ระบบ</a></p>
        <a href="index.php">กลับหน้าหลัก</a>

    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script src="registerscript.js"></script> -->

</body>

</html>