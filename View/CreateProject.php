<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TRANG CREATE PROJECT.HTML</title>
    <script
      src="https://kit.fontawesome.com/901acbd329.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav class="navigation">
      <ul class="nav_ul">
        <div class="nav_ul_left">
          <li><i class="fa-solid fa-bars"></i></li>
          <li>Test</li>
        </div>
        <div class="nav_ul_right">
          <li><i class="fa-solid fa-sun"></i></li>

          <li>ENV<i class="fa-sharp fa-solid fa-caret-down"></i></li>
          <li>PROJECTS</li>
          <li><i class="fa-solid fa-bars"></i></li>
          <li></li>
        </div>
      </ul>
    </nav>

    <div class="NavContent_right" style="width: 100%">
      <div class="NavContent_right_btn">
        <button class="NavContent_Left_Btn" style="width: 100px">
          Create
        </button>
        <button
          style="
            width: 80px;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
          "
        >
          Delete
        </button>
        <div class="NavContent_right_search">
          <div class="NavContent_right_search_top">
            <i class="fa-solid fa-magnifying-glass"></i>Search
          </div>
          <div class="NavContent_right_search_top_left">
            <table class="table">
              <thead>
                <tr>
                  <th><input type="checkbox" id="checkbox-all" /></th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Type</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($projects as $duAn) { ?>
          <tr>
            
            <td><?php echo $duAn['tenDuAn']; ?></td>
            <td><?php echo $duAn['moTa']; ?></td>
            <td><?php echo $duAn['loaiDuAn']; ?></td>
          </tr>
        <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="NavContent_Right_bottom">
          Rows Per Page
          <select>
            <!-- <option  value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option> -->
            <option selected value="10">10</option>
          </select>
          1-4 of 4
          <div class="Nav_bottom_icon">
            <i class="fa-solid fa-angles-left"></i>
            <i class="fa-solid fa-arrow-left"></i>
            <i class="fa-solid fa-arrow-right"></i>
            <i class="fa-solid fa-angles-right"></i>
          </div>
        </div>
      </div>
    </div>
    <div></div>
  </body>
  <script src="./index.js"></script>

  <link rel="stylesheet" href="./CSS/CreateProject.css" />
</html>
