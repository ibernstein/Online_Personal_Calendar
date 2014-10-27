<?php
    session_start();
    require(database.php);
    header("Content-Type: application/json");
    $stmt = $mysqli->prepare("select name, start, end from stories where category=?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    } 
    $category = $_POST['category'];
    $stmt->bind_param('s', $category);
    $stmt->execute();
    $stmt->bind_result($name, $start, $end);
    while($stmt->fetch()){
        echo json_encode(array(
                            "name" => htmlspecialchars($name),
                            "start" => htmlspecialchars($start),
                            "end" => htmlspecialchars($end)        
                        ));
            
    }
    $stmt->close();
?>