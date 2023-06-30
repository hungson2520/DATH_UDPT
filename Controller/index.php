<?PHP 
session_start();

// Bước 2: Nạp các tệp mô hình và lớp
require_once '../Model/User.php';

require_once '../Model/Task.php';

require_once '../Model/User.php';



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
        $id_nguoiDung=$user->getId();
        $_SESSION['role'] = $role;
        echo "role là".$role;
       
        // Chuyển hướng đến trang Create Project
        header('Location:../View/CreateProject.php?role=' . $role. '&idnguoidung=' . $id_nguoiDung);
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

 
    // Chuyển hướng đến trang Login
    header('Location:../View/Login.php');
  
} else if(isset($_POST['SubmitUploadFile'] )){

    $fileContent = file_get_contents($_FILES['file']['tmp_name']);
    echo "Nội dung của file là :" .$fileContent;
    $ID_DuAn=$_POST['ID_DuAn'];
    echo " ID DỰ ÁN LÀ " .$ID_DuAn;
   
   Task::InsertDataToTacVu($ID_DuAn,$fileContent);
}

else if(isset($_POST['selectedIDs'])&&isset($_POST['idDuAn'])){
    $selectedIDs = json_decode($_POST['selectedIDs']);
   $IdDuAn=json_decode($_POST['idDuAn']);
echo "ID dự án nhận được : " .$IdDuAn;
    echo " danh sách ID nhận được là :";
    foreach ($selectedIDs as $idNguoiDung) {
       User::ThemVaoBangPhanCong($IdDuAn,$idNguoiDung);
    }
    exit();

}

else {
        echo "<h1>Không Nhận Được thông tin gì cả</h1>";

}
