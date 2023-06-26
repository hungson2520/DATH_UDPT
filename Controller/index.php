<?PHP 
session_start();

// Bước 2: Nạp các tệp mô hình và lớp
require_once '../Model/User.php';


// Bước 3: Xử lý yêu cầu đăng nhập
if (isset($_POST['login'])) 
{
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    // Bước 4: Xác thực người dùng
    $user = User::authenticate($username, $password);
   
    if ($user) {
        // Bước 5: Lưu thông tin người dùng đã đăng nhập vào phiên làm việc
        $_SESSION['user'] = $user;
        $role = $user->getRole();
        $_SESSION['role'] = $role;
        echo "role là".$role;
       
        // Chuyển hướng đến trang Labeling
        header('Location:../View/CreateProject.php?role=' . $role);
        exit();
    } else {
        // Xử lý lỗi đăng nhập
        $error = 'Invalid username or password';
        echo "<h1>Sai Tên Đăng Nhập Hoặc Mật Khẩu</h1>";
      

    }
  
} 
 else if (isset($_POST['register']))
 {
    // Lấy giá trị từ form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

  
  User::insertUserData($name,$phone,$address,$password);

 
    // Chuyển hướng đến trang Labeling
    header('Location:../View/Login.php');
  
}
else {
        echo "<h1>Không Nhận Được thông tin gì cả</h1>";

}