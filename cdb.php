<?php
    session_start();
    if(empty($_SESSION['name'])){
        header("location: login-form.php");
    }
    if (isset($_SESSION["name"])){
        $name = $_SESSION["name"];
    }
    $pdo = new PDO("mysql:host=localhost; dbname=book_webminiproject; charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>

<?php
    $stmt = $pdo->prepare("UPDATE `ผู้ใช้บริการ` SET password=? WHERE name=?"); 
    $stmt->bindParam(1, $_POST["password"]); 
    $stmt->bindParam(2, $name);
    $stmt->execute();
    $row = $stmt->fetch();
            if($stmt->execute()){
                echo "finish " . $name . " password changed <br>";
                header( "refresh:1; url=index.php" );
            }

    
?>