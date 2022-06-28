<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-10" id="exampleModalLabel"><b style="font-size: 30px;">Packing List</b> <br>
        <div class="row">
          <div class="col-12">
           
             
            <div class="row">
          
            
              <div class="card-header">
                <h3 class="card-title col-8">
                  <div class="row">
                    <div class="col-4">
                      <label>Parts Name:</label><input type="text" name="parts_name"  id="parts_name" class="form-control">
                    </div>
                    <div class="col-4">
                      <label>Supplier:</label>
                       <select id="supplier_code" class="form-control">
                            <option value="">Select Supplier</option>
                          <?php
                            require '../../process/conn.php';
                            $get_supplier_code = "SELECT DISTINCT supplier_code FROM pss_stocks";
                            $stmt = $conn->prepare($get_supplier_code);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['supplier_code'].'">'.$x['supplier_code'].'</option>';
                            }
                     ?>
                        </select>
                    </div>
                    <div class="col-4">
                      <label>Customer:</label>
                      <select id="customer_code" class="form-control">
                            <option value="">Select Customer</option>
                          <?php
                            require '../../process/conn.php';
                            $get_customer_code = "SELECT DISTINCT customer_code FROM pss_stocks";
                            $stmt = $conn->prepare($get_customer_code);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['customer_code'].'">'.$x['customer_code'].'</option>';
                            }
                     ?>
                        </select>
                    </div>
                  <div class="col-4.5">
                      <label>Description:</label>
                      <select id="description" class="form-control">
                            <option value="">Select Description</option>
                          <?php
                            require '../../process/conn.php';
                            $get_description = "SELECT DISTINCT description FROM pss_stocks";
                            $stmt = $conn->prepare($get_description);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['description'].'">'.$x['description'].'</option>';
                            }
                     ?>
                        </select>
                    </div>
                  </div>
                </h3> 
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <button class="btn btn-primary" id="searchReqBtn" onclick="load_stocks_again()">Search <i class="fas fa-search"></i></button> 
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="view_stocks">
                <thead style="text-align:center;">

                   <th>
              <input type="checkbox" name="" id="check_all" onclick="select_all_func()">
                </th>
                    <th>#</th>
                    <th>Parts Code</th>
                    <th>Parts Name</th>
                    <th>Supplier Code</th>           
                    <th>Description</th>
                    <th>Quantity per Box</th>
                    <th>Net W/T</th>
                    <th>Box Weight W/T</th>
                    <th>Remaining Stocks</th>
                    <th>Unit</th>
                    
            </thead>
            <tbody id="view_stocks_data" style="text-align:center;"></tbody>
                </table>
                 <div class="row">
                  <div class="col-6">
                    
                  </div>
                  <div class="col-6">
                      <input type="hidden" name="" id="stocks">
   
                    <div class="spinner" id="spinner" style="display:none;">
                        
                        <div class="loader float-sm-center"></div>    
                    </div>
             
                  </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
         
       
        <!-- /.row -->



           </div>
          </div>
        </div>

              <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Create Packing List</button>
      </div>     
            
</div>
</div>
    </div>
  </div>
</div>