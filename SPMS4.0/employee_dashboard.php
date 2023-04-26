

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Employee Dashboard</title>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>
      body{
        /* background-image:url('spms.png'); */
        background-repeat:no-repeat;
        background-attachment:fixed;
        background-size:100%;
        background-position:center;
        background-color:#0f0f0f;
        
      }

      nav {
  background-color: #282C35;
  width: 200px;
  height: 100%;
  position: fixed;
  left: 0;
  top: 0;
  
}

nav ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

nav li {
  padding: 10px;
  margin: 0;
}

nav li a {
  color: white;
  text-decoration: none;
}

nav li:hover {
  background-color: #b666d2;
  
  
}
a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: none;
  color: white;
  
}

.nav-title{
  color:white;
  background:#b666d2;
  padding:2%;
  text-align:center;
  font-size:30px;
}
</style>

  </head>

  <body>
    <!--
    <div class="container" id="logoutbutton">
    <a href="logout.php" class="btn btn-primary mb-5">Logout</a>
    </div>
    -->

    <!-- <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
          <div class="nav-title">
            SPMS 4.0
          </div>
        </div> -->
        <!-- <div class="nav-btn"> -->
          <!-- <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label> -->
        <!-- </div> -->
        
        <!-- <div class="nav-links">
          <ul>
          <li><a href="#" target="_self">Dashboard</a></li>
          <li><a href="ploAnalysis.php" target="_self">PLO Analysis</a></li>
          <li><a href="ploAchieveStats.php" target="_self">PLO Achievement Stats</a></li>
          <li><a href="spiderChart.php" target="_self">Spider Chart Analysis</a></li>
          <li><a href="dataEntry.php" target="_self">Data Entry</a></li>
          <li><a href="viewCourseOutline.php" target="_self">View course Outline</a></li>
          <li><a href="enrollmentStatistics.php" target="_self">Enrollment Stats</a></li>
          <li><a href="performanceStats.php" target="_self">GPA Analysis</a></li>
          <br>
          
          <li><a href="logout.php" target="_self">Logout</a></li>
            </ul>
        </div>
      </div> -->




<!-- spms 4.0 -->
<div>


  <nav>
  <div class="nav-title">
       SPMS 4.0
  </div>
  <ul>
          <li><a href="#" target="_self">Dashboard</a></li>
          <li><a href="ploAnalysis.php" target="_self">PLO Analysis</a></li>
          <li><a href="ploAchieveStats.php" target="_self">PLO Achievement Stats</a></li>
          <li><a href="spiderChart.php" target="_self">Spider Chart Analysis</a></li>
          <li><a href="dataEntry.php" target="_self">Data Entry</a></li>
          <li><a href="viewCourseOutline.php" target="_self">View course Outline</a></li>
          <li><a href="enrollmentStatistics.php" target="_self">Enrollment Stats</a></li>
          <li><a href="performanceStats.php" target="_self">GPA Analysis</a></li>
          
          <?php
              session_start();
              if ((isset($_SESSION['userType']) && $_SESSION['userType'] == 'faculty')||(isset($_SESSION['userType']) && $_SESSION['userType'] == 'department head')) {
                  echo '<li><a href="studentCourseOutcome.php">student Course outcome*</a></li>';
              }else{
                echo '<li><a href="courseOutcomeS.php">course outcome*</a></li>';
              }
          ?>
          <li><a href="logout.php" target="_self">Logout</a></li>
            </ul>
  </nav>
</div>


  </body>

</html>