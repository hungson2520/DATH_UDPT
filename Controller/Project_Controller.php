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


if (isset($_POST['formDataExport']))
 { 
    
    $formData = json_decode($_POST['formDataExport']);
    $NameFile = $formData['outputName'];
    $idDuAn = $formData['idDuAn'];
    echo "ID DỰ ÁN EXPORT NHẬN BÊN CONTROLLER " .$IdDuAn;
    echo " Name của file là ".$NameFile;
    exit();
   // Gọi hàm trong Model để lấy dữ liệu
   // Loại Text Generation
   if($IdDuAn==1 ||$IdDuAn==2 || $IdDuAn==4){
   $data = Project::ShowProject_TextGeneration($IdDuAn);
  // $downloadsDir = realpath($_SERVER['DOCUMENT_ROOT'] . '/../Downloads/');
  // $filename = $downloadsDir . '/data_export_TextGenagration_IdDuAn_' . $IdDuAn . '.txt';
   
  //$filename = "C:\Users\HUNGSON\Downloads\data_export_TextGenagration_IdDuAn_{$IdDuAn}.txt";
  $pathName = "C:\\Users\\HUNGSON\\Downloads\\";
  //$filename = "data_export_TextGenagration_IdDuAn_{$IdDuAn}.txt";
  $filename = $pathName . "data_export_TextGenagration_IdDuAn_{$IdDuAn}.txt";

   $file = fopen($filename, 'w');

   // Ghi dữ liệu vào tệp tin
   fwrite($file, $data);

   // Đóng tệp tin
   fclose($file);

   // Thiết lập header để tải xuống tệp tin văn bản
   header('Content-Type: application/octet-stream');
   header('Content-Disposition: attachment; filename="' . $filename . '"');
   header('Content-Length: ' . filesize($filename));

   // Gửi nội dung tệp tin cho người dùng
   readfile($filename);
   }

   
  
}


if (isset($_POST['createProject']))
 {
    // Lấy giá trị từ form
    $tenDuAn = $_POST['projectName'];
    $moTa = $_POST['projectDescription1'];
    $id_loaiDuAn = $_POST['projectType1'];
    Project::insertProject($tenDuAn,$id_loaiDuAn,$moTa);
    //header('Location:../View/Login.php');   
  
}

 //Khởi tạo đối tượng của Controller
 //$taskController = new TaskController();
// $project = new ProjectController();
// $project->getAllProject();



?>