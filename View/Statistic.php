<?php

$role = $_GET['role'];
$idNguoiDung = $_GET['idnguoidung'];
$idDuAn = $_GET['idDuAn'];
?>

<?php
require_once '../Controller/Statistic_Controller.php';
$result = new Statistic_Controller();
$statistic = $result->ShowStatisticProject_Controller($idDuAn);
$sumoftask = $result->SumOfTask_Controller($idDuAn);
$sumoflabel = $result->SumOfLabel_Controller($idDuAn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TRANG THỐNG KÊ .HTML</title>
  <link rel="stylesheet" href="./CSS/Result_Export.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9b2b850f23.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    //biểu đồ tròn 
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      <?php if (empty($statistic) || !isset($statistic[0]['number'])) : ?>
                document.getElementById('chart_div').innerHTML = "Chưa có dữ liệu nhãn để thống kê";
      <?php else : ?>
      var piedata = google.visualization.arrayToDataTable([
        ['Nhãn', 'Số lượng'],
        <?php foreach ($statistic as $row) : ?>
        <?php if (isset($row['number'])) : ?>
              <?php echo "['" . $row['Nhan'] . "', " . $row['number'] . "],"; ?>
        <?php endif; ?>
        <?php endforeach; ?>
      ]);

      var pieoptions = {
        title: 'Biểu đồ tròn biểu diễn số lượng nhãn đã gán',
        titleTextStyle: {
                    fontSize: 20 // Kích thước tiêu đề
                },
        width: 500,
        height:400,
        //is3D:true,  
        pieHole: 0.3
      };

      var piechart = new google.visualization.PieChart(document.getElementById('pie_chart'));
      piechart.draw(piedata, pieoptions);
      

      var columndata = google.visualization.arrayToDataTable([
        ['Nhãn', 'Số lượng'],
        <?php foreach ($statistic as $row) : ?>
          <?php
          echo "['" . $row["Nhan"] . "', " . $row["number"] . "],";
          ?>
        <?php endforeach; ?>
      ]);

      var columnoptions = {
        title: 'Biểu đồ cột biểu diễn số lượng nhãn đã gán',
        vAxis: {
                    format: '0' // Định dạng giá trị trục là số nguyên
                },  
        titleTextStyle: {
          fontSize: 20 // Kích thước tiêu đề
                },
        legend: {
          position: 'bottom'
        }
      };

      var columnchart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
      columnchart.draw(columndata, columnoptions);
      <?php endif; ?>
    }
  </script>

</head>

<body style="background-color: #e9e9e9">
  <nav class="navigation" style="background-color:#3366cc">
    <ul class="nav_ul container">
      <div class="nav_ul_left ml-4 fs-5">

        <li style="width:350px;color:white">Nhóm 1 Ứng Dụng Phân Tán</li>
      </div>
      <div class="nav_ul_right">
        <li style="width: 200px;color:yellow">
          Role: <?php if ($role == 1) {
                  echo " Người gán nhãn cấp 1";
                } elseif ($role == 2) {
                  echo " Người gán nhãn cấp 2";
                } elseif ($role == 3) {
                  echo "Quản lý";
                } ?>
        </li>
      </div>
    </ul>
  </nav>
  <br />
  <br />

  <div class="container">
    <div class="row mb-4">
      <div class="col" style="margin-right: 8px;">
        <div class="bg-light shadow rounded p-2 row">
          <div class="col-9">
            <p class="fs-4">Tổng số tác vụ</p>
            <h1><?php echo $sumoftask['number'] ?></h3>

          </div>
          <div class="icon col-3 d-flex justify-content-center align-items-center">
            <i class="fa fa-layer-group fs-1"></i>
          </div>
        </div>
      </div>
      <div class="col" style="margin-left: 8px;">
        <div class="bg-light shadow rounded p-2 row">
          <div class="col-9">
            <p class="fs-4">Tổng số nhãn được gán</p>
            <h1><?php echo $sumoflabel['number'] ?></h3>
          </div>
          <div class="icon col-3 d-flex justify-content-center align-items-center">
            <i class="fa fa-tasks fs-1"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div id="chart_div" class="fs-20"></div>
      <div id="column_chart"  class="col-7 rounded shadow bg-white" style="height: 500px"></div>
      <div style="width: 26px;"></div>
      <div class="col rounded shadow bg-white" id="pie_chart" style="height: 500px"></div>
    </div>
  </div>


  </div>


</body>