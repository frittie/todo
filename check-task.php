<?php
    require("connect.php");

    $task_id = strip_tags( $_POST['task_id'] ); //Get id of the checked list-item

    $stmt = $dbc->stmt_init();
    $check = "UPDATE list SET checked=1 WHERE id='$task_id'"; //Update DB if the list-item is checked
    $result = $dbc->query($check);