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

// Khởi tạo đối tượng của Controller
//$taskController = new TaskController();

// Gọi phương thức lấy tất cả các tasks
//$taskController->getAllTasks();
?>