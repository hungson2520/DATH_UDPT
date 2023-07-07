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
if($action=="create")
{
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
}
if($action=="update")
{
if (isset($_POST['updateProject']))
 {
    // Lấy giá trị từ form
    $idDuAn = $_POST['projectID'];
    $tenDuAn = $_POST['projectName'];
    $moTa = $_POST['projectDescription1'];
    $id_loaiDuAn = $_POST['projectType1'];
    $role = $_POST['role'];
    $idnguoidung = $_POST['idnguoidung'];

    if(Project::updateProject($idDuAn,$tenDuAn,$id_loaiDuAn,$moTa))
    {
        header("Location: ../View/CreateProject.php?role=$role&idnguoidung=$idnguoidung&umsg=success");
    }
    else
    { 
        header("Location: ../View/CreateProject.php?role=$role&idnguoidung=$idnguoidung&umsg=fail");
    }
}
}
}
?>