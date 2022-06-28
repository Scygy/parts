<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/invoicebar.php';?>

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
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title col-6">
                  <div class="row">
                
                  </div>
                </h3> 
              </div>
                <div class="row">
                    <div class="col-sm-6">
                      &nbsp;<button class="btn btn-success " onclick="export_stocks('view_stocks')">Print</button>
                    </div>
                  </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="packinglist_table">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Model Number</th>
                    <th>Description</th>
                    <th>No. of Boxes</th>
                    <th>Quantity per Box</th>
                    <th>Quantity</th>
                    <th>Net W/T</th>
                    <th>Box W/T</th>
                    <th>Gross W/T</th>
                    <th>Measurement</th>
                    
            </thead>
            <tbody id="packinglist_data" style="text-align:center;"></tbody>
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
          </div>
        </div>
        <!-- /.row -->
</div>
</div>
</section>

















<?php include 'plugins/footer.php';?>
