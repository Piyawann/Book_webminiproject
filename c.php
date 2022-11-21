<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="stylelogin.css">
</head>

<body>
    <div class="header">
        <h2>เปลี่ยนรหัส</h2>
    </div>

    <form action="cdb.php" method="POST">
        <div class="input-group">
            <div>
                username <input type="text" name="name">
                <label>Old Password</label><input type="text" name="Opass" required><br>
            </div>

            <div><label>New Password</label><input name="password" id="password" type="password" required
                    pattern="[a-zA-Z0-9]{8,20}" /><br></div>
            <div> <span id='message'></span><br> </div>
        </div>
        <input type="submit" href="/">

        <p>ยังไม่ได้เป็นสมาชิกใช่ไหม? <a href="register.php">สมัครสมาชิก</a></p><a href="c.php">เปลี่ยนรหัส</a>
        <a href="index.php">กลับหน้าหลัก</a>

    </form>

</body>

</html>