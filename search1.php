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
    <meta charset="utf-8">
    <script>
    function send() {
        request = new XMLHttpRequest();
        request.onreadystatechange = showResult;
        var keyword = document.getElementById("keyword").value;
        var url = "checksearch.php?keyword=" + keyword;
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
        <a href="http://localhost/book_webminiproject/top/book.php">
            <img alt="หน้าหลัก" class="logo" src="image/martin2.png"></a>

        <nav class="navbar">
            <a href="http://localhost/projectbook/index.php">หน้าหลัก</a>
            <a href="http://localhost/projectbook/index.php#features">คุณอาจชอบ</a>
            <a href="http://localhost/projectbook/lovecom.php">เลิฟคอมเมดี้</a>
            <a href="http://localhost/projectbook/fantasy.php">แฟนตาซี</a>
            <a href="http://localhost/projectbook/detective.php">สายลับ-สืบสวน</a>
            <a href="http://localhost/projectbook/action.php">แอคชั่น-ผจญภัย</a>
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
            <input type="search" id="search-box" name="keyword" placeholder="search..">
            <button for="search-box" class="fas fa-search"></button>
        </form></a>

        <div class="shopping-cart">
            <div class="box">

            </div>
            <div class="total"> total : </div>
            <a href="#" class="btn">checkout</a>
        </div>

    </header>

    <?php
	$pdo = new PDO("mysql:host=localhost;dbname=book_webminiproject; charset=utf8", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
// 	$stmt = $pdo->prepare("SELECT หนังสือ.bname,หนังสือ.author,หนังสือ.publisher,รายละเอียด.isbn,รายละเอียด.genre
//         FROM หนังสือ
//         INNER JOIN รายละเอียด ON (หนังสือ.isbn=รายละเอียด.isbn)
// 		WHERE หนังสือ.bname LIKE ?");
// 	if(!empty($_GET))
// 		$value = '%'.$_GET["keyword"].'%';
// 	$stmt->bindParam(1, $value);		
// 	$stmt->execute();
// ?>
<form>
        <input type="text" id="keyword" onkeyup="send()">
        <div id="result"></div>
</form>
        <section class="features" id="features">
            <h1 class="heading"></h1>
            <div class="box-container">
                <?php while ($row = $stmt->fetch()) :?>
                <div class="box">
                    <img src='book/<?=$row["isbn"]?>.jpg' width='100'><br>
                    <h3>ชื่อหนังสือ : <?=$row ["bname"]?><br></h3>
                    <p>ผู้แต่ง : <?=$row ["author"]?><br></p>
                    <p>หมวดหมู่ : <?=$row ["genre"]?><br></p>
                    <a href="detail.php?isbn=<?=$row["isbn"]?>" class="btn">read more</a>
                </div><?php endwhile; ?>

        </section>

        <section class="footer">

            <div class="box-container">
                <p>ติดต่อเรา<br>
                    <a href="https://www.gmail.com/">birdyellow@gmail.com </a> <br>
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