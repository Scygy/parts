<script type="text/javascript">
	
 const load_unit =()=>{
  var parts_name = document.getElementById('parts_name').value;
  var supplier_code = document.getElementById('supplier_code').value;
  var customer_code = document.getElementById('customer_code').value;
   $('#spinner').css('display','block');
   $.ajax({
      url: '../../process/admin/unit.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_unit',
                    parts_name:parts_name,
                    supplier_code:supplier_code,
                    customer_code:customer_code
                },success:function(response){
                   document.getElementById('view_unit_data').innerHTML = response;
                      $('#spinner').fadeOut(function(){                       
                   });
                }
   });
}	

function export_unit(table_id, separator = ',') {
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
    var filename = 'Unit_Price'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}  
</script>