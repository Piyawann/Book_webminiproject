<?php
	$pdo = new PDO("mysql:host=localhost;dbname=book_webminiproject; charset=utf8", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = $pdo->prepare("INSERT INTO ผู้ใช้บริการ VALUES (?, ?, ?, ?, ?)");
	$stmt->bindParam(3, $_POST["name"]);
	$stmt->bindParam(1, $_POST["idcard"]);	
    $stmt->bindParam(5, $_POST["email"]);
	$stmt->bindParam(4, $_POST["mobile"]);
	$stmt->bindParam(2, $_POST["password"]);
	
    $name = $pdo->lastInsertId(); 	

	if($stmt->execute())
	// window.location.href = "../index.php";
		// header("location:../index.php"); 

    // echo "เพิ่มสมาชิกสำเร็จ";

?>

<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
<div class="header">
    </div>
    <form>
        <div class="input-group">
            <?php
    	echo "เพิ่มสมาชิกสำเร็จ";
		header("location: login-form.php"); 
    ?>
        </div>
    </form>
</body>

</html>