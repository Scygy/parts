<div class="modal fade" id="assign_pallet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Pallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <input type="hidden" name="id_assign" id="id_assign" class="form-control">
           <label>PO No:</label> <input type="text" name="po_num_assign" id="po_num_assign" class="form-control" disabled>
          </div>
           <div class="col-4">
            <input type="hidden" name="parts_name_assign" id="parts_name_assign" class="form-control">
           <label>Parts Name:</label> <input type="text" name="parts_name_assign" id="parts_name_assign" class="form-control" disabled>
          </div>
          <div class="col-4">
            <label>Pallet:</label><input type="text" name="pallet_assign" id="pallet_assign" class="form-control">
          </div>
           <div class="col-4">
           
             <label>No of Boxes:</label><input type="number" name="" id="no_of_box_assign" class="form-control" onkeypress="return event.charCode >= 48" min="1" >
          </div>
          <div class="col-4">
           
             <label>Measurement:</label><input type="text" value="1.21" name="" id="measurement_assign" class="form-control" >
          </div>
        </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-primary" onclick="assign()">Proceed</a>
      </div>
    </div>
  </div>
</div>