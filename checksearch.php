<?php
$pdo = new PDO("mysql:host=localhost; dbname=book_webminiproject; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$keyword = $_GET["keyword"];
$conn = mysqli_connect("localhost", "root", "");

if ($conn) {
    mysqli_select_db($conn, "book_webminiproject");
} else {
    echo mysql_errno();
}
$sql = "SELECT หนังสือ.bname,หนังสือ.author,หนังสือ.publisher,รายละเอียด.isbn,รายละเอียด.genre
        FROM หนังสือ
        INNER JOIN รายละเอียด ON (หนังสือ.isbn=รายละเอียด.isbn)
		WHERE หนังสือ.bname LIKE '%$keyword%'";
$objQuery = mysqli_query($conn, $sql);
?>

<?php while($row = mysqli_fetch_array($objQuery)): ?>
<?php echo $row["bname"]?><br>
<?php endwhile;?>
</table>