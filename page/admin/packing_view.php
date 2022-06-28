<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/packing_viewbar.php';?>

<!-- Main Sidebar Container -->
 <section class="content">
      <div class="container-fluid">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Packing List</h1>
            <br>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Packing List</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class="row">
            
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
       <div class="row" id="print">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title col-6">
                  <div class="row">
                   <!--  <div class="col-5">
                      <label>P.O. Number:</label><input type="text" name="po_no"  id="po_no" class="form-control">
                    </div> -->
                    <div class="col-5">
                      <label>Shipment Type:</label>
                       <div id="shipping_mode" class="form-control">
                            <!-- <option value="">Select Shipping Mode</option> -->
                          <?php
                            require '../../process/conn.php';
                            $get_shipping_mode = "SELECT DISTINCT shipping_mode FROM pss_po_details";
                            $stmt = $conn->prepare($get_shipping_mode);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['shipping_mode'].'">'.$x['shipping_mode'].'</option>';
                            }
                     ?>
                        </div>
                    </div>  
                    <div class="col-5">
                      <label>Destination:</label>
                       <label id="shipping_mode" class="form-control">
                            <!-- <option value="">Select Destination</option> -->
                          <?php
                            require '../../process/conn.php';
                            $get_customer_code = "SELECT DISTINCT customer_code FROM pss_po_details";
                            $stmt = $conn->prepare($get_customer_code);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['customer_code'].'">'.$x['customer_code'].'</option>';
                            }
                     ?>
                        </label>
                    </div>     
                   
                  </div>
                </h3> 
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <button class="btn btn-primary" id="searchReqBtn" onclick="load_packing()">Search <i class="fas fa-search"></i></button> 
                  </div>
                </div>
              </div>
               
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <div class="row">
                  <div class="col-12">
                     <table class="table table-head-fixed text-nowrap table-hover" id="view_packing">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Pallet</th>
                    <!-- <th>Po Number</th> -->
                    <th>Parts Name</th>
                    <th>Description</th>
                    <th>No of Boxes</th>
                    <th>Qty Per Box</th>
                    <th>Quantity</th>
                    <th>NET W/T</th>
                    <th>Box W/T</th>
                    <th>Gross W/T</th>
                    <th>Measurement</th>
                    
                    
            </thead>
            <tbody id="view_packing_details" style="text-align:center;"></tbody>
            <tfoot style="text-align:center" id="total_all">
              <tr>
                    <th>Total</th>
                    <thth>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>-------</th>
                    <th></th>
                    <th>-------</th>
                    <th>-------</th>
                    <th>-------</th>
                    <th>-------</th>
                    <th>-------</th>
              </tr>
            </tfoot>
            <tbody id = "packing_total_all"></tbody>
                </table>
                  </div>
                  <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <button class="btn btn-primary" id="searchReqBtn" onclick="total_amount()">Total <i class=""></i></button> 
                  </div>
                </div>
          
               
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
          </div>
        </div>
        <!-- /.row -->


       <div class="row no-print">
                <div class="col-12">
                  <button class="btn btn-primary" onclick="print_kanapls()">Print</button>
                </div>
              </div>
        

        <!--  <script type="text/javascript">
          $(document).ready(function(){
            var dataTable = $('#total').DataTable({
              "process" :true,
              "serverSide" :true,
              "total" :[],
              "ajax" :{
                url:"../../process/admin/total.php",
                type:"POST"
              }
            })
          })

         </script> -->
</div>
</div>
</section>





<?php include 'plugins/footer.php';?>
<?php include 'plugins/javascript/packinglist_script.php';?>

