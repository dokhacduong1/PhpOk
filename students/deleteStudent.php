<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include "../DbConnect.php";

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case "POST":
        $inputForm = json_decode(file_get_contents('php://input'));
        $id = $conn->real_escape_string($inputForm->id);
        // Xử lý lỗi
        $sql = "DELETE FROM students WHERE id = '$id'";
        if ($conn->query($sql) === true) {
            echo "Xóa Dữ Liệu Thành Công";
        } else {
            print_r($inputForm);
            echo "Lỗi: " . $conn->error;
        }
        break;
}
?>