<?php

require_once 'ConnectDatabase.php';
class Project {
    private $ID_DuAn;
    private $tenDuAn;
    private $moTa;
    private $ID_LoaiDuAn;
public static function getAllProject()
{
   

    // Tạo kết nối đến MySQL
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");


    // Câu truy vấn SQL để lấy tất cả dữ liệu từ project
    $sql = "SELECT da.ID_DuAn,da.tenDuAn,da.moTa,da.ID_LoaiDuAn,lda.TenLoai FROM duan da, loaiduan lda WHERE da.ID_LoaiDuAn=lda.ID_LoaiDuAn";

    // Thực thi câu truy vấn
    $result = $conn->query($sql);

    // Kiểm tra và xử lý kết quả
    $duAn = array(); // Mảng để lưu trữ dữ liệu

    if ($result->num_rows > 0) {
        // Dùng vòng lặp để duyệt qua từng hàng dữ liệu
        while ($row = $result->fetch_assoc()) {
            // Thêm hàng dữ liệu vào mảng
            $duAn[] = $row;
        }
    } else {
        return null;
    }

    // Đóng kết nối MySQL
    $conn->close();

    // Trả về mảng dữ liệu
    return $duAn;
}


public static function getUserProject($idNguoiDung)
{
   

    // Tạo kết nối đến MySQL
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");


    // Câu truy vấn SQL để lấy tất cả dữ liệu từ project
    $sql = "SELECT da.ID_DuAn,da.tenDuAn,da.moTa,da.ID_LoaiDuAn,lda.TenLoai FROM duan da, loaiduan lda 
    WHERE da.ID_LoaiDuAn=lda.ID_LoaiDuAn and da.ID_DuAn in (select ID_DuAn from PhanCong where ID_NguoiDung = $idNguoiDung) ";

    // Thực thi câu truy vấn
    $result = $conn->query($sql);

    // Kiểm tra và xử lý kết quả
    $duAn = array(); // Mảng để lưu trữ dữ liệu

    if ($result->num_rows > 0) {
        // Dùng vòng lặp để duyệt qua từng hàng dữ liệu
        while ($row = $result->fetch_assoc()) {
            // Thêm hàng dữ liệu vào mảng
            $duAn[] = $row;
        }
    } else {
        return null;
    }

    // Đóng kết nối MySQL
    $conn->close();

    // Trả về mảng dữ liệu
    return $duAn;
}

public static function getProject($idDuAn) {

    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Chuẩn bị câu truy vấn SQL để lấy dự án theo ID
    $sql = "SELECT ID_DuAn,tenDuAn,moTa,ID_LoaiDuAn FROM duan WHERE ID_DuAn=$idDuAn";

    
    $result = $conn->query($sql);
    // Kiểm tra xem có dự án nào được tìm thấy hay không
    if ($result->num_rows > 0) {
        // Lấy thông tin dự án từ kết quả truy vấn
        $project = $result->fetch_assoc();

        // Đóng kết nối CSDL
        $conn->close();

        // Trả về thông tin dự án
        return $project;
    } else {
        // Đóng kết nối CSDL
        $conn->close();

        // Trả về null nếu không tìm thấy dự án
        return null;
    }
}

public static function insertProject($tenDuAn, $loaiDuAn, $moTa) 
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
    $sql = "INSERT INTO duan (tenDuAn, moTa, ID_LoaiDuAn) VALUES ('$tenDuAn', '$moTa', '$loaiDuAn')";



    // Bước 3: Thực hiện truy vấn INSERT
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Thêm Dữ Liệu Thành Công</h1>";
    } else {
        echo "Lỗi trong quá trình thêm dữ liệu: " . $conn->error;
    }

    // Bước 4: Đóng kết nối
    $conn->close();
}


public static function ShowProject_TextGeneration($idDuAN) 
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
    $sql = "SELECT kqng.ID_NguoiDung, kqng.ID_TacVu,kqng.KetQua , tv.ID_DuAn FROM `ketquanhanghi`kqng ,`tacvu` tv WHERE kqng.ID_TacVu=tv.ID_TacVu And tv.ID_DuAN='$idDuAN'";



    // Bước 3: Thực hiện truy vấn INSERT
    // if ($conn->query($sql) === TRUE) {
    //     echo "<h1>ĐÃ TRUY VẤN THÀNH CÔNG</h1>";
    // } else {
    //     echo "Lỗi trong quá trình thêm dữ liệu: " . $conn->error;
    // }
    
    // Bước 4: Lấy dữ liệu từ kết quả truy vấn
    $result = $conn->query($sql);
    $data = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Ghi dữ liệu vào biến $data
            $data .= "ID Người dùng: " . $row['ID_NguoiDung'] . "\n";
            $data .= "ID Tác vụ: " . $row['ID_TacVu'] . "\n";
            $data .= "Kết quả: " . $row['KetQua'] . "\n";
            $data .= "ID Dự án: " . $row['ID_DuAn'] . "\n";
           
            
            $data .= "---------------------------------------\n";
        }
    }


    // Bước 4: Đóng kết nối
    $conn->close();
    return $data;
}


}


 
 


?>