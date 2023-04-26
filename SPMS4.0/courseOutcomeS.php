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


<link rel="stylesheet" href="css/courseOutcomeS.css">

<body>


<div class="student_info">

        <div class="nav_">
            <div>
                <p class="spmslg">SPMS 4.0</p>
            </div>

            <div class="student_section">
                <img src="student.png" class="student_logo" alt="">
                <?php
                    
                    echo "<p>$id</p>" 
                ?>

                <div class="logout">
                    <a href="logout.php"   target="_self">Logout</a>
                </div>
            </div>
        </div>

    </div>




    <div class="student_name">
        <?php

            $sql2="SELECT * FROM student_t";
            $result2 = $conn->query($sql2);

            if($result2->num_rows > 0){
            while($row1 = $result2->fetch_assoc()){
            if($row1["studentID"]==$id){
            echo "<p>".$row1["firstName"] ." ". $row1["lastName"]."</p>";
        }
    }
}

        ?>
    </div>
<?php




$sql = "SELECT * FROM student_data_backlog ";
$result = $conn->query($sql);




if ($result->num_rows > 0) {
    echo "<table><tr><th>Course ID</th><th>Section</th><th>Semester</th><th>Year</th><th>Mid mark</th><th>MCO1</th><th>MCO2</th><th>MCO3</th><th>Final mark</th><th>FCO1</th><th>FCO2</th><th>FCO3</th><th>Total mark</th><th>Grade</th></tr>";
    while($row = $result->fetch_assoc()) {
        if($row["studentID"]==$id){
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
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>



</body>
</html>