<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include "../DbConnect.php";

$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "GET":
        $sql = "SELECT *
        FROM classes
        JOIN students ON classes.id = students.classes_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        } else {
            
        }
        break;
}
?>