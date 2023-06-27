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
}

// Khởi tạo đối tượng của Controller
//$taskController = new TaskController();

// Gọi phương thức lấy tất cả các tasks
//$taskController->getAllTasks();
?>