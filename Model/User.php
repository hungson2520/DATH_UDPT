<?php

class User {
    private $id;
    private $username;
    private $password;
    private $role;
   
    // Hàm xác thực người dùng
    public static function authenticate($username, $password) {
        // Kết nối cơ sở dữ liệu
        $conn= mysqli_connect("localhost","root","Bluebeach1","N01_GanNhan");
        // Làm sạch dữ liệu đầu vào
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);
       
        // Truy vấn người dùng theo tên đăng nhập và mật khẩu
        $query = "SELECT * FROM NguoiDung WHERE SDT='$username' AND MatKhau='$password'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            // Lấy thông tin người dùng từ cơ sở dữ liệu 
            $row = $result->fetch_assoc();

            // Tạo đối tượng người dùng
            $user = new User();
            $user->id = $row['ID_NguoiDung'];
            $user->username = $row['SDT'];
            $user->password = $row['MatKhau'];
            $user->role = $row['VaiTro'];
          
            $conn->close();

            // Trả về đối tượng người dùng đã xác thực
            return $user;
        } else {
            $conn->close();
            return false;
        }
    }
    public static function insertUserData($name, $phone, $address, $password)
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $conn= mysqli_connect("localhost","root","Bluebeach1","N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Bước 2: Chuẩn bị truy vấn INSERT
    $sql = "INSERT INTO NguoiDung (Ten, SDT, DiaChi, MatKhau,VaiTro) VALUES ('$name', '$phone', '$address', '$password',1)";



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


    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }
}