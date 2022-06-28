<?php 
include '../conn.php';

$method = $_POST['method'];
if ($method == 'fetch_po') {
	$po = $_POST['po'];
	$customer_code = $_POST['customer_code'];
	$c = 0;

	$query = "SELECT * FROM pss_po_details,pss_stocks WHERE pss_po_details.parts_name = pss_stocks.parts_name AND pss_po_details.customer_code LIKE '$customer_code%' AND pss_po_details.parts_name LIKE '$parts_name%' AND pss_po_details.Status = 'Pending' GROUP BY pss_po_details.parts_name";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach ($stmt->fetchALL() as $j) {
			$c++;

				echo '<tr>';
					echo '<td>'.$c.'</td>';
					echo '<td>'.$j['po_num'].'</td>';
					echo '<td>'.$j['parts_code'].'</td>';
					echo '<td>'.$j['parts_name'].'</td>';
					echo '<td>'.$j['description'].'</td>';
					echo '<td>'.$j['supplier_code'].'</td>';
					echo '<td>'.$j['customer_code'].'</td>';
					echo '<td>'.$j['quantity'].'</td>';
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