<?php
    include "connect.php";

session_start();
$f_id=$_SESSION["ID"];

$student_id = $_POST['student_id'];
$course_id = $_POST['course_id'];
$section_id = $_POST['section_id'];
$year = $_POST['year'];
$semester = $_POST['semester'];
// $mid_mark = $_POST['mid_mark'];
$total_mark = $_POST['total_mark'];


$timestamp = date('Y-m-d H:i:s');

// Insert data into table


$sql1 = "SELECT studentID, password, enrollmentSemester, enrollmentYear FROM student_t WHERE studentID = '$student_id'";
$result1 = $con->query($sql1);

if ($result1->num_rows === 0) {
    
    $sql2 = "INSERT INTO student_t (studentID, password, enrollmentSemester, enrollmentYear) VALUES ('$student_id', '12345', '$semester', '$year')";
    $result2 = $con->query($sql2);
}






$sql = "INSERT INTO student_data_backlog (studentID,semester,courseID,sectionID,year,grade,facultyID,Time_stamp) VALUES ('$student_id', '$semester', '$course_id',' $section_id', '$year','$total_mark','$f_id','$timestamp')";
$result =  $con->query($sql);
if ($result === TRUE) {
    echo "New record created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();

?>

