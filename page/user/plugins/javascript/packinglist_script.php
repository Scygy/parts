<script type="text/javascript">
	const load_packing =()=>{
	var po = document.getElementById('po_no').value;

   $('#spinner').css('display','block');
   $.ajax({
      url: '../../process/admin/packing.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_packing_details',
                    po:po
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

    $('#id_assign').val(id);
    $('#po_num_assign').val(po_num);

}

const assign =()=>{
   var id = document.getElementById('id_assign').value;
   var po_num = document.getElementById('po_num_assign').value;
   var pallet = document.getElementById('pallet_assign').value;
   var box_no = document.getElementById('no_of_box_assign').value;

    $.ajax({
      url: '../../process/admin/packing.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'assign_pallet',
                    id:id,
                    po_num:po_num,
                    pallet:pallet,
                    box_no:box_no
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

</script>