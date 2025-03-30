<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "august_99_exam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($conn->connect_error) {
        die(json_encode(["success" => false, "message" => "Connection failed"]));
    }

    // Get form data
    $id = $_POST['id'];
    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];
    $category = $_POST['category'];

    // Update book in the database
    $stmt = $conn->prepare("UPDATE book_catalogs SET Title=?, ISBN=?, Author=?, Publisher=?, Year=?, Category=? WHERE id=?");
    $stmt->bind_param("ssssssi", $title, $isbn, $author, $publisher, $year, $category, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Book updated successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error updating book"]);
    }

    $stmt->close();
    $conn->close();
}
?>
