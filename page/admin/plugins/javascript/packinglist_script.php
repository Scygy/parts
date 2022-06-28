<script type="text/javascript">
	const load_packing =()=>{
	var parts_name = document.getElementById('parts_name').value;

   $('#spinner').css('display','block');
   $.ajax({
      url: '../../process/admin/packing.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_packing_details',
                    parts_name:parts_name
                },success:function(response){
                   document.getElementById('view_packing_details').innerHTML = response;
                      $('#spinner').fadeOut(function(){                       
                   });
                }
   });
}

const get_details =(param)=>{
    var data = param.split('~!~');
    var id = data[0];
    var po_num = data[1];
    var parts_name = data[2];

    $('#id_assign').val(id);
    $('#po_num_assign').val(po_num);
    $('#parts_name_assign').val(parts_name);

}

const assign =()=>{
   var id = document.getElementById('id_assign').value;
   var po_num = document.getElementById('po_num_assign').value;
   var parts_name = document.getElementById('parts_name_assign').value;
   var pallet = document.getElementById('pallet_assign').value;
   var box_no = document.getElementById('no_of_box_assign').value;
   var measurement = document.getElementById('measurement_assign').value;

    $.ajax({
      url: '../../process/admin/packing.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'assign_pallet',
                    id:id,
                    po_num:po_num,
                    parts_name:parts_name,
                    pallet:pallet,
                    box_no:box_no,
                    measurement:measurement
                },success:function(response){
                     if (response == 'success') {
                        swal('Success','Successfully','success');
                        load_packing();
                     }else{
                        swal('Error','Error','error');
                     }
                }
   });
}

  
const print_kanapls =()=>{           
            var tangina = window.open();
            $('canvas').hide();
            $('button').hide();
            $('table').attr('border','1');
            $('table').css('border-collapse','collapse');
            tangina.document.write('<style>font-family:arial;</style>');
            tangina.document.write($('#print').html());
            tangina.print();
            tangina.close();
            location.reload();

          }

// const total_amount =()=>{
//     var id = document.getElementById('id_total_assign').value;
//    var box_no = document.getElementById('no_of_box_total_assign').value;
//    var measurement = document.getElementById('measurement_total_assign').value;
//    var quantity = document.getElementById('quantity_total_assign').value;
//    var net = document.getElementById('net_total_assign').value;
//    var box_weight = document.getElementById('box_weight_total_assign').value;
//    var gross = document.getElementById('gross_total_assign').value;
   
//    $.ajax({
//     url: url: '../../process/admin/packing.php',
//                 type: 'POST',
//                 cache: false,
//                 data:{
//                     method: 'packing_total',
//                     id:id,
//                     box_no:box_no,
//                     measurement:measurement,
//                     quantity:quantity,
//                     net:net,
//                     box_weight:box_weight
//                },success:function(response){
//                    document.getElementById('packing_total_all').innerHTML = response;
//                       $('#spinner').fadeOut(function(){                       
//                    });
//                 }
//    });




// const total =()=>{
//     $(document).ready(function() {
//         var dataTable = $('#total').DataTable({
//             "processing" : true;
//             "serverSide" : true;
//             ""

//         })
//     })
// }

</script>