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

    public function getDatafromTacVu($id_tacvu){

        $task = $this->taskModel->getTacVu($id_tacvu);
        return $task;
    }

    public function insertAnswerOfTask($id_nguoiDung, $id_TacVu, $data) {
       // $task= $this->taskModel->insertLabelOfTask($id_nguoiDung,$id_TacVu,$data);
       $this->taskModel->insertLabelOfTask($id_nguoiDung,$id_TacVu,$data);
       // return $task;
    }

    public function getDataAndLabelOfTacVu ($id_tacvu) {
        $tasks = $this->taskModel->getNhanTacVu($id_tacvu);
        return $tasks;
    }
}

if (isset($_POST['labeling']))
{
    // Lấy giá trị từ form
    $data = $_POST['input2'];
    $id_nguoidung = $_POST['idnguoidung'];
    $id_tacvu = $_POST['idtacvu'];
    $id_duan=$_POST['idDuAn'];
    $role=$_POST['role'];
    $loaiduan=$_POST['idLoaiDuAn'];
    
    if(Task::insertLabelOfTask($id_nguoidung,$id_tacvu,$data)){
        header("Location: ../View/Labeling.php?action=all&idnguoidung=$id_nguoidung&idDuAn=$id_duan&role=$role&lmsg=success");
    }else{
        header("Location: ../View/Labeling.php?action=all&idnguoidung=$id_nguoidung&idDuAn=$id_duan&role=$role&lmsg=fail");
    }
    //header('Location:../View/Login.php');   
  
}else

if (isset($_POST['labeling_2']))
 {
    // Lấy giá trị từ form
    $data = $_POST['label_of_task'];
    $id_nguoidung = $_POST['idnguoidung'];
    $id_tacvu = $_POST['idtacvu'];
    $id_duan=$_POST['idDuAn'];
    $role=$_POST['role'];
    $loaiduan=$_POST['idLoaiDuAn'];
    
    if(Task::insertLabelOfTask_2($id_nguoidung,$id_tacvu,$data)){
        header("Location: ../View/Labeling.php?action=all&idnguoidung=$id_nguoidung&idDuAn=$id_duan&role=$role&lmsg=success");
    }else{
        header("Location: ../View/Labeling.php?action=all&idnguoidung=$id_nguoidung&idDuAn=$id_duan&role=$role&lmsg=fail");
    }
    //header('Location:../View/Login.php');   
  
}

if (isset($_POST['labeling_3']))
 {
    // Lấy giá trị từ form
    $data = $_POST['label_of_task'];
    $id_nguoidung = $_POST['idnguoidung'];
    $id_tacvu = $_POST['idtacvu'];
    $id_duan=$_POST['idDuAn'];
    $role=$_POST['role'];
    $loaiduan=$_POST['idLoaiDuAn'];
    $tungu=$_POST['input2'];
    
    if(Task::insertLabelOfTask_nhanthucthe($id_nguoidung,$id_tacvu,$data,$tungu)){
        header("Location: ../View/Labeling.php?action=all&idnguoidung=$id_nguoidung&idDuAn=$id_duan&role=$role&lmsg=success");
    }else{
        header("Location: ../View/Labeling.php?action=all&idnguoidung=$id_nguoidung&idDuAn=$id_duan&role=$role&lmsg=fail");
    }
    //header('Location:../View/Login.php');   
  
}



// Khởi tạo đối tượng của Controller
// $taskController = new TaskController();

// // Gọi phương thức lấy tất cả các tasks
// $taskController->getAllTasks();
?>