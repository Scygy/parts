<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-10" id="exampleModalLabel"><b style="font-size: 30px;">Packing List</b> <br>
        <div class="row">
          <div class="col-4">
             <span>Select Destination:</span>
         <select class="form-control" id="packinglist_type" onchange="po_type()">
         <option value="">Select Destination</option>
         <option value="FAPV">FAPV</option>
         <option value="FAVV">FAVV</option>
         <option value="FAS">FAS</option>
         </select>
          </div>
          <div class="col-2">
            <span>Date Issue:</span><input type="date" name="date_issue" id="date_issue" class="form-control">
          </div>

          <div class="col-6">
            <span>Packing Attachment of Invoice:</span>
            <?php 

             $query = "SELECT MAX(invoice_count) as id FROM pss_set_invoice";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        foreach($stmt->fetchALL() as $tangina){
            $a = $tangina['id'];
             $prefix = "59-PS-";
    $date = date('Y-');
    $shit = $a + 1;

    $shits = str_pad($shit, 5, '0', STR_PAD_LEFT);
    

    echo $prefix."".$date."".$shits;
        }
    }



            ?>

          </div>
        </div>

        </h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       
      </div>
      <div class="modal-body">

       <div class="card-body table-responsive p-15" style="height:600px;">
          <table  class="table table-head-fixed text-nowrap table-hover" style="text-align: center;">

               <thead>
                 <!-- <th>
              <input type="checkbox" name="" id="check_all" onclick="select_all_func()">
                </th> -->
                  
                
                <th><b>#</b></th>
                <th><b>Model No.</b></th>
                <th><b>Description</b></th>
                <th><b>No. of Box</b></th>
                <th><b>Quantity per Box</b></th>
                <th><b>Quantity</b></th>
                <th><b>Net W/T</b></th>
                <th><b>Box W/T</b></th>
                <th><b>Gross W/T</b></th>
                <th><b>Measurement</b></th>
                <th><b>Pallet No.</b></th>


               

               
               


                </thead>
                <tbody id="packinglist_create"></tbody>
                </table>
                </div>


             </div>

              <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="">Print</button>
      </div>     
            
</div>
</div>
    </div>
  </div>
</div>