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


    public function getDataFromKetQuaNhanGhi_Controller($idKQNG){
        $task1= $this->taskModel->getDataFromKetQuaNhanGhi($idKQNG);
   
        
        return $task1;
    }
    public  function getDataFromKetQuaNhan_Controller($idKQN)
    { 
        $task1= $this->taskModel->getDataFromKetQuaNhan($idKQN);
   
        
        return $task1;
        
    }
    public  function getNhanvaKQN_Controller($idDuAn){

        $task= $this->taskModel->getNhanvaKQN($idDuAn);
        return $task;
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



if (isset($_POST['labeling_update_1']))
 {
    // Lấy giá trị từ form
    $data = $_POST['input2'];
    $id_nguoidung = $_POST['idnguoidung'];
    $idKQNG = $_POST['idKQNG'];
    $id_duan = $_POST['id_duan'];
    $role = $_POST['role'];
    
    
    
    if(Task::UpadteLabelOfTask_Type356($id_nguoidung,$data,$idKQNG)){
        header("Location: ../View/Result_Export.php?idDuAn=$id_duan&role=$role&id=$id_nguoidung&lmsg_2=success");
    }else{
        header("Location: ../View/Result_Export.php?idDuAn=$id_duan&role=$role&id=$id_nguoidung&lmsg_2=fail");
    }
     
  
}
if(isset($_POST['update_labeling_2']))
{  $data = $_POST['label_of_task'];
    $id_nguoidung = $_POST['idnguoidung'];
    $id_ketquanhan = $_POST['idkqn'];
    $id_duan = $_POST['id_duan'];
    $role = $_POST['role'];
    
    if(Task::UpadteLabelOfTask_Type12($id_nguoidung,$data,$id_ketquanhan)){
        header("Location: ../View/Result_Export.php?idDuAn=$id_duan&role=$role&id=$id_nguoidung&lmsg=success");
    }else{
        header("Location: ../View/Result_Export.php?idDuAn=$id_duan&role=$role&id=$id_nguoidung&lmsg=fail");
    }

}





// xhr.send('data_idnguoidung=' + encodeURIComponent(data_idnguoidung)+'&data_idkqng=' + encodeURIComponent(data_idkqng)
// +'&data_ketqua=' + encodeURIComponent(data_ketqua)
// if(isset($_POST['data_idnguoidung'])&&isset($_POST['data_idkqng']) &&isset($_POST['data_ketqua']) )
// {
//     $ketqua = $_POST['data_ketqua'];
//     $id_nguoidung = $_POST['data_idnguoidung'];
//     $id_kqng = $_POST['data_idkqng'];
//     echo " sửa kết quả nhãn ghi "  .$ketqua .$id_nguoidung .$id_kqng;
//     exit();

// }

?>