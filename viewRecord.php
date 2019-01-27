<?php include('database.php'); ?>
<?php
	//Create the select query
	$UID;
	if($_POST){
		$UID = ($_POST['uid']);
		$query ="SELECT date FROM datespresent WHERE uid='$UID'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$query2 ="SELECT * FROM members ";
		$result2 = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$query3 ="SELECT comment FROM datesabsent ";
		$result3 = $mysqli->query($query) or die($mysqli->error.__LINE__);
		}else{
			$isBlank = true;
			$screenErrorMessage =  "Could not retrive member information.";
		}
	
?>
<!DOCTYPE html>
<html>
<head>
<title>A-Team Robotics</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Attendance Application" content="">
    <meta name="Adam Tronchin" content="">
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#6610f2">
    <link rel="icon" href="logoSpace.png">
    <!-- Bootstrap core CSS -->
    <link href="./css/main.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/custom.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-light">
    <a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;">A-Team Attendance</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"style="background-color:rgb(111, 21, 214)">Home<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
  </nav>
<div>
<h3 style="color:white; background-color:Red;"><?php echo $screenErrorMessage ?></h3>
<h2>Days Absent</h2>
<!-- <h3>($numMeet-$row2['counting'])</h3> -->
</div>
		<table class="table table-striped">
				<tr>
					<th>Date</th>
					<th>Presence</th>
					<th>Comment</th>
				</tr>
				<?php 
				//Check if at least one row is found
				if($isBlank==true){
				}else{
					if($result->num_rows > 0) {
						//Loop through results
						while($row = $result->fetch_assoc()){
							$row3 = $result->fetch_assoc();
							//Display Present Dates
							$output ='<tr>';
							$output .='<td>'.$row['date'].'</td>';
							$output .='<td>'.$row3['comment'].'</td>';
							$output .='</tr>';
							//Echo output
							echo $output;
						}
					} else {
						echo "Sorry, team members where not found";
					}
				}
			?>
		</table>
		<div class="footer">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>