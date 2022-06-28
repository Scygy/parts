<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_po_details') {
	$po_no = $_POST['po_no'];
	$c = 0;

	// $query = "SELECT * FROM pss_po_details WHERE po_num = '$po_no' AND Status = 'Pending'";
	$query = "SELECT * FROM pss_po_details,pss_stocks WHERE pss_po_details.parts_name = pss_stocks.parts_name AND pss_po_details.po_num = '$po_no' AND pss_po_details.Status = 'Pending' GROUP BY pss_stocks.parts_name";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $x){
			$c++;
			echo '<tr>';
					echo '<td>'.$c.'</td>';
					echo '<td>'.$x['po_num'].'</td>';
					echo '<td>'.$x['parts_name'].'</td>';
					echo '<td>'.$x['customer_code'].'</td>';
					echo '<td>'.$x['quantity'].'</td>';
			echo '</tr>';
		}
	}else{
		echo '<tr>';
			echo '<td colspan = "5" style="color:red;">No Result!</td>';
		echo '</tr>';
	}
}

if ($method == 'fetch_stock_details') {
	$po_no = $_POST['po_no'];
	$c = 0;

	
			$query = "SELECT * FROM pss_po_details,pss_stocks WHERE pss_po_details.parts_name = pss_stocks.parts_name AND pss_po_details.po_num = '$po_no' AND pss_po_details.Status = 'Pending' GROUP BY pss_stocks.parts_name";

			$stmt2 = $conn->prepare($query);
			$stmt2->execute();
			if ($stmt2->rowCount() > 0) {
				foreach($stmt2->fetchALL() as $j){
					$c++;
			echo '<tr>';
					echo '<td>'.$c.'</td>';
					echo '<td>'.$j['parts_name'].'</td>';
					echo '<td>'.$j['description'].'</td>';
					echo '<td>'.$j['remaining_stck'].'</td>';
			echo '</tr>';
				}
			}else{
		echo '<tr>';
			echo '<td colspan = "4" style="color:red;">No Result!</td>';
		echo '</tr>';
	}	
}


if ($method == 'commit_po') {
	$po_no = $_POST['po_no'];

	// $select = "SELECT parts_name,quantity FROM pss_po_details WHERE po_num = '$po_no'";
	$select = "SELECT pss_po_details.parts_name,pss_po_details.quantity,pss_stocks.remaining_stck FROM pss_po_details LEFT JOIN pss_stocks ON pss_stocks.parts_name = pss_po_details.parts_name WHERE pss_po_details.po_num = '$po_no'";
	$stmt = $conn->prepare($select);
	if ($stmt->execute()) {
		foreach($stmt->fetchALL() as $x){
			$parts_name = $x['parts_name'];
			$quantity = $x['quantity'];
			$remaining_stck = $x['remaining_stck'];
		}
		if ($remaining_stck >= $quantity) {
					$update = "UPDATE pss_stocks SET remaining_stck = remaining_stck - $quantity WHERE parts_name = '$parts_name'";
		$stmt2 = $conn->prepare($update);
		if ($stmt2->execute()) {
			
			$query = "INSERT INTO pss_packinglist (`parts_name`,`description`,`qty`) SELECT pss_po_details.parts_name,pss_stocks.description,pss_po_details.quantity FROM pss_po_details LEFT JOIN pss_stocks ON pss_stocks.parts_name = pss_po_details.parts_name WHERE pss_po_details.po_num = '$po_no' GROUP BY pss_stocks.parts_name";
 		$stmt3 = $conn->prepare($query);
 		if ($stmt3->execute()) {
 			$update_status = "UPDATE pss_po_details SET Status = 'Transact' WHERE po_num = '$po_no'";
 			$stmt4 = $conn->prepare($update_status);
 			if ($stmt4->execute()) {
 				echo 'success';
 			}else{
 				echo 'error';
 			}
 		}else{
 			echo 'error';
 		}

		}else{
			echo 'error';
		}
	}else{
		echo 'Lack of Stocks';
	}
	

	}

}


