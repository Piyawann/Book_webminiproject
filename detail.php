<?php 
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['name']);
        header('location: login/login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>นกก้นเหลือง</title>
    <link rel="icon" href="image/martin2.png" type="image/gif">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> -->

    <link rel="stylesheet" href="css/style.css">
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
    <!-- header section starts  -->
    <?php 
	$pdo = new PDO("mysql:host=localhost;dbname=book_webminiproject; charset=utf8", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 	
    ?>

    <div class="wrapper">
        <!-- <img src="#" alt=""> -->
        <div class="content">
            <header>Cookies Consent</header>
            <p>This website use cookies to ensure you get the best experience on our website.</p>
            <div class="buttons">
                <button class="item">I understand</button>
                <a href="#" class="item">Learn more</a>
            </div>
        </div>
    </div>

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
            <a href="login/login.php">
                <div class="fas fa-user" id="login-btn"></div>
            </a>
        </div>

        <form action="navsearch.php" class="search-form" method="GET">
            <input type="text" id="keyword" onkeyup="send()">
            <button for="search-box" class="fas fa-search"></button>
        </form>

        <!-- <div class="shopping-cart">
            <div class="box">

            </div>

            <div class="total"> total : </div>
            <a href="#" class="btn">checkout</a>
        </div>
        <div class="shopping-cart">
            <div class="box">

            </div>
            <div class="total"> total : </div>
            <a href="#" class="btn">checkout</a>
        </div> -->
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
            <a href="index.php?logout='1'" style="color: #204d8e;" class="btnn">ลงชื่อออก</a></button>
        <?php endif ?>
    </header>
    <!-- /*ค้นหา*/ -->
    <div id="result"></div>

    <?php
        $stmt = $pdo->prepare("SELECT * FROM `หนังสือ` WHERE isbn = ?");
        $stmt->bindParam(1, $_GET["isbn"]);
        $stmt->execute();
        $row = $stmt->fetch();
        ?>
    <style>
    article {
        display: flex;
        margin: 150px 80px;
    }

    div {
        text-align: center;
    }

    .detail span,
    h1 {
        margin-left: 20rem;
        font-size: 2.5rem;

    }

    div>span {
        font-size: 2.5rem;
        background-color: #F6E8B1;
        display: block;
        text-align: left;
        margin-block-start: 0px;
        margin-block-end: 0px;
        margin-inline-start: 10px;
        margin-inline-end: 10px;
    }
    </style>
    <section class="features" id="features">
        <article class="detail">
            <img src="book/<?=$row["isbn"]?>.jpg" width="400" hight="250" alt="">
            <div>
                <h1><?=$row["bname"]?></h1>
                <span>สำนักพิมพ์ : <?=$row["publisher"]?> </span>
                <span>ผู้เเต่ง: <?=$row["author"]?> </span>
                <span>ราคา : <?=$row["price"]?></span>
                <span>เลขประจำหนังสือ : <?=$row["isbn"]?></span>
                <div calss="bkdetail">
                    <a href="bookdetail.php?isbn=<?=$row["isbn"]?>" class="btn">Read more</a>

                </div>
            </div>
        </article>
    </section>

    <section class="footer">
        <div class="box-container">
            <p>ติดต่อเรา<br>
                <a href="location.php">
                    <font color="white">ที่ตั้งห้องสมุดประชาชนสังกัดกรุงเทพมหานคร</font>
                </a><br>
                <a href="https://www.gmail.com/">
                    <font color="white">birdyellow@gmail.com</font>
                </a><br>


                <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
                <a href="https://twitter.com/" class="fa fa-twitter"></a>
                <a href="https://www.instagram.com/accounts/login/" class="fa fa-instagram"></a>
            </p>
        </div>

    </section>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>