<?php
session_start();
?>
</!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
</head>
<body>
		

<table  align="center" style="border-collapse: collapse;
  border: 1px solid black; width: 70%">
  <?php
	include '_include/connect.php';
	$id = $_GET['id'];
	$usemail = $_SESSION['email'];
	$query = mysqli_query($con, "SELECT * FROM payment WHERE email= '$usemail' and prod_ids = '$id'");
	$row = mysqli_fetch_array($query);
	?>
	<tr>
		<th align="center">OLATINWO SUPERMARKET.</th>
	</tr>
	<tr>
		<td align="center">Deals with all kinds of Food stores<br> Offa Kwara State.<br>Tel: 0806462234, 09053460280.<br><br>
			<span style="background-color: blue; color: white; border: 2px solid red; padding: 4px; padding-left: 30px; padding-right: 30px; margin: 20px; border-top-left-radius: 20px; border-bottom-right-radius: 20px;">Receipt</span><br>

		</td>
	</tr>
	<tr>
		<td>
			Date: <?php echo  $row['cdate']; ?>
		</td>
	</tr>
	<tr>
		<td>
			Email: <?php echo  $row['email']; ?>
		</td>
	</tr>
	<!-- <tr>
		<td>
			Address: <?php echo  $row['address']; ?>
		</td> -->
	</tr>
	<tr align="center">
		<table align="center" border="1" style="border-collapse: collapse;
  border: 2px solid black; width: 70%">
			<tr>
				<th>QTY</th>
				<th>DESCRIPTION OF GOODS</th>
				<th>PRICE</th>
				<th>AMOUNT</th>
			</tr>
			<?php
include '_include/connect.php';
$id = $_GET['id'];
// echo $id;
$usemail = $_SESSION['email'];
$sql1 = "SELECT * FROM Product_history WHERE email= '$usemail' and prod_ids = '$id'";
$query1 = mysqli_query($con, $sql1);
while($row1 = mysqli_fetch_array($query1)){
	?>
	<tr align="center">
				<td><?php echo  $row1['qty']; ?></td>
				<td><?php echo  $row1['p_title']; ?></td>
				<td><?php echo  $row1['p_price']; ?></td>
				<td><?php echo  $row1['total']; ?></td>
			</tr>
	<?php

}
?>
<tr >

				<td colspan="3" align="right">Total</td>
				<td align="center"><?php echo  $row['total']; ?></td>
			</tr>
			<tr>
				<td colspan="3">
					<table>
				<tr>
				<td>Test goods at the point of collection</td>
				
			</tr>
			<tr>
			<td>Goods bought in good condition are not returnable</td>	
			</tr>
			</table>
			</td>
			<td>Signed<br>Manager</td>
		</table>
		<button onclick="printe();">Print</button>
		<button><a href="dashboard.php">Home</a></button>
</table>

<script>
        function printe() {
            window.print();
        }
    </script>
    

</body>
</html>