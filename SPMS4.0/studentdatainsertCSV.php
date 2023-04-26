<?php
// database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cse303";

// create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


function escape($string) {
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}
session_start();
$f_id=$_SESSION["ID"];
//  CSV file data
if(isset($_POST["submit"])) {
    if($_FILES["file"]["name"]) {
        $filename = explode(".", $_FILES["file"]["name"]);
        if($filename[1] == "csv") {
            $handle = fopen($_FILES["file"]["tmp_name"], "r");
            while($data = fgetcsv($handle)) {
                $student_id = escape($data[0]);
                $semester = escape($data[1]);
                $course_id = escape($data[2]);
                $section_id = escape($data[3]);
                $year = escape($data[4]);
                
                $total_mark= escape($data[5]);
                
                $timestamp = date('Y-m-d H:i:s');

                $sql = "INSERT INTO student_data_backlog (studentID,semester,courseID,sectionID,year,grade,facultyID,Time_stamp) VALUES ('$student_id', '$semester', '$course_id',' $section_id', '$year','$total_mark','$f_id','$timestamp')";
                mysqli_query($conn, $sql);
            }
            fclose($handle);
            echo "Data imported successfully!";
        }
        else {
            echo "Invalid file format! Only CSV files are allowed.";
        }
    }
    else {
        echo "Please choose a file to upload.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/studentdatainsertCSV.css">
    <title>csv data</title>
</head>
<body>

<div class="student_info">

        <div class="nav_">
            <div>
                <p class="spmslg">SPMS 4.0</p>
            </div>

            <div class="student_section">
                <img src="faculty.png" class="student_logo" alt="">
                
            </div>
        </div>

    </div>

    <div class="main_div">

        <form method="post" enctype="multipart/form-data">
            <label>Upload CSV File:</label><br>
            <input  type="file" name="file"><br><br>
            <input class="submit" type="submit" name="submit" value="Import Data">
        </form>

    </div>

    
</body>
</html>

<?php
// close database connection
mysqli_close($conn);
?>
