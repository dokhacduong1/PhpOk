<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include "../DbConnect.php";

$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "POST":
        $inputForm = json_decode(file_get_contents('php://input'));
        $id = $conn->real_escape_string($inputForm->id); 
        $name_class = $conn->real_escape_string($inputForm->name_class); 
        $teacher_advisor = $conn->real_escape_string($inputForm->teacher_advisor);
        $faculty = $conn->real_escape_string($inputForm->faculty); 
        $sql= "UPDATE classes SET name_class='$name_class',teacher_advisor='$teacher_advisor',faculty ='$faculty ' WHERE id = '$id'";
       
        if ($conn->query($sql)==true) {
            echo "Sửa giữ liệu thành công";
        } else {
           
            print_r($sql);
            
        }
        break;
    
}
?>