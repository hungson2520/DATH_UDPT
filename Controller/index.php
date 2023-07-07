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

       header('Location:../View/Login.php?error=' . urlencode($error));

    }
  
} 
 else if (isset($_POST['register']))
 {
    // Lấy giá trị từ form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

  
  $res= User::insertUserData($name,$phone,$address,$password);

 if($res==1){
    $success="Đăng Đăng Ký Tài Khoản Thành Công";
    
    header('Location:../View/RegisterView.php?success=' . urlencode($success));
 }
 else {
     $error="Không Thể Đăng Ký Tài Khoản";
    header('Location:../View/RegisterView.php?error=' . urlencode($error));

 }
  
} else if(isset($_POST['SubmitUploadFile'] )){

    $id_nguoiDung=$_GET['idnguoidung'];
    $role=$_GET['role'];
    $ID_DuAn=$_POST['ID_DuAn'];
    if (empty($_FILES['file']['tmp_name'])) {
        echo "Chạy vô chỗ empty file rồi nè";
       
        $error1_ThemTacVu="Nội dung file bị rỗng , không có dữ liệu";
        header('Location:../View/Labeling.php?action=all&role=' . $role. '&idnguoidung=' . $id_nguoiDung.'&idDuAn=' .$ID_DuAn.'&error1_ThemTacVu='. urlencode($error1_ThemTacVu));
    

    }
    $fileContent = file_get_contents($_FILES['file']['tmp_name']);
    echo "Nội dung của file là :" .$fileContent;
    echo "kích thước của file là:" .filesize($fileContent);
    //exit();
  
    if(strlen(trim($fileContent)) == 0){
        $error1_ThemTacVu="Nội dung file bị rỗng , không có dữ liệu";
       header('Location:../View/Labeling.php?action=all&role=' . $role. '&idnguoidung=' . $id_nguoiDung.'&idDuAn=' .$ID_DuAn.'&error1_ThemTacVu='. urlencode($error1_ThemTacVu));
   

    
    }else {
        echo " ID DỰ ÁN LÀ " .$ID_DuAn;
    
      $success_ThemTacVu="Thêm Tác Vụ Thành Công rồi !";
        Task::InsertDataToTacVu($ID_DuAn,$fileContent);
        header('Location:../View/Labeling.php?action=all&role=' . $role. '&idnguoidung=' . $id_nguoiDung.'&idDuAn=' .$ID_DuAn.'&success_ThemTacVu='. urlencode($success_ThemTacVu));
     //   return 1;

    }
   
    
}

else if(isset($_POST['selectedIDs'])&&isset($_POST['idDuAn'])){
    $selectedIDs = json_decode($_POST['selectedIDs']);
   $IdDuAn=json_decode($_POST['idDuAn']);

   

    foreach ($selectedIDs as $idNguoiDung) {
        $res=User::ThemVaoBangPhanCong($IdDuAn,$idNguoiDung);
        // if($res==1){
        //     $success_phancong="Phân Công Cho Người Dùng Thành Công!";
        //     echo "nó chạy vào 1";
        //     exit();
        //     header('Location:../View/Labeling.php?action=all&role=' . $role. '&idnguoidung=' . $id_nguoiDung.'&idDuAn=' .$ID_DuAn.'&success_phancong='. urlencode($success_phancong));

        // }
        // elseif($res==-1){
        //     echo" nó chạy vào -1";
        //     exit();
        //     $error_phancong="Người Dùng này đã được phân công rồi !";
        //     header('Location:../View/Labeling.php?action=all&role=' . $role. '&idnguoidung=' . $id_nguoiDung.'&idDuAn=' .$ID_DuAn.'&error_phancong='. urlencode($error_phancong));

        // }
    }
   // exit();

}
if(isset($_POST['data_TenFile'])&&isset($_POST['idDuAn']))
 { 
  $fileName = json_decode($_POST['data_TenFile']);
  $IdDuAn=json_decode($_POST['idDuAn']);
echo "ID dự án nhận được : " .$IdDuAn;
echo "Tên File Nhận được là : " .$fileName;

   


 }

// else {
//         echo "<h1>Không Nhận Được thông tin gì cả hết á !!!!</h1>";

// }
