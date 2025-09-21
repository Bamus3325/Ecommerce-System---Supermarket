<?php
$id = $_GET['id'];
include '_include/connect.php';
$query = mysqli_query( $con, "DELETE FROM product_details WHERE id = '$id'" );
if ($query == TRUE) {
    echo "<script>alert('Product Deleted Successful ✔✔✔'); window.location='cart.php'; </script>";
}else {
    echo "<script>alert('Product Not Deleted Successful'); </script>";

}
?>

