<!DOCTYPE html>
<html>
<head>
	<title>To Do</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="dest/css/style.min.css" type="text/css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<?php require("connect.php"); ?>
	
	<div id="container">

		<div class="list_content">

			<h2>My todo list</h2>

			<ul class="list">
				<?php
				$stmt = $dbc->stmt_init();
	            $select = "SELECT * FROM list WHERE checked=0"; //Select all rows that are not checked
	            $result = $dbc->query($select);
	            $stmt->prepare($select);
	            $stmt->execute();
	          	
	          	$numrows = mysqli_num_rows($result);

			    if($numrows>0){

				   while ( $row = $result->fetch_assoc() ) {

						$task_id = $row['id'];
				    	$task_name = $row['task'];
				    	$checked = $row['checked'];
				    
				    	echo "<li class='checked-$checked'><span> $task_name </span><i class='fa fa-circle-thin' aria-hidden='true' id='$task_id'></i><i class='fa fa-times-circle' aria-hidden='true'></i></li>";   
				    }
				}
				
			    ?>
			</ul>

			<ul class="list-checked">
				<?php
				$stmt = $dbc->stmt_init();
	            $select = "SELECT * FROM list WHERE checked=1"; //Select all rows that are checked
	            $result = $dbc->query($select);
	            $stmt->prepare($select);
	            $stmt->execute();
	          	
	          	$numrows = mysqli_num_rows($result);

			    if($numrows>0){

				   while ( $row = $result->fetch_assoc() ) {

						$task_id = $row['id'];
				    	$task_name = $row['task'];
				    	$checked = $row['checked'];
				    
				    	echo "<li class='checked-$checked'><span> $task_name </span><i class='fa fa-check-circle' aria-hidden='true'></i><i class='fa fa-times-circle' aria-hidden='true' id='$task_id'></i></li>";   
				    }
				}
				
			    ?>
			</ul>

			<form class="add-new-task" name="checkListForm" autocomplete="off">
				<input type="text" name="new-task" placeholder="Add new item..."/>
				<button class="add"><i class="fa fa-plus" aria-hidden="false"></i></button>
			</form>
		</div>

	</div>

	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.0/TweenMax.min.js"></script>
	<script src="dest/js/main.min.js"></script>	
</body>
</html>