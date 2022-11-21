<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>นกก้นเหลือง</title>
    <link rel="icon" href="image/martin2.png" type="image/gif">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    <!-- header section starts  -->
    <?php 
	$pdo = new PDO("mysql:host=localhost;dbname=book_webminiproject; charset=utf8", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 	
    ?>

    <header class="header">
        <a href="index.php">
            <img alt="หน้าหลัก" class="logo" src="image/martin2.png">
        </a>
    </header>
</head>

<style>
.features {
    text-align: center;
}
</style>

<?php
        $stmt = $pdo->prepare("SELECT * FROM `หนังสือ` WHERE isbn = ?");
        $stmt->bindParam(1, $_GET["isbn"]);
        $stmt->execute();
        $row = $stmt->fetch();
?>

<body>
    <section class="features" id="features">
        <article class="detail">
            <br><br><br>
            <br><br><br>
            <img src="book/<?=$row["isbn"]?>.jpg" width="350" hight="250" alt="">
            <div>
                <h2><?=$row["bname"]?></h2>
                <br><br><br>
                <span> <?=$row["detailbook"]?> </span>
                <br><br><br>
            </div>
        </article>
        <a href="detail.php?isbn=<?=$row["isbn"]?>" class="btn">Back</a>
    </section>
</body>

</html>