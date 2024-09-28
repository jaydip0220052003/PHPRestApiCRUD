<?php
header('Content-Type:application/json');
header('Acess0Control-Allow-Origin:*');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Acess-Control-Allow-Method,Content-Type,Authorization,X-Requested-with');

@include("../REST Api/db-conn.php");

$data=json_decode(file_get_contents("php://input"),true);

$id=$data['id'];       

$sall=mysqli_query($conn,"delete from user where id={$id}");
if($sall){
    echo json_encode(array("message"=>"Record Delete Success Fully","status"=>true));
}else{
    echo json_encode(array("message"=>"Something Wrong","status"=>false));
}  
