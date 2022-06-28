 <div class="modal fade bd-example-modal-xl" id="update_stock" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Update Stock
          <input type="hidden" name="id_update_stock" id="id_update_stock" class="form-control">
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  >
            <!-- onclick="javascript:window.location.reload()" -->
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="row">
               <div class="col-3">
                   <span>Parts Code:</span>
                   <input type="text" name="" id="parts_code_update_stock" class="form-control" disabled>
               </div>
                <div class="col-3">
                   <span>Parts Name:</span>
                   <input type="text" name="" id="parts_name_update_stock" class="form-control" disabled>
               </div>
                <div class="col-3">
                   <span>Supplier Code:</span>
                   <input type="text" name="" id="supplier_code_update_stock" class="form-control" disabled>
               </div>
                <div class="col-3">
                   <span>Description:</span>
                   <input type="text" name="" id="description_update_stock" class="form-control" disabled>
               </div>
           </div>  
           <div class="row">
            <div class="col-3">
                   <span>Quantity per Box:</span>
                   <input type="number" name="" id="qty_per_box_update_stock" class="form-control" disabled>
               </div>
                <div class="col-3">
                   <span>Net W/T:</span>
                   <input type="number" name="" id="net_update_stock" class="form-control" disabled>
               </div>
                <div class="col-3">
                   <span>Box W/T:</span>
                   <input type="number" name="" id="box_weight_update_stock" class="form-control" disabled>
               </div>
                  <div class="col-3">
                   <span>Remaining Stocks:</span>
                   <input type="number" name="" id="remaining_stck_update_stock" class="form-control" onkeypress="return event.charCode >= 48" min="1">
               </div>
           </div> 
           <div class="row">
         
                <div class="col-3">
                   <span>Unit:</span>
                   <input type="text" name="" id="unit_update_stock" class="form-control" disabled>
               </div>
                <div class="col-3">
                   <span>Date Registered:</span>
                   <input type="date" name="" id="date_registered_update_stock" class="form-control" disabled>
               </div>
                <div class="col-3">
                   <span>Date Updated:</span>
                   <input type="date" name="" id="date_updated_update_stock" class="form-control" disabled>
               </div>
           </div> 
           <br>
           <div class="row">
                        <div class="col-12">
                          <p style="text-align:right;">
                        <button type="button" class="btn btn-primary"  onclick="update_stocks()">Update</button>
                          </p>
                        </div>
           </div>
      </div>
     
    </div>
  </div>
</div>

