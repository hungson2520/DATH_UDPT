<?PHP 


// Bước 2: Nạp các tệp mô hình và lớp
require_once '../Model/Task.php';

require_once '../Model/Label.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }

    public function getAllTasks() {
        // Gọi phương thức trong Model để lấy dữ liệu
        $tasks = $this->taskModel->getAllTasks();
        return $tasks;
    }
    public function getTaskProject($idDuAn) {
        // Gọi phương thức trong Model để lấy dữ liệu
        $tasks = $this->taskModel->getAllTaskProject($idDuAn);
        return $tasks;
    }
}

// Khởi tạo đối tượng của Controller
//$taskController = new TaskController();

// Gọi phương thức lấy tất cả các tasks
//$taskController->getAllTasks();
?>