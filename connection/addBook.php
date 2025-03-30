<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "august_99_exam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];
    $category = $_POST['category'];

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO book_catalogs (Title, ISBN, Author, Publisher, Year, Category) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $isbn, $author, $publisher, $year, $category);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Book added successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error adding book"]);
    }

    $stmt->close();
    $conn->close();
}
?>
