<?php 
include '../conn.php';
$method = $_POST['method'];

if ($method == 'fetch_unit') {
	$parts_name = $_POST['parts_name'];
	$supplier_code = $_POST['supplier_code'];
	$customer_code = $_POST['customer_code'];
	$c = 0;

	$query = "SELECT parts_code,parts_name,supplier_code,remaining_stck,unit,customer_unit_price, date_registered, customer_code, date_updated FROM pss_stocks WHERE parts_name LIKE '$parts_name%' AND supplier_code LIKE '$supplier_code%' AND customer_code LIKE '$customer_code%' AND customer_unit_price != ''";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			
				echo '<tr>';
					echo '<td>'.$c.'</td>';
					echo '<td>'.$j['parts_code'].'</td>';
					echo '<td>'.$j['parts_name'].'</td>';
					echo '<td>'.$j['customer_code'].'</td>';
					echo '<td>'.$j['supplier_code'].'</td>';
					echo '<td>'.$j['unit'].'</td>';
					echo '<td>'.$j['customer_unit_price'].'</td>';
					echo '<td>'.$j['date_registered'].'</td>';
					echo '<td>'.$j['date_updated'].'</td>';
				echo '</tr>';
		}
	}else{
		echo '<tr>';
			echo '<td colspan = "11" style="color:red;">No Result!</td>';
		echo '</tr>';
	}

}

$conn = NULL;
?>