<?PHP 


// Bước 2: Nạp các tệp mô hình và lớp
require_once '../Model/Label.php';
class LabelController {
    private $labelModel;

    public function __construct() {
         $this->labelModel = new Label();
 }
    public function getLabel($idDuAn) {
        // Gọi phương thức trong Model để lấy dữ liệu
        $labels = $this->labelModel->getLabel($idDuAn);
        return $labels;
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
      if (isset($_GET['idNhan']))
  {
    $idNhan=$_GET['idNhan'];
  if (Label::deleteLabel($idNhan)) {
      header("Location: ../View/Labeling.php?idnguoidung=$idnguoidung&idDuAn=$idDuAn&role=$role&dmsg=success"); 
  } else {
      header("Location: ../View/Labeling.php?idnguoidung=$idnguoidung&idDuAn=$idDuAn&role=$role&dmsg=fail");
  } }
  }
  }
  else if($action=="create")
  {
    if (isset($_POST['createLabel']))
    {
       // Lấy giá trị từ form
       $label = $_POST['labelName'];
       $ID_DuAn = $_POST['ID_DuAn'];
       $role = $_POST['role'];
       $idnguoidung = $_POST['idnguoidung'];
       if (Label::insertlabel($label,intval($ID_DuAn))) 
       {
        header("Location: ../View/Labeling.php?idnguoidung=$idnguoidung&idDuAn=$ID_DuAn&role=$role&msg=success"); 
       }   
       else 
      {
        header("Location: ../View/Labeling.php?idnguoidung=$idnguoidung&idDuAn=$ID_DuAn&role=$role&msg=fail");
    }  
   }
  }
  }
?>
