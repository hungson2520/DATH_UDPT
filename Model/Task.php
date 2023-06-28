<?php
class Task {
    private $id_TacVu;
    private $id_DuAn;
    private $TacVu;
    

    public static function getAllTasks() {
        // Kết nối cơ sở dữ liệu
        $conn= mysqli_connect("localhost","root","Bluebeach1","N01_GanNhan");
        
        // Truy vấn dữ liệu từ bảng TacVu
        $query = "SELECT * FROM TacVu";
        $result = $conn->query($query);
        

        // Lấy dữ liệu vào một mảng
        $tasks = array();

        //Kiem tra su ton tai cua du lieu trong result
        if($result->num_rows >0){
            while ($row = $result->fetch_assoc()) {
                // Thêm hàng dữ liệu vào mảng
                $tasks[] = $row;
            }
        }else{
            return null;
        }
        $conn->close();//Close connection
        return $tasks;//Tra ve mang task
    }
    public static function getAllTaskProject($idDuAn) {
        // Kết nối cơ sở dữ liệu
        $conn= mysqli_connect("localhost","root","Bluebeach1","N01_GanNhan");
        
        // Truy vấn dữ liệu từ bảng TacVu
        $query = "SELECT * FROM TacVu WHERE ID_DuAn=$idDuAn";
        $result = $conn->query($query);
        

        // Lấy dữ liệu vào một mảng
        $tasks = array();

        //Kiem tra su ton tai cua du lieu trong result
        if($result->num_rows >0){
            while ($row = $result->fetch_assoc()) {
                // Thêm hàng dữ liệu vào mảng
                $tasks[] = $row;
            }
        }else{
            return null;
        }
        $conn->close();//Close connection
        return $tasks;//Tra ve mang task
    }

    public static function insertLabelOfTask($id_nguoidung, $id_tacvu, $ketqua) {
        // Bước 1: Kết nối đến cơ sở dữ liệu
        $conn= mysqli_connect("localhost","root","Bluebeach1","N01_GanNhan");
        // Kiểm tra kết nối
        if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }

        // Bước 2: Chuẩn bị truy vấn INSERT
        $sql = "INSERT INTO KetQuaNhanGhi (ID_NguoiDung, ID_TacVu, KetQua) VALUES ('$id_nguoidung', '$id_tacvu', '$ketqua')";



        // Bước 3: Thực hiện truy vấn INSERT
        if ($conn->query($sql) === TRUE) {
            echo "<h1>Thêm Dữ Liệu Thành Công</h1>";
        } else {
            echo "Lỗi trong quá trình thêm dữ liệu: " . $conn->error;
            echo "<h1>Thêm Dữ Liệu Thành Công</h1>";
        }

        // Bước 4: Đóng kết nối
        $conn->close();
    }

    public function getId_TacVu() {
        return $this->id_TacVu;
    }

    public function geId_DuAn(){
        return $this->id_DuAn;
    }

    public function getTacVu($id_TacVu){
        // Kết nối cơ sở dữ liệu
        $conn= mysqli_connect("localhost","root","","N01_GanNhan");
        
        // Truy vấn dữ liệu từ bảng TacVu
        $query = "SELECT * FROM TacVu WHERE ID_TacVu = '$id_TacVu'";
        $result = $conn->query($query);
        
        $task = $result->fetch_assoc();
        $conn->close();//Close connection
        
        return $task;
    }
}
?>

