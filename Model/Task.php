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

    public function getId_TacVu() {
        return $this->id_TacVu;
    }

    public function geId_DuAn(){
        return $this->id_DuAn;
    }

    public function getTacVu(){
        return $this->TacVu; 
    }
}
?>

