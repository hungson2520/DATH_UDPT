<?php
require_once 'ConnectDatabase.php';
class Task {
    private $id_TacVu;
    private $id_DuAn;
    private $TacVu;
    
    public static function InsertDataToTacVu($ID_DuAn, $TacVu) {
        $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
        $query = "INSERT INTO TACVU (ID_DuAn, TacVu) VALUES ('$ID_DuAn', '$TacVu')";
       
      
        if ($result = $conn->query($query)) {
            echo"<h1>Thêm Vào Bảng Tác Vụ Thành Công rồi nhé</h1>";
            
        } else {
            echo"<h1>Không Thêm Vào Bảng Tác Vụ được</h1>";
          
        }
    }
    public static function getAllTasks() {
        // Kết nối cơ sở dữ liệu
        $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
        
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
        //$connection = new DatabaseConnection();
        //$pw = $connection->getPassword();
        //$conn= mysqli_connect("localhost","root","Bluebeach1" ,"N01_GanNhan");
        $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
        
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
        $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
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
    public static function UpadteLabelOfTask_Type356($id_nguoidung,  $ketqua ,$idKQNG) 
    {  $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
            // Kiểm tra kết nối
            if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }
    
            // Bước 2: Chuẩn bị truy vấn INSERT
            $sql = "update ketquanhanghi
            set ID_NguoiDung= '$id_nguoidung' , KetQua = '$ketqua'
            where ID_KetQuaNhanGhi='$idKQNG' ";
            if ($conn->query($sql) === TRUE) {
                echo "<h1>Update dữ liệu thành công</h1>";
            } else {
                echo "Lỗi trong quá trình thêm dữ liệu: " . $conn->error;
                
            }

    }
    public static function UpadteLabelOfTask_Type12($id_nguoidung,  $idNhan ,$idKQN) 
    {

        $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
            // Kiểm tra kết nối
            if ($conn->connect_error)
             {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }

            $sql="UPDATE `ketquanhan` SET `ID_Nhan`='$idNhan' ,ID_NguoiDung= '$id_nguoidung' WHERE ID_KetQuaNhan='$idKQN' ";
            if ($conn->query($sql) === TRUE) {
                echo "<h1>Update dữ liệu thành công</h1>";
            } else {
                echo "Lỗi trong quá trình thêm dữ liệu: " . $conn->error;
                
            }




    }

    public static function getDataFromKetQuaNhanGhi($idKQNG)
    
    {

        $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
            // Kiểm tra kết nối
            if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }

            $sql="SELECT ID_KetQuaNhanGhi, ID_NguoiDung, ID_TacVu, KetQua FROM ketquanhanghi WHERE ID_KetQuaNhanGhi='$idKQNG'";
           
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
    public static function getDataFromKetQuaNhan($idKQN)
    
    {

        $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
            // Kiểm tra kết nối
            if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }

            $sql="SELECT `ID_KetQuaNhan`, `ID_NguoiDung`, `ID_TacVu`, `ID_Nhan`, `TuNgu` FROM `ketquanhan`  WHERE ID_KetQuaNhan='$idKQN'";
           
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
    public static function getNhanFromDuAn($idDuAn){
        $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
        $sql="SELECT * FROM `nhan` WHERE ID_DuAn='$idDuAn'";

        $result = $conn->query($sql);
        

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
    public static function getNhanvaKQN($idDuAn)
    {
        $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
            // Kiểm tra kết nối
            if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }

            $sql="SELECT * FROM nhan n, ketquanhan kqn WHERE kqn.ID_Nhan=n.ID_Nhan and n.ID_DuAn='$idDuAn'";
           
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


    public function getId_TacVu() {
        return $this->id_TacVu;
    }

    public function geId_DuAn(){
        return $this->id_DuAn;
    }

    public function getTacVu($id_TacVu){
        // Kết nối cơ sở dữ liệu
        $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
        
        // Truy vấn dữ liệu từ bảng TacVu
        $query = "SELECT * FROM TacVu WHERE ID_TacVu = '$id_TacVu'";
        $result = $conn->query($query);
        
        $task = $result->fetch_assoc();
        $conn->close();//Close connection
        
        return $task;
    }

    public function getNhanTacVu($id_TacVu){
        // Kết nối cơ sở dữ liệu
        $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
        
        // Truy vấn dữ liệu từ bảng TacVu
        $query = "SELECT DISTINCT nhan.*
        FROM Nhan nhan, DuAn duan, TacVu tacvu
        WHERE tacvu.ID_DuAn = duan.ID_DuAn
            AND tacvu.ID_TacVu = '$id_TacVu'
            AND nhan.ID_DuAn = duan.ID_DuAn;";
        $result = $conn->query($query);
        
        // $task = $result->fetch_assoc();
        // $conn->close();//Close connection

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
        
        return $tasks;
    }

    public static function insertLabelOfTask_2($id_nguoidung, $id_tacvu, $id_nhan) {
        // Bước 1: Kết nối đến cơ sở dữ liệu
        $connection = new DatabaseConnection();
        $pw = $connection->getPassword();
        $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
        // Kiểm tra kết nối
        if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }

        // Bước 2: Chuẩn bị truy vấn INSERT
        $sql = "INSERT INTO KetQuaNhan (ID_NguoiDung, ID_TacVu, ID_Nhan) VALUES ('$id_nguoidung', '$id_tacvu', '$id_nhan')";



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
}
?>

