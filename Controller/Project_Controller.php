<?PHP 

// Bước 2: Nạp các tệp mô hình và lớp
require_once '../Model/Project.php';


class ProjectController {
    private $projectModel;

    public function __construct() {
         $this->projectModel = new Project();
 }

    public function getAllProject() {
        // Gọi phương thức trong Model để lấy dữ liệu
        $projects = $this->projectModel->getAllProject();
        return $projects;
    }
    public function getUserProject($idNguoiDung) {
        // Gọi phương thức trong Model để lấy dữ liệu
        $projects = $this->projectModel->getUserProject($idNguoiDung);
        return $projects;
    }
    public function getProject($idDuAn) {
        // Gọi phương thức trong Model để lấy dữ liệu
        $project = $this->projectModel->getProject($idDuAn);
        return $project;
    }
}

if (isset($_GET['action'])) {
  // Tham số 'role' tồn tại trong URL
  $action=$_GET['action'];
if($action=="delete")
{
$role = $_GET["role"];
$idnguoidung = $_GET["idnguoidung"];
if (isset($_GET['idDuAn'])) {
    // Tham số 'role' tồn tại trong URL
    $idDuAn = $_GET['idDuAn'];
if (Project::delete($idDuAn)) {
    header("Location: ../View/CreateProject.php?role=$role&idnguoidung=$idnguoidung&dmsg=success"); 
} else {
    header("Location: ../View/CreateProject.php?role=$role&idnguoidung=$idnguoidung&dmsg=fail");
}
}
}
}

// if (isset($_POST['ID_DuAn_Export']))
//  { 
    
//     $idDuAn= json_decode($_POST['ID_DuAn_Export']);
   
  //$filename = "C:\Users\HUNGSON\Downloads\data_export_TextGenagration_IdDuAn_{$IdDuAn}.txt";
//   $pathName = "C:\\Users\\HUNGSON\\Downloads\\";
//   //$filename = "data_export_TextGenagration_IdDuAn_{$IdDuAn}.txt";
//   $filename = $pathName . "data_export_TextGenagration_IdDuAn_{$IdDuAn}.txt";

//    $file = fopen($filename, 'w');

//    // Ghi dữ liệu vào tệp tin
//    fwrite($file, $data);

//    // Đóng tệp tin
//    fclose($file);

//    // Thiết lập header để tải xuống tệp tin văn bản
//    header('Content-Type: application/octet-stream');
//    header('Content-Disposition: attachment; filename="' . $filename . '"');
//    header('Content-Length: ' . filesize($filename));

//    // Gửi nội dung tệp tin cho người dùng
//    readfile($filename);
<<<<<<< Updated upstream
//    }}


=======
//    }  
// }
>>>>>>> Stashed changes
if (isset($_POST['createProject']))
 {
    // Lấy giá trị từ form
    $tenDuAn = $_POST['projectName'];
    $moTa = $_POST['projectDescription1'];
    $id_loaiDuAn = $_POST['projectType1'];
    $role = $_POST['role'];
    $idnguoidung = $_POST['idnguoidung'];
    if(Project::insertProject($tenDuAn,$id_loaiDuAn,$moTa))
    {
        header("Location: ../View/CreateProject.php?role=$role&idnguoidung=$idnguoidung&msg=success");
    }
    else
    { 
        header("Location: ../View/CreateProject.php?role=$role&idnguoidung=$idnguoidung&msg=fail");
    }
}
?>