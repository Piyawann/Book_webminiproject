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

    <link rel="stylesheet" href="css/style.css">

    <script>
    async function getDataFromAPI() {
        let response = await fetch(
            'https://data.go.th/dataset/e4bbc44c-0102-4f5f-8f8a-a37c71497f49/resource/7b21fad9-0c26-46c1-b619-ee1884db9839/download/bma_library.json'
        )
        let rawData = await response.text()
        let objectData = JSON.parse(rawData)
        let result = document.getElementById('resultt')

        for (let i = 0; i < objectData.features.length; i++) {
            let content = objectData.features[i].properties.name + '<br> ที่อยู่ : ' +
                objectData.features[i].properties.location + '<br> เบอร์ติดต่อ ' + objectData.features[i].properties
                .tel

            let li = document.createElement('li')
            li.innerHTML = content
            result.appendChild(li)
        }
    }
    getDataFromAPI()
    </script>
</head>

<body>
    <?php 
	$pdo = new PDO("mysql:host=localhost;dbname=book_webminiproject; charset=utf8", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 	
    ?>

    <div class="wrapper">
        <!-- <img src="#" alt=""> -->
        <div class="content">
            <header>คุกกี้คุกกี้</header>
            <p>เว็บไซต์นี้ต้องใช้คุกกี้กดยอมรับคุกกี้เถิดจ้า</p>
            <div class="buttons">
                <button class="item">ยอมรับ</button>
                <a href="https://tips.thaiware.com/1549.html" class="item">อ่านเพิ่มเติม</a>
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

    <div id="result"></div>

    <section class="home" id="home">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="image/banner1.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="image/banner2.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="image/banner3.png" style="width:100%">
            </div>
        </div>
    </section>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <style>
    #index {
        font-size: 2rem;
        background-color: #F6E8B1;
        display: block;
        text-align: left;
        margin-block-start: 20px;
        margin-block-end: 20px;
        margin-inline-start: 10px;
        margin-inline-end: 10px;
    }
    </style>

    <section class="features" id="index">
        <p>ที่ตั้งห้องสมุดประชาชนสังกัดกรุงเทพมหานคร</p><br>
        <ol id="resultt"></ol>
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