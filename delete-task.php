<?php
  	require("connect.php");

    $task_id = strip_tags( $_POST['task_id'] ); //Get id from clicked list-item

    $stmt = $dbc->stmt_init();
    $delete = "DELETE FROM list WHERE id='$task_id'"; //delete row from DB 
    $result = $dbc->query($delete);
?>