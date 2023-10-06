
<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include "../DbConnect.php";
    
    $method = $_SERVER['REQUEST_METHOD'];
    switch($method){
        case "POST":
            $inputForm = json_decode(file_get_contents('php://input'));
    
            $name_class = $conn->real_escape_string($inputForm->name_class);
            $teacher_advisor = $conn->real_escape_string($inputForm->teacher_advisor);
            $faculty = $conn->real_escape_string($inputForm->faculty);
            $sql= "INSERT INTO classes(name_class,teacher_advisor,faculty) VALUES('$name_class','$teacher_advisor','$faculty')";
            if ($conn->query($sql)==true) {
                echo "Thêm Dữ Liệu Thành Công";
            } else {
               
                print_r($sql);
                
            }
            break;
        
    }
?>
