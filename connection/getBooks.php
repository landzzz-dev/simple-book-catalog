<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "august_99_exam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM book_catalogs";
$result = $conn->query($sql);

$books = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

$conn->close();

return $books;
?>
