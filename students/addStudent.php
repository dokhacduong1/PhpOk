
<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include "../DbConnect.php";
    
    $method = $_SERVER['REQUEST_METHOD'];
    switch($method){
        case "POST":
            $inputForm = json_decode(file_get_contents('php://input'));
            
            $classes_id = $conn->real_escape_string($inputForm->classes_id); 
            $name_student = $conn->real_escape_string($inputForm->name_student);
            $date_of_birth = $conn->real_escape_string($inputForm->date_of_birth);
            $email = $conn->real_escape_string($inputForm->email);
            $sex = $conn->real_escape_string($inputForm->sex);
            $sql= "INSERT INTO students(classes_id,name_student,date_of_birth,email,sex) VALUES($classes_id,'$name_student','$date_of_birth','$email',$sex)";
            if ($conn->query($sql)==true) {
                echo "Thêm Dữ Liệu Thành Công";
            } else {
               
                print_r($sql);
                
            }
            break;
        
    }
?>
