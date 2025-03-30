<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "august_99_exam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Get raw JSON input
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (isset($data['id'])) {
        $id = $data['id'];

        if ($conn->connect_error) {
            die(json_encode(["message" => "Connection failed"]));
        }

        // Delete the book
        $stmt = $conn->prepare("DELETE FROM book_catalogs WHERE id = ?");
        $stmt->bind_param("s", $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Book deleted successfully"]);
        } else {
            echo json_encode(["message" => "Error deleting book"]);
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(["message" => "Invalid request"]);
    }
}
?>
