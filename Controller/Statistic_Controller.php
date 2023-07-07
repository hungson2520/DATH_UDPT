<?php

session_start();

require_once '../Model/Statistic.php';

Class Statistic_Controller {
  public $result;

  public function __construct() {
    // Constructor logic goes here
    $this->result = new Statistic(); // Example of initializing a property
  }
  public function ShowStatisticProject_Controller($idDuAN) {
    // Gọi phương thức trong Model để lấy dữ liệu
    $Statistictprojects = $this->result->ShowStatisticProject($idDuAN);
    return $Statistictprojects;
  }
  public function ShowStatisticProject_2_Controller($idDuAN) {
    // Gọi phương thức trong Model để lấy dữ liệu
    $Statistictprojects_2 = $this->result->ShowStatisticProject_2($idDuAN);
    return $Statistictprojects_2;
  }

  public function SumOfTask_Controller($idDuAN){
    $sumoftask = $this->result->SumOfTask($idDuAN);
    return $sumoftask;
  }  

  public function SumOfLabel_Controller($idDuAN){
    $sumoflabel = $this->result->SumOfLabel($idDuAN);
    return $sumoflabel;
  } 

  public function SumOfLabel_2_Controller($idDuAN){
    $sumoflabel_2 = $this->result->SumOfLabel_2($idDuAN);
    return $sumoflabel_2;
  } 
}


// $idDuAn=1;
// $result2= new Result_export_controller();
// $result2->ShowResultProject_Controller(1);

