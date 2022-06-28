<?php 
include '../conn.php';
$method = $_POST['method'];

if ($method == 'fetch_stocks') {
	$parts_name = $_POST['parts_name'];
	$supplier_code = $_POST['supplier_code'];
	$customer_code = $_POST['customer_code'];
	$c = 0;

	$query = "SELECT * FROM pss_stocks WHERE parts_name LIKE '$parts_name%' AND supplier_code LIKE '$supplier_code%' AND customer_code LIKE '$customer_code%' GROUP BY parts_name";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$try = $j['remaining_stck'];
			$c++;

			if ($try == 0) {
				echo '<tr >';
					echo '<td>'.$c.'</td>';
					echo '<td>'.$j['parts_code'].'</td>';
					echo '<td style="cursor:pointer; color:red;" class="modal-trigger" data-toggle="modal" data-target="#update_stock" onclick="get_stock(&quot;'.$j['id'].'~!~'.$j['parts_code'].'~!~'.$j['parts_name'].'~!~'.$j['supplier_code'].'~!~'.$j['description'].'~!~'.$j['qty_per_box'].'~!~'.$j['net'].'~!~'.$j['box_weight'].'~!~'.$j['remaining_stck'].'~!~'.$j['unit'].'~!~'.$j['date_registered'].'~!~'.$j['date_updated'].'&quot;)">'.$j['parts_name'].'</td>';
					echo '<td>'.$j['supplier_code'].'</td>';
					echo '<td>'.$j['description'].'</td>';
					echo '<td>'.$j['qty_per_box'].'</td>';
					echo '<td>'.$j['net'].'</td>';
					echo '<td>'.$j['box_weight'].'</td>';
					echo '<td>'.$j['remaining_stck'].'</td>';
					echo '<td>'.$j['unit'].'</td>';
					echo '<td>'.$j['date_registered'].'</td>';
					echo '<td>'.$j['date_updated'].'</td>';
				echo '</tr>';
			}else{
				echo '<tr >';
					echo '<td>'.$c.'</td>';
					echo '<td>'.$j['parts_code'].'</td>';
					echo '<td style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_stock" onclick="get_stock(&quot;'.$j['id'].'~!~'.$j['parts_code'].'~!~'.$j['parts_name'].'~!~'.$j['supplier_code'].'~!~'.$j['description'].'~!~'.$j['qty_per_box'].'~!~'.$j['net'].'~!~'.$j['box_weight'].'~!~'.$j['remaining_stck'].'~!~'.$j['unit'].'~!~'.$j['date_registered'].'~!~'.$j['date_updated'].'&quot;)">'.$j['parts_name'].'</td>';
					echo '<td>'.$j['supplier_code'].'</td>';
					echo '<td>'.$j['description'].'</td>';
					echo '<td>'.$j['qty_per_box'].'</td>';
					echo '<td>'.$j['net'].'</td>';
					echo '<td>'.$j['box_weight'].'</td>';
					echo '<td>'.$j['remaining_stck'].'</td>';
					echo '<td>'.$j['unit'].'</td>';
					echo '<td>'.$j['date_registered'].'</td>';
					echo '<td>'.$j['date_updated'].'</td>';
				echo '</tr>';
	}
		}
	}else{
		echo '<tr>';
			echo '<td colspan = "11" style="color:red;">No Result!</td>';
		echo '</tr>';
	}

}

if ($method == 'update_stocks') {
	$id = $_POST['id'];
	$remaining_stck = $_POST['remaining_stck'];
	$parts_code = $_POST['parts_code'];
	$parts_name = $_POST['parts_name'];
	$supplier_code = $_POST['supplier_code'];
	$description = $_POST['description'];
	$qty_per_box = $_POST['qty_per_box'];
	$net = $_POST['net'];
	$box_weight = $_POST['box_weight'];
	$remaining_stck = $_POST['remaining_stck'];
	$unit = $_POST['unit'];
	$date_registered = $_POST['date_registered'];
	$date_updated = $_POST['date_updated'];

	$query = "UPDATE pss_stocks SET remaining_stck = '$remaining_stck', date_updated = '$server_date_only' WHERE parts_code = '$parts_code' AND parts_name = '$parts_name' ";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}
$conn = NULL;
?>