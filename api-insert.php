<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Acess-Control-Allow-Method,Content-Type,Authorization,X-Requested-with');

@include("../REST Api/db-conn.php");

$inputData = file_get_contents("php://input");
if (empty($inputData)) {
    echo json_encode(array('message' => 'No input data provided','status' => false));
    exit;
}

$data = json_decode($inputData, true);
if (json_last_error()!== JSON_ERROR_NONE) {
    echo json_encode(array('message' => 'Invalid JSON input','status' => false));
    exit;
}

if (!isset($data['first_name'], $data['last_name'], $data['email'], $data['gender'])) {
    echo json_encode(array('message' => 'Missing required fields','status' => false));
    exit;
}

$first_name = $data['first_name'];
$last_name = $data['last_name'];
$email = $data['email'];
$gender = $data['gender'];

$ind = mysqli_query($conn, "insert into user(first_name,last_name,email,gender)values('{$first_name}','{$last_name}','{$email}','{$gender}')");
if ($ind) {
    echo json_encode(array('message' => 'User Record Inserted','status' => true));
} else {
    echo json_encode(array("message" => 'User Not Record Inserted','status' => false));
}