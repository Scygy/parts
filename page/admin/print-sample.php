<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Packing Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
    <!-- Main content -->
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title col-6">
                  <div class="row">
                    <div class="col-5">
                      <label>P.O. Number:</label><input type="text" name="po_no"  id="po_no" class="form-control">
                    </div>
                 <div class="col-5">
                      <label>Shipping Mode:</label>
                       <select id="shipping_mode" class="form-control">
                            <option value="">Select Shipping Mode</option>
                          <?php
                            require '../../process/conn.php';
                            $get_shipping_mode = "SELECT DISTINCT shipping_mode FROM pss_po_details";
                            $stmt = $conn->prepare($get_shipping_mode);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['shipping_mode'].'">'.$x['shipping_mode'].'</option>';
                            }
                     ?>
                        </select>
                    </div>
                   
                  </div>
                </h3> 
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
                </table>
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
<!-- Page specific script -->
<script>
  // window.addEventListener("load", window.print());
</script>
</body>
</html>


