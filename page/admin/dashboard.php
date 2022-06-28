
<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/dashboardbar.php';?>
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
            <h1 class="m-0">Prepare Packing List</h1>
            <br>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Prepare Packing List</li>
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
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title col-6">
                  <div class="row">
                    <div class="col-5">
                      <label>P.O. Number:</label><input type="text" name="po_no"  id="po_no" class="form-control">
                    </div>
             
                   
                  </div>
                </h3> 
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <button class="btn btn-primary" id="searchReqBtn" onclick="load_packing()">Search <i class="fas fa-search"></i></button> 
                  </div>
                </div>
              </div>
                <div class="row">
                    <div class="col-sm-12">
                       &nbsp;<button class="btn btn-primary " onclick="commit()">Commit</button>
                      &nbsp;<button class="btn btn-success " onclick="export_unit('export_po')">Export</button>
                      
                    </div>
                  </div>
                  <hr>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <div class="row">
                  <div class="col-6">
                      <h4 style="text-align:center;">PO Details</h4>
                     <table class="table table-head-fixed text-nowrap table-hover" id="view_po">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Purchase Order</th>
                    <th>Parts Name</th>
                    <th>Customer Code</th>
                    <th>PO Quantity</th>
                    
                    
            </thead>
            <tbody id="view_po_details" style="text-align:center;"></tbody>
                </table>
                  </div>
                  <div class="col-6">
                      <h4 style="text-align:center;">Stocks Details</h4>
                     <table class="table table-head-fixed text-nowrap table-hover" id="view_po">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Parts Name</th>
                    <th>Description</th>
                    <th>Remaining Stocks</th>        
      
            </thead>
            <tbody id="view_stocks_details" style="text-align:center;"></tbody>
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

        
</div>
</div>
</section>


<?php include 'plugins/footer.php';?>
<?php include 'plugins/javascript/dashboard_script.php';?>