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

if (isset($_POST['createLabel']))
 {
    // Lấy giá trị từ form
    $label = $_POST['labelName'];
    $ID_DuAn = $_POST['ID_DuAn'];
    Label::insertlabel($label,intval($ID_DuAn));
    //header('Location:../View/Login.php');   
  
}
?>
