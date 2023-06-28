<?PHP 


// Bước 2: Nạp các tệp mô hình và lớp
require_once '../Model/User.php';


class UserController {
    private $userModel;

    public function __construct() {
         $this->userModel = new User();
 }

    public function ShowBangPhanCong_Controller() {
        // Gọi phương thức trong Model để lấy dữ liệu
        $phanCong = $this->userModel->ShowBangPhanCong();
        return $phanCong;
    }
}

 //Khởi tạo đối tượng của Controller

$User = new UserController();
$User->ShowBangPhanCong_Controller();



?>