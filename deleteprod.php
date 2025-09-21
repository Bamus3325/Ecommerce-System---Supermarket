<?php
$id = $_GET['id'];
include '_include/connect.php';
$query = mysqli_query( $con, "DELETE FROM products WHERE id = '$id'" );
if ($query == TRUE) {
    echo "<script>alert('Product Deleted Successful ✔✔✔'); window.location='view_prod.php'; </script>";
}else {
    echo "<script>alert('Product Not Deleted Successful'); </script>";

}
?>

