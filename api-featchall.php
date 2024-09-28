<?php
header('Content-Type:application/json');
header('Acess0Control-Allow-Origin:*');
@include("../REST Api/db-conn.php");
$sall=mysqli_query($conn,"select * from user");
if(mysqli_num_rows($sall)>0){
    $output=mysqli_fetch_all($sall,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array("message"=>"No Record Found","status"=>false));
}  