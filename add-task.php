<?php
    require("connect.php");

    $task = strip_tags( $_POST['task'] ); //Get is from new list-item

    $stmt = $dbc->stmt_init();
    $insert = "INSERT INTO list VALUES ('', '$task', '')"; //Add new item to DB
    $result = $dbc->query($insert);

    

    $select = "SELECT * FROM list WHERE checked=0"; //Select all items that are not checked
    $result = $dbc->query($select);
    $stmt->prepare($select);
    $stmt->execute();
  
    while ( $row = $result->fetch_assoc() ) {

        $task_id = $row['id'];
        $task_name = $row['task'];
        $checked = $row['checked'];
                    
        echo "<li class='checked-$checked'><span> $task_name </span><i class='fa fa-circle-thin' aria-hidden='true' id='$task_id'></i><i class='fa fa-times-circle' aria-hidden='true'></i></li>";   
    }
         
?>