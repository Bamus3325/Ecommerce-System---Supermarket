<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];
    $prod_ids = $_POST['prod_ids'];    
    $rating = $_POST['rating'];
    $description = $_POST['description'];
    $email = $_SESSION['email'];
    
    // Database connection (assuming $con is your connection variable)
    include '_include/connect.php';
    
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    
    // Use 'siss' as the format string where 's' stands for string and 'i' stands for integer
    $stmt = $con->prepare("INSERT INTO rate (prod_id, email, pay_id, rating, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isiss", $prod_ids, $email, $userId, $rating, $description);
    
    if ($stmt->execute()) {
        echo "<script> alert('Rating submitted successfully!'); window.location='producthist.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $con->close();
}
?>
