<?php
    // error_reporting(0);
    require '../conn.php';
    if(isset($_POST['upload'])){
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        
        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                //READ FILE
                $csvFile = fopen($_FILES['file']['tmp_name'],'r');
                // SKIP FIRST LINE
                fgetcsv($csvFile);
                // PARSE
                $error = 0;
                while(($line = fgetcsv($csvFile)) !== false){
                    $po_num = $line[0];
                    $parts_code = $line[1];
                    $parts_name = $line[2];
                    $description = $line[3];
                    $supplier_code = $line[4];
                    $customer_code = $line[5];
                    $quantity = $line[6];
                    $shipping_mode = $line[7];
                     
                    // $qrcode = $line[3];
                    // CHECK IF BLANK DATA
                    if($line[0] == '' || $line[1] == '' || $line[2] == '' || $line[3] == '' || $line[4] == '' || $line[5] == '' || $line[6] == '' || $line[7] = ''){
                        // IF BLANK DETECTED ERROR += 1
                        $error = $error + 1;
                    }else{
                        // CHECK DATA
                    $prevQuery = "SELECT id FROM pss_po_details WHERE po_num = '$line[0]' AND parts_code = '$line[1]' AND parts_name = '$line[2]' AND description = '$line[3]' AND supplier_code = '$line[4]' AND customer_code = '$line[5]' AND quantity = '$line[6]' AND shipping_mode = '$line[7]'";
                    $res = $conn->prepare($prevQuery);
                    $res->execute();
                    if($res->rowCount() > 0){
                        foreach($res->fetchALL() as $x){
                            $id = $x['id'];
                        }
                        $update = "UPDATE pss_po_details SET po_num = '$po_num', parts_code = '$parts_code' , parts_name ='$parts_name' , description = '$description', supplier_code = '$supplier_code', customer_code = '$customer_code', quantity = '$quantity', shipping_mode = '$shipping_mode' WHERE id ='$id'";
                        $stmt = $conn->prepare($update);
                        if($stmt->execute()){
                            $error = 0;
                        }else{
                            $error = $error + 1;
                        }
                        
                    }else{
                        $insert = "INSERT INTO pss_po_details (`po_num`,`parts_code`,`parts_name`,`description`, `supplier_code`, `customer_code`, `quantity`, `shipping_mode`) VALUES ('$po_num','$parts_code','$parts_name','$description', '$supplier_code', '$customer_code', '$quantity', '$shipping_mode')";
                        $stmt = $conn->prepare($insert);
                        if($stmt->execute()){
                            $error = 0;
                        }else{
                            $error = $error + 1;
                        }
                    }
                    }
                }
                
                fclose($csvFile);
               if($error == 0){
                 // echo 'success';
                    echo '<script>
                    var x = confirm("SUCCESS! # OF ERRORS '.$error.' ");
                    if(x == true){
                        location.replace("../../page/admin/view_po.php");
                    }else{
                        location.replace("../../page/admin/view_po.php");
                    }
                </script>'; 
               }else{
                // echo 'error';
                    echo '<script>
                    var x = confirm("WITH ERROR! # OF ERRORS '.$error.' ");
                    if(x == true){
                        location.replace("../../page/admin/view_po.php");
                    }else{
                        location.replace("../../page/admin/view_po.php");
                    }
                </script>'; 
               }
            }else{
                // echo 'error';
                echo '<script>
                        var x = confirm("CSV FILE NOT UPLOADED! # OF ERRORS '.$error.' ");
                        if(x == true){
                            location.replace("../../page/admin/view_po.php");
                        }else{
                            location.replace("../../page/admin/view_po.php");
                        }
                    </script>';
            }
        }else{
            // echo 'error';
            echo '<script>
                        var x = confirm("INVALID FILE FORMAT! # OF ERRORS '.$error.' ");
                        if(x == true){
                            location.replace("../../page/admin/view_po.php");
                        }else{
                            location.replace("../../page/admin/view_po.php");
                        }
                    </script>';
        }
        
    }

    // KILL CONNECTION
    $conn = null;
?>