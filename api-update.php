<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Acess-Control-Allow-Method,Content-Type,Authorization,X-Requested-with');

@include("../REST Api/db-conn.php");
$data=json_decode(file_get_contents("php://input"),true);
$id=$data['id'];       
$first_name=$data['first_name'];       
$last_name=$data['last_name'];       
$email=$data['email'];       
$gender=$data['gender'];       
// $sall=mysqli_query($conn,"select * from user where id={$userId}");
// $ind=mysqli_query($conn,"insert into user(first_name,last_name,email,gender)values('{$first_name}','{$last_name}','{$email}','{$gender}')");
$update=mysqli_query($conn,"update user set first_name='{$first_name}',last_name='{$last_name}',email='{$email}',gender='{$gender}' where id='{$id}' ");
if($update){
    echo json_encode(array('message'=>'User Record Updated','status'=>true));
}else{
    echo json_encode(array("message"=>'User Not Record Updated','status'=>false));
}
