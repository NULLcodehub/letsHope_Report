<?php
  include 'connect.php';
?>
<html>
<head>
	<link rel="stylesheet" href="css/studentdatainsert.css">
	<title>Insert Student Grade</title>
</head>
<body>
<div class="main_div">

<div>
  <nav>
  <div class="nav-title">
       SPMS 4.0
  </div>
    <ul>
          <li><a href="#" target="_self">Dashboard</a></li>
          <li><a href="studentdatainsertCSV.php" target="_self">Import student data</a></li>
          <li><a href="logout.php" target="_self">Logout</a></li>
    </ul>
  </nav>
</div>

<div class="insert_form_div">

<h1> student data not found(insert new data)</h1>
<h2>Insert Student Grade</h2>
	<form  method="POST" action="insert.php">
		<label for="student_id">Student ID:</label>
		<input type="text" name="student_id" placeholder="Enter Student ID" required><br><br>

		<label for="course_id">Course ID:</label>
		<input type="text" name="course_id" placeholder="Enter Course ID" required><br><br>

		<label for="section_id">Section ID:</label>
		<input type="text" name="section_id" placeholder="Enter section ID" required><br><br>

		<label for="year">Year:</label>
		<input type="text" id="year" name="year" placeholder="Enter Year " required><br><br>

		<label for="semester">Semester:</label>
		<input type="text" name="semester" placeholder="Enter Semester"required><br><br>

		<!-- <label for="mid_mark">:</label>
		<input type="text" name="mid_mark" placeholder="Enter Mid Mark" required><br><br> -->

		<label for="final_mark">total Mark:</label>
		<input type="text" name="total_mark" placeholder="Enter Final Mark" required><br><br>

		<!-- <label for="total_mark">Total Mark:</label>
		<input type="text" name="total_mark" required><br><br> -->

		<input type="submit" class="submit" value="submit">
	</form>

</div>
	





</body>
</html>
