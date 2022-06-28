<?php
    $servername = 'localhost';
    $username = 'root';
    $pass = '';
    date_default_timezone_set('Asia/Manila');
    $server_date_time = date('Y-m-d H:i:s');
    $server_date_only = date('Y-m-d');
    $server_time = date('H:i:s');
    $server_year = date('Y');
    $dateqr = date('Ymd');

   
    try {
        $conn = new PDO ("mysql:host=$servername;dbname=pss_db",$username,$pass);

  //        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
  
    }catch(PDOException $e){
        echo 'NO CONNECTION'.$e->getMessage();
    }


    $query = "SELECT MAX(invoice_count) as count FROM pss_set_invoice";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        foreach($stmt->fetchALL() as $x){
            $a = $x['count'];
             $prefix = "59-PS-";
    $date = date('Y-');
    $count = $a + 1;

    $counts = str_pad($count, 5, '0', STR_PAD_LEFT);
    

     $invoice_count =  $prefix."".$date."".$counts;
        }
    }
    

 //    $duration  = 3240;
 // '<br>';

 // $durations = gmdate('i:s',$duration);
?>