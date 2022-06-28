<script type="text/javascript">
	 
 const load_stocks =()=>{
  var parts_name = document.getElementById('parts_name').value;
  var supplier_code = document.getElementById('supplier_code').value;
  var customer_code = document.getElementById('customer_code').value;
   $('#spinner').css('display','block');
   $.ajax({
      url: '../../process/admin/stocks.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_stocks',
                    parts_name:parts_name,
                    supplier_code:supplier_code,
                    customer_code:customer_code
                },success:function(response){
                   document.getElementById('view_stocks_data').innerHTML = response;
                      $('#spinner').fadeOut(function(){                       
                   });
                }
   });
}

function export_stocks(table_id, separator = ',') {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length; j++) {
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'Stocks'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}	

const get_stock =(param)=>{

    var string = param.split('~!~');
    var id = string[0];
    var parts_code = string[1];
    var parts_name = string[2];
    var supplier_code = string[3];
    var description = string[4];
    var qty_per_box = string[5];
    var net = string[6];
    var box_weight = string[7];
    var remaining_stck = string[8];
    var unit = string[9];
    var date_registered = string[10];
    var date_updated = string[11];
console.log(param);

document.getElementById('id_update_stock').value = id;
document.getElementById('parts_code_update_stock').value = parts_code;
document.getElementById('parts_name_update_stock').value = parts_name;
document.getElementById('supplier_code_update_stock').value = supplier_code;
document.getElementById('description_update_stock').value = description;
document.getElementById('qty_per_box_update_stock').value = qty_per_box;
document.getElementById('net_update_stock').value = net;
document.getElementById('box_weight_update_stock').value = box_weight;
document.getElementById('remaining_stck_update_stock').value = remaining_stck;
document.getElementById('unit_update_stock').value = unit;
document.getElementById('date_registered_update_stock').value = date_registered;
document.getElementById('date_updated_update_stock').value = date_updated;
}

const update_stocks =()=>{
 var id = document.getElementById('id_update_stock').value;
 var remaining_stck = document.getElementById('remaining_stck_update_stock').value;
 var parts_code = document.getElementById('parts_code_update_stock').value;
 var parts_name = document.getElementById('parts_name_update_stock').value;
 var supplier_code = document.getElementById('supplier_code_update_stock').value;
 var description = document.getElementById('description_update_stock').value;
 var qty_per_box = document.getElementById('qty_per_box_update_stock').value;
 var net = document.getElementById('net_update_stock').value;
 var box_weight = document.getElementById('box_weight_update_stock').value;
 var remaining_stck = document.getElementById('remaining_stck_update_stock').value;
 var unit = document.getElementById('unit_update_stock').value;
 var date_registered = document.getElementById('date_registered_update_stock').value;
 var date_updated = document.getElementById('date_updated_update_stock').value;
   $.ajax({
        url: '../../process/admin/stocks.php',
        type: 'POST', 
        cache: false,
        data:{
            method: 'update_stocks',
            id:id,
            remaining_stck:remaining_stck,
            parts_code:parts_code,
            parts_name:parts_name,
            supplier_code:supplier_code,
            description:description,
            qty_per_box:qty_per_box,
            net:net,
            box_weight:box_weight,
            remaining_stck:remaining_stck,
            unit:unit,
            date_registered:date_registered,
            date_updated:date_updated
        },success:function(x){
            if(x == 'success'){
                swal('Information','Successfully Updated','info');
                load_stocks();
            }else{
                swal('Error','Error','error');
            }
        }
    });

}
</script>