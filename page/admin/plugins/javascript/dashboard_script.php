<script type="text/javascript">
	
// const po_type =()=>{
// 	var po_type = document.getElementById('po_type').value;
// 	if(po_type == 'Vietnam'){
// 		document.getElementById('partner_cord').disabled = true;
// 		document.getElementById('fas_part_name').disabled = true;
// 		document.getElementById('partner_part_name').disabled = true;
// 		document.getElementById('total_amount').disabled = true;
// 		document.getElementById('quantity_box').disabled = true;
// 	}else if(po_type == 'Japan'){
// 		document.getElementById('partner_cord').disabled = false;
// 		document.getElementById('fas_part_name').disabled = false;
// 		document.getElementById('partner_part_name').disabled = false;
// 		document.getElementById('total_amount').disabled = false;
// 		document.getElementById('quantity_box').disabled = false;
		
// 		document.getElementById('description').disabled = true;
// 		document.getElementById('supplier_code').disabled = true;
// 		document.getElementById('fas_part_name').disabled = true;
// 		document.getElementById('quantity_box').disabled = true;
// 	}else{
// 		document.getElementById('partner_cord').disabled = false;
// 		document.getElementById('fas_part_name').disabled = false;
// 		document.getElementById('partner_part_name').disabled = false;
// 		document.getElementById('total_amount').disabled = false;
// 		document.getElementById('quantity_box').disabled = false;
// 	}
// }	

// const load_packing =()=>{
// 	load_po_details();
// 	load_stock_details();
// }

const load_packing =()=>{
	var po_no = document.getElementById('po_no').value;
	if (po_no == '') {
		swal('Information','Please Input Purchase Order No.','info');
	}else{
	$.ajax({
		url: '../../process/admin/packing.php',
		type: 'POST',
		cache: false,
		data:{
			method: 'fetch_po_details',
			po_no:po_no
		},success:function(response){
			document.getElementById('view_po_details').innerHTML = response;
			load_stock_details();
		}
	});
}
}

const load_stock_details =()=>{
	var po_no = document.getElementById('po_no').value;
	$.ajax({
		url: '../../process/admin/packing.php',
		type: 'POST',
		cache: false,
		data:{
			method: 'fetch_stock_details',
			po_no:po_no
		},success:function(response){
			document.getElementById('view_stocks_details').innerHTML = response;
		}
	});
}

const commit =()=>{
	var po_no = document.getElementById('po_no').value;

	$.ajax({
		url: '../../process/admin/packing.php',
		type: 'POST',
		cache: false,
		data:{
			method: 'commit_po',
			po_no:po_no
		},success:function(response){
			// console.log(response);
			if (response == 'success') {
				swal('Success','Successfully Transact','success');
			}else if(response == 'Lack of Stocks'){
				swal('Information','Lack of Stocks','info');
			}else{
				swal('Error','Error','error');
			}
		}
	});
}


</script>