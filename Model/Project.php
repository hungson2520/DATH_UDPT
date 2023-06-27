<?php
public static function getAllProject()
{
    // Thay đổi các thông số kết nối theo cấu hình MySQL của bạn

    // Tạo kết nối đến MySQL
    $conn = new mysqli($servername, $username, $password, $database);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối tới MySQL thất bại: " . $conn->connect_error);
    }

    // Câu truy vấn SQL để lấy tất cả dữ liệu từ project
    $sql = "SELECT * FROM duan";

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
        echo "Không có dữ liệu.";
    }

    // Đóng kết nối MySQL
    $conn->close();

    // Trả về mảng dữ liệu
    return $duAn;
}
?>