if ($method == 'fetch_packing_details') {
	// $po = $_POST['po'];
	$parts_name = $_POST['parts_name'];
	$c = 0;

	// ((((pss_stocks.net + pss_stocks.box_weight)pss_packinglist.no_of_boxes * pss_stocks.qty_per_box) + pss_stocks.net) * pss_stocks.box_weight)

	// (pss_packinglist.no_of_boxes * pss_stocks.qty_per_box) as quantity
	// ((pss_packinglist.no_of_boxes * pss_stocks.qty_per_box) + pss_stocks.net) as net
	// (((pss_packinglist.no_of_boxes * pss_stocks.qty_per_box) + pss_stocks.net) * pss_stocks.box_weight) as box_weight
	// ((pss_stocks.net + pss_stocks.box_weight) * pss_packinglist.no_of_boxes) as gross
	$query = "SELECT pss_packinglist.id, pss_packinglist.pallet, pss_packinglist.parts_name, pss_packinglist.description, pss_packinglist.qty,  pss_po_details.po_num, pss_stocks.qty_per_box, pss_po_details.shipping_mode, pss_packinglist.no_of_boxes, (pss_packinglist.no_of_boxes * pss_stocks.qty_per_box) as quantity, pss_stocks.net,pss_stocks.box_weight, ((pss_packinglist.no_of_boxes * pss_stocks.qty_per_box) * pss_stocks.net) as net, (((pss_packinglist.no_of_boxes * pss_stocks.qty_per_box) * pss_stocks.net) * pss_stocks.box_weight) as box_weight, ((pss_stocks.net + pss_stocks.box_weight) * pss_packinglist.no_of_boxes) as gross, (1.1 * 1.13 * pss_packinglist.measurement) as measurement FROM pss_packinglist LEFT JOIN pss_po_details ON pss_po_details.parts_name = pss_packinglist.parts_name LEFT JOIN pss_stocks ON pss_stocks.parts_name = pss_packinglist.parts_name WHERE pss_po_details.Status = 'Transact' AND pss_po_details.parts_name LIKE '$parts_name%' GROUP BY pss_po_details.parts_name";
	$stmt = $conn-> prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) { 
		foreach ($stmt->fetchALL() as $k) {
			$net = $k['net'];
			$box_weight = $k['box_weight'];
			$gross = $k['gross'];
			$measurement = $k['measurement'];
			$c++;
			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#assign_pallet" onclick="get_details(&quot;'.$k['id'].'~!~'.$k['po_num'].'&quot;)">';
			echo '<td>'.$c.'</td>';
				// echo '<td>'.$k['po_num'].'</td>';
					echo '<td>'.$k['pallet'].'</td>';
					echo '<td>'.$k['parts_name'].'</td>';
					echo '<td>'.$k['description'].'</td>';
					echo '<td>'.$k['no_of_boxes'].'</td>';
					echo '<td>'.$k['qty_per_box'].'</td>';
					echo '<td>'.$k['quantity'].'</td>';
					echo '<td>'.round($k['net'],3).'</td>';
					echo '<td>'.round($k['box_weight'],2).'</td>';
					echo '<td>'.round($k['gross'],5).'</td>';
					echo '<td>'.round($k['measurement'],2).'</td>';
					// echo '<td>'.$k['shipping_mode'].'</td>';
					// round(5.045, 2); 
			echo '</tr>';
		}
	}else{
		echo '<tr>';
			echo '<td colspan = "5">No Result!</td>';
		echo '</tr>';
	}
}
	
if ($method == 'assign_pallet') {
	$id = $_POST['id'];
	$po_num = $_POST['po_num'];
	$parts_name = $_POST['parts_name'];
	$pallet = $_POST['pallet'];
	$box_no = $_POST['box_no'];
	$measurement = $_POST['measurement'];
	$gross = $_POST['gross'];

	$query = "UPDATE pss_packinglist SET pallet = '$pallet', no_of_boxes = '$box_no', measurement = '$measurement',  WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		$query2 = "SELECT pss_stocks.parts_name FROM pss_stocks";
		$stmt2 = $conn->prepare($query2);
		if ($stmt2->execute()) {
			// code...
		}

		echo 'success';
	}else{
		echo 'error';
	}
}

// if ($method == 'packing_total') {
// 	$id = $_POST['id'];

// 	$column = array('')
// }

// if ($method == 'packing_total') {
// 	$id = $_POST['id_total_assign'];
// 	$box_no = $_POST['no_of_box_total_assign'];
// 	$measurement = $_POST['measurement_total_assign'];
// 	$quantity = $_POST['quantity_total_assign'];
// 	$box_weight = $_POST['box_weight_total_assign'];
// 	$gross = $_POST['gross_total_assign'];

// 	$query = " SELECT  "


$conn = NULL;
?>