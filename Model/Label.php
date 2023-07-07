<?php 
require_once 'ConnectDatabase.php';
class Label {
    private $db;
    private $ID_Nhan;
    private $Nhan;
    private $ID_DuAn;

public static function getLabel($idDuAn)
{
    // Tạo kết nối đến MySQL
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");


    // Câu truy vấn SQL để lấy tất cả dữ liệu từ project
    $sql = "SELECT * from nhan where ID_DuAn=$idDuAn";

    // Thực thi câu truy vấn
    $result = $conn->query($sql);

    // Kiểm tra và xử lý kết quả
    $label = array(); // Mảng để lưu trữ dữ liệu

    if ($result->num_rows > 0) {
        // Dùng vòng lặp để duyệt qua từng hàng dữ liệu
        while ($row = $result->fetch_assoc()) {
            // Thêm hàng dữ liệu vào mảng
            $label[] = $row;
        }
    } else {
        return null;
    }

    // Đóng kết nối MySQL
    $conn->close();

    // Trả về mảng dữ liệu
    return $label;
}

public static function insertLabel($nhan, $ID_DuAn) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Bước 2: Chuẩn bị truy vấn INSERT
    $sql = "INSERT INTO nhan (nhan, ID_DuAn) VALUES ('$nhan', '$ID_DuAn')";

    // Bước 3: Thực hiện truy vấn INSERT
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
       return false;
    }

    // Bước 4: Đóng kết nối
    $conn->close();
}

public static function deleteLabel($idNhan) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
    // Bước 2: Chuẩn bị truy vấn INSERT
    $sql = "DELETE from nhan WHERE ID_Nhan=$idNhan";
    // Bước 3: Thực hiện truy vấn INSERT
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
       return false;
    }
    // Bước 4: Đóng kết nối
    $conn->close();
}

}