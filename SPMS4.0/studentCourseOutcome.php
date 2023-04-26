<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cse303";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    session_start();
    $id=$_SESSION["ID"];
?>
<html>


<link rel="stylesheet" href="css/facultypage1.css">

<body>

<div class="main_div">

<div>


  <nav>
  <div class="nav-title">
       SPMS 4.0
  </div>
    <ul>
          <li><a href="#" target="_self">Dashboard</a></li>
          <li><a href="studentdatainsertCSV.php" target="_self">Import student data(csv)</a></li>
          <li><a href="logout.php" target="_self">Logout</a></li>
    </ul>
  </nav>
</div>







<div class="student_info">

        <div class="nav_">
            <div>
                
            </div>

            <div class="student_section">
                <img src="faculty.png" class="student_logo" alt="">
                <?php 
                    echo "<p>$id</p>" 
                ?>
            </div>
        </div>

    </div>



</div>


    <div class="student_name">
        <?php

            $sql2="SELECT f_employeeID,departmentID FROM faculty_t";
            $result1 = $conn->query($sql2);
            // $dep=mysqli_fetch_assoc($result1);
            // $de=$dep["departmentID"];
            if($result1->num_rows > 0){
            while($row1 = $result1->fetch_assoc()){
            if($row1["f_employeeID"]==$id){
            // session_start();
            // $_SESSION["depid"] =$row1["departmentID"] ;
            echo "<p>"."ID: ".$row1["f_employeeID"] ."</p>"."<p>"."Depertment:".$row1["departmentID"] ."</p>";
        }
    }
}

        ?>
    </div>


    <?php 
        //total-student
        $sql3="SELECT COUNT(studentID) as count_ID FROM student_t";
        $result3 = $conn->query($sql3);
        $total_student=mysqli_fetch_assoc($result3);
    

    ?>

       
  

<div class="student_search">

<form method="GET">

<input id="i1" type="text" name="search" placeholder="Search">
<input class="b1" type="submit" value="Search">

</form>
</div>

<hr>

<div class="search_data">
<?php
    
    if (isset($_GET['search'])) {
        $search = intval($_GET['search']);
        
        $sql = "SELECT * FROM student_data_backlog WHERE studentID=$search";
        $result = mysqli_query($conn, $sql);

       

        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>Student ID</th><th>Course ID</th><th>Section</th><th>Semester</th><th>Year</th><th>Mid mark</th><th>MCO1</th><th>MCO2</th><th>MCO3</th><th>Final mark</th><th>FCO1</th><th>FCO2</th><th>FCO3</th><th>Total mark</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                $final_mark=$row["grade"]*0.6;
                $mid_mark=$row["grade"]*0.4;

                $mco1 = $mco2 = $mco3 = $mid_mark / 3;
                $mco1=number_format($mco1, 1);
                $mco2=number_format($mco2, 1);
                $mco3=number_format($mco3, 1);
                

                $fco1 = $fco2 = $fco3 = $final_mark / 3;
                $fco1=number_format($fco1, 1);
                $fco2=number_format($fco2, 1);
                $fco3=number_format($fco3, 1);

                echo "<tr><td>".$row["studentID"]."</td><td>".$row["courseID"]."</td><td>".$row["sectionID"]."</td><td>".$row["semester"]."</td><td>".$row["year"]."</td><td>".$mid_mark."</td><td>".$mco1."</td><td>".$mco2."</td><td>".$mco3."</td><td>".$final_mark."</td><td>".$fco1."</td><td>".$fco2."</td><td>".$fco3."</td><td>".$row["grade"]."</td></tr>";
            }
        } else {
            
            header("location:studentdatainsert.php");
        }

        echo "</table>";

  
    } 
    mysqli_close($conn);
    
    ?>
   </div>

</body>
</html>