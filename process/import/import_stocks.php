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
                    $parts_code = $line[0];
                    $parts_name = $line[1];
                    $supplier_code = $line[2];
                    $description = $line[3];
                    $qty_per_box = $line[4];
                    $net = $line[5];
                    $box_weight = $line[6];
                    $remaining_stck = $line[7];
                    $unit = $line[8];
                  
                    // CHECK IF BLANK DATA
                    if($line[0] == '' || $line[1] == '' || $line[2] == '' || $line[3] == '' || $line[4] == '' || $line[5] == '' || $line[6] == '' || $line[7] == '' || $line[8] == ''){
                        // IF BLANK DETECTED ERROR += 1
                        $error = $error + 1;
                    }else{
                        // CHECK DATA
                    $prevQuery = "SELECT id FROM pss_stocks WHERE parts_name = '$line[1]' AND supplier_code = '$line[2]' AND description = '$line[3]'";
                    $res = $conn->prepare($prevQuery);
                    $res->execute();
                    if($res->rowCount() > 0){
                        foreach($res->fetchALL() as $x){
                            $id = $x['id'];
                        }
                       
                        $remaining_stcks = str_replace(',', '', $remaining_stck);

                        $update = "UPDATE pss_stocks SET parts_code = '$parts_code', parts_name = '$parts_name', supplier_code = '$supplier_code', description = '$description', qty_per_box = '$qty_per_box', net = '$net', box_weight = '$box_weight', remaining_stck = '$remaining_stcks', unit = '$unit', date_registered = '$server_date_only' WHERE id = '$id'";

                        $stmt = $conn->prepare($update);
                        if($stmt->execute()){
                            $error = 0;
                        }else{
                            $error = $error + 1;
                        }
                        
                    }else{
                      
                         $remaining_stcks = str_replace(',', '', $remaining_stck);

                        $fas = "INSERT INTO pss_stocks (`parts_code`, `parts_name`, `supplier_code`, `description`, `qty_per_box` , `net`, `box_weight`, `remaining_stck`, `unit`,`date_registered`,`customer_code`) VALUES ('$parts_code','$parts_name','$supplier_code', '$description', '$qty_per_box', '$net', '$box_weight', '$remaining_stcks','$unit','$server_date_only','FAS')";

                        $stmt = $conn->prepare($fas);
                        if($stmt->execute()){
                            // $error = 0;
                             $fapv = "INSERT INTO pss_stocks (`parts_code`, `parts_name`, `supplier_code`, `description`, `qty_per_box`, `net`, `box_weight`, `remaining_stck`, `unit`,`date_registered`,`customer_code`) VALUES ('$parts_code','$parts_name','$supplier_code','$description', '$qty_per_box',  '$net', '$box_weight', '$remaining_stcks','$unit','$server_date_only','FAPV')";
                             $stmt2 = $conn->prepare($fapv);
                             if($stmt2->execute()){
                                // $error = 0;
                                 $favv = "INSERT INTO pss_stocks (`parts_code`, `parts_name`, `supplier_code`, `description`, `qty_per_box`, `net`, `box_weight`, `remaining_stck`, `unit`,`date_registered`,`customer_code`) VALUES ('$parts_code','$parts_name','$supplier_code', '$description',  '$qty_per_box', '$net', '$box_weight', '$remaining_stcks','$unit','$server_date_only','FAVV')";
                                 $stmt3 = $conn->prepare($favv);
                                 if ($stmt3->execute()) {
                                     $error = 0;
                                 }else{
                                    $error = $error +1;
                                 }
                             }else{
                                $error = $error +1;
                             }
                        }else{
                            $error = $error + 1;
                        }
                    }
                    }
                }
                
                fclose($csvFile);
               if($error == 0){
                    echo '<script>
                    var x = confirm("SUCCESS! # OF ERRORS '.$error.' ");
                    if(x == true){
                        location.replace("../../page/admin/stocks.php");
                    }else{
                        location.replace("../../page/admin/stocks.php");
                    }
                </script>'; 
               }else{
                    echo '<script>
                    var x = confirm("WITH ERROR! # OF ERRORS '.$error.' ");
                    if(x == true){
                        location.replace("../../page/admin/stocks.php");
                    }else{
                        location.replace("../../page/admin/stocks.php");
                    }
                </script>'; 
               }
            }else{
                echo '<script>
                        var x = confirm("CSV FILE NOT UPLOADED! # OF ERRORS '.$error.' ");
                        if(x == true){
                            location.replace("../../page/admin/stocks.php");
                        }else{
                            location.replace("../../page/admin/stocks.php");
                        }
                    </script>';
            }
        }else{
            echo '<script>
                        var x = confirm("INVALID FILE FORMAT! # OF ERRORS '.$error.' ");
                        if(x == true){
                            location.replace("../../page/admin/stocks.php");
                        }else{
                            location.replace("../../page/admin/stocks.php");
                        }
                    </script>';
        }
        
    }

    // KILL CONNECTION
    $conn = null;
?>