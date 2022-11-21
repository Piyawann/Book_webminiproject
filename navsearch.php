<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>นกก้นเหลือง</title>
    <link rel="icon" href="image/martin2.png" type="image/gif">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    ////ค้นหา/////
    <script>
    function send() {
        request = new XMLHttpRequest();
        request.onreadystatechange = showResult;
        var keyword = document.getElementById("keyword").value;
        var url = "navsearch.php?keyword=" + keyword;
        request.open("GET", url, true);
        request.send(null);
    }

    function showResult() {
        if (request.readyState == 4) {
            if (request.status == 200)
                document.getElementById("result").innerHTML = request.responseText;
        }
    }
    </script>
</head>

<body>
    <?php
	$pdo = new PDO("mysql:host=localhost;dbname=book_webminiproject; charset=utf8", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 	
    ?>

    <header class="header">
        <a href="index.php">
            <img alt="หน้าหลัก" class="logo" src="image/martin2.png">
        </a>

        <nav class="navbar">
            <a href="index.php#index">หน้าหลัก</a>
            <a href="index.php#features">คุณอาจชอบ</a>
            <a href="lovecom.php">เลิฟคอมเมดี้</a>
            <a href="fantasy.php">แฟนตาซี</a>
            <a href="detective.php">สายลับ-สืบสวน</a>
            <a href="action.php">แอคชั่น-ผจญภัย</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <a href="login.php">
                <div class="fas fa-user" id="login-btn"></div>
            </a>
        </div>

        <form action="navsearch.php" class="search-form" method="GET">
            <input type="search" id="search-box" name="keyword" placeholder="search..">
            <button for="search-box" class="fas fa-search"></button>
        </form></a>

        <!-- <div class="shopping-cart">
            <div class="box">

            </div>
            <div class="total"> total : </div>
            <a href="#" class="btn">checkout</a>
        </div> -->
        <div class="homecontent">
            <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>

            <?php endif ?>

            <?php if (isset($_SESSION['name'])) : ?>
            <a class="navbar">สวัสดี<strong><?php echo $_SESSION['name']; ?></strong></a>
            <button type="button" onclick="alert('<?php echo $_SESSION['name']; ?> จะลงชื่อออกใช่หรือไม่')">
                <a href="logout.php" style="color: #204d8e;" class="btnn">ลงชื่อออก</a></button>
            <?php endif ?>
        </div>
    </header>
    <!-- /*ค้นหา*/ -->
    <div id="result"></div>
    <?php
	$pdo = new PDO("mysql:host=localhost;dbname=book_webminiproject; charset=utf8", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	$stmt = $pdo->prepare("SELECT หนังสือ.bname,หนังสือ.author,หนังสือ.publisher,รายละเอียด.isbn,รายละเอียด.genre
        FROM หนังสือ
        INNER JOIN รายละเอียด ON (หนังสือ.isbn=รายละเอียด.isbn)
		WHERE หนังสือ.bname LIKE ?");
	if(!empty($_GET))
		$value = '%'.$_GET["keyword"].'%';
	$stmt->bindParam(1, $value);		
	$stmt->execute();
?>
    <br><br>
    <section class="features" id="features">
        <h1 class="heading"></h1>
        <div class="box-container">
            <?php while ($row = $stmt->fetch()) :?>
            <div class="box">
                <img src='book/<?=$row["isbn"]?>.jpg' width='100'><br>
                <h3><?=$row ["bname"]?><br></h3>
                <p>ผู้แต่ง : <?=$row ["author"]?><br></p>
                <p>หมวดหมู่ : <?=$row ["genre"]?><br></p>
                <a href="detail.php?isbn=<?=$row["isbn"]?>" class="btn">read more</a>
            </div><?php endwhile; ?>

    </section>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>