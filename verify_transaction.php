<?php
include '_include/connect.php';

// Ensure a user is logged in
session_start();
if (!isset($_SESSION['email'])) {
    die('User not logged in.');
}

// Get payment reference and total from query parameters
$reference = $_GET['reference'];
$total = $_GET['total'];
$prod_ids = $_GET['prod_ids'];

// Verify the payment with Paystack API
$secret_key = 'sk_test_5eade4593e521df8f29649cdec437d198dbaeca4';
$verify_url = "https://api.paystack.co/transaction/verify/{$reference}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $verify_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $secret_key",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
$response_data = json_decode($response, true);
curl_close($ch);

if ($response_data['status'] == 'success') {
    $payment_status = $response_data['data']['status'];
    if ($payment_status == 'success') {
        $reference = $response_data['data']['reference'];
        $channel = $response_data['data']['channel'];
        $ip_address = $response_data['data']['ip_address'];
        $email = $response_data['data']['customer']['email'];
        $amount = $response_data['data']['amount'];
        // Payment was successful, insert data into product_history
        // $email = $_SESSION['email'];

        // Start transaction
        mysqli_begin_transaction($con);

        try {
            // Fetch all products for the logged-in user
            $query = mysqli_query($con, "SELECT * FROM product_details WHERE email = '{$_SESSION['email']}' AND status = '0'");
            while ($row = mysqli_fetch_array($query)) {
                $cdate = mysqli_real_escape_string($con, $row['cdate']);
                $img = mysqli_real_escape_string($con, $row['img']);
                $p_title = mysqli_real_escape_string($con, $row['p_title']);
                $qty = mysqli_real_escape_string($con, $row['qty']);
                $p_price = mysqli_real_escape_string($con, $row['p_price']);
                $ptotal = mysqli_real_escape_string($con, $row['total']);

                $insert_query = "INSERT INTO product_history (email, cdate, img, p_title, qty, p_price, total, prod_ids) VALUES ('$email', '$cdate', '$img', '$p_title', '$qty', '$p_price', '$ptotal', '$prod_ids')";
                if (!mysqli_query($con, $insert_query)) {
                    throw new Exception('Error inserting data into product_history: ' . mysqli_error($con));
                }
            }

            
            $payment_query = "INSERT INTO payment (cdate, prod_ids, total, channel, ip_address, email) VALUES ('$cdate', '$prod_ids', '$total', '$channel', '$ip_address', '$email')";
            if (!mysqli_query($con, $payment_query)) {
                throw new Exception('Error Inserting Payment: ' . mysqli_error($con));
            }

            $update_query = "UPDATE product_details SET status = '1' WHERE email = '{$_SESSION['email']}' AND status = '0'";
            if (!mysqli_query($con, $update_query)) {
                throw new Exception('Error updating product_details: ' . mysqli_error($con));
            }

            // Commit the transaction
            mysqli_commit($con);

            echo "<script>alert('Payment Made Successful ✔✔✔'); window.location='producthist.php'; </script>";
        } catch (Exception $e) {
            // Rollback transaction if an error occurs
            mysqli_rollback($con);
            echo "Failed to process payment: " . $e->getMessage();
        }

        // Close connection
        mysqli_close($con);
    } else {
        echo "Payment was not successful.";
    }
} else {
    echo "Payment verification failed.";
}
?>
