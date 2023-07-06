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
  public function SumOfTask_Controller($idDuAN){
    $sumoftask = $this->result->SumOfTask($idDuAN);
    return $sumoftask;
  }  

  public function SumOfLabel_Controller($idDuAN){
    $sumoflabel = $this->result->SumOfLabel($idDuAN);
    return $sumoflabel;
  } 
}


// $idDuAn=1;
// $result2= new Result_export_controller();
// $result2->ShowResultProject_Controller(1);

