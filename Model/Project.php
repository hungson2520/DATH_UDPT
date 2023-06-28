<?php
class Project {
    private $ID_DuAn;
    private $tenDuAn;
    private $moTa;
    private $ID_LoaiDuAn;
public static function getAllProject()
{
   

    // Tạo kết nối đến MySQL
    $conn= mysqli_connect("localhost","root","Bluebeach1","N01_GanNhan");


    // Câu truy vấn SQL để lấy tất cả dữ liệu từ project
    $sql = "SELECT da.ID_DuAn,da.tenDuAn,da.moTa,da.ID_LoaiDuAn,lda.TenLoai FROM duan da, loaiduan lda WHERE da.ID_LoaiDuAn=lda.ID_Loai ";

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
    $conn= mysqli_connect("localhost","root","Bluebeach1","N01_GanNhan");


    // Câu truy vấn SQL để lấy tất cả dữ liệu từ project
    $sql = "SELECT da.ID_DuAn,da.tenDuAn,da.moTa,da.ID_LoaiDuAn,lda.TenLoai FROM duan da, loaiduan lda 
    WHERE da.ID_LoaiDuAn=lda.ID_Loai and da.ID_DuAn in (select ID_DuAn from PhanCong where ID_NguoiDung = $idNguoiDung) ";

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

     $conn= mysqli_connect("localhost","root","Bluebeach1","N01_GanNhan");
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

}
?>