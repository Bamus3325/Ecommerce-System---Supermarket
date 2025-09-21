<?php
$id = $_GET['id'];
include '_include/connect.php';
$query = mysqli_query( $con, "DELETE FROM payment WHERE id = '$id'" );
if ($query == TRUE) {
    echo "<script>alert('Product Deleted Successful ✔✔✔'); window.location='producthists.php'; </script>";
}else {
    echo "<script>alert('Product Not Deleted Successful'); </script>";

}
?>

