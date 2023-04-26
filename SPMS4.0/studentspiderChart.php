
<!--  -->
<html>
<head>
	<title>Spider Chart</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
	<?php
     
    $HOSTNAME='localhost';
    $USERNAME='root';
    $PASSWORD='';
    $DATABASE='cse303';
    
		// Step 1: Connect to the database
		$conn = mysqli_connect("localhost", "username", "password", "database_name");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}


        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $student_id=$_POST["student_id"];
			$course_id = $_POST["course_id"];
			$section = $_POST["section"];
			$semester = $_POST["semester"];
			$year = $_POST["year"];

        

        $sql = "SELECT mco1, mco2, mco3, fco1, fco2, fco3 FROM student_performance_outcome WHERE student_id = '$student_id' AND course_id = '$course_id' AND section_id = '$section ' AND semester='$semester' AND year='$year'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		// Step 3: Store fetched data into an array
		$data = array($row['mco1'], $row['mco2'], $row['mco3'], $row['fco1'], $row['fco2'], $row['fco3']);

		// Step 4: Create HTML canvas element
		echo '<canvas id="spider-chart" width="400" height="400"></canvas>';

		// Step 5: Include Chart.js library

		// Step 6: Create JavaScript code block to create spider chart using Chart.js and display fetched data
		echo "<script>
				var data = {
				    labels: ['MCO1', 'MCO2', 'MCO3', 'FCO1', 'FCO2', 'FCO3'],
				    datasets: [{
				        label: 'Marks',
				        backgroundColor: 'rgba(54, 162, 235, 0.2)',
				        borderColor: 'rgba(54, 162, 235, 1)',
				        borderWidth: 1,
				        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
				        pointBorderColor: '#fff',
				        pointHoverBackgroundColor: '#fff',
				        pointHoverBorderColor: 'rgba(54, 162, 235, 1)',
				        data: ".json_encode($data)."
				    }]
				};

				var options = {
				    scale: {
				        ticks: {
				            beginAtZero: true,
				            max: 100
				        }
				    }
				};

				var ctx = document.getElementById('spider-chart').getContext('2d');
				var spiderChart = new Chart(ctx, {
				    type: 'radar',
				    data: data,
				    options: options
				});
			  </script>";


              
		}
    
	?>








		// Step 2: Retrieve data from the database
		


        <div>
        <form method="post" action="studentspiderChart.php">

        <label for="student_id">Course ID:</label>
		<input type="text" id="student_id" name="student_id"><br><br>

		<label for="course_id">Course ID:</label>
		<input type="text" id="course_id" name="course_id"><br><br>

		<label for="section">Section:</label>
		<input type="text" id="section" name="section"><br><br>

		<label for="semester">Semester:</label>
		<input type="text" id="semester" name="semester"><br><br>

		<label for="year">Year:</label>
		<input type="text" id="year" name="year"><br><br>

		<input type="submit" value="Submit">
	</form>

        
        </div>
</body>
</html>
