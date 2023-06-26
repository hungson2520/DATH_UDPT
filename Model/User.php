<?php

class User {
    private $id;
    private $username;
    private $password;
    private $role;
   
    // Hàm xác thực người dùng
    public static function authenticate($username, $password) {
        // Kết nối cơ sở dữ liệu
        $conn= mysqli_connect("localhost","root","","N01_GanNhan");
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
          
       

            // Trả về đối tượng người dùng đã xác thực
            return $user;
        } else {
            return false;
        }
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