<?php
header('Content-Type:application/json');
header('Acess0Control-Allow-Origin:*');
// header('Access-Control-Allow-Method: GET');
// header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Acess-Control-Allow-Method,Content-Type,Authorization,X-Requested-with');

@include("../REST Api/db-conn.php");

// $data=json_decode(file_get_contents("php://input"),true);

// $search=$data['search'];       
$search=isset($_GET['search']) ? $_GET['search'] : die() ;       

$sall=mysqli_query($conn,"select * from user where first_name like '%{$search}%' ");
if(mysqli_num_rows($sall)>0){
    $output=mysqli_fetch_all($sall,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array("message"=>"No Record Found","status"=>false));
}  