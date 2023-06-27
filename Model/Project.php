<?php
class Project {
    private $ID_DuAn;
    private $tenDuAn;
    private $moTa;
    private $ID_LoaiDuAn;
public static function getAllProject()
{
   

    // Tạo kết nối đến MySQL
    $conn= mysqli_connect("localhost","root","","N01_GanNhan");


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
}
?>