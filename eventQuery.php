<?php
    session_start();
    require("database.php");
    header("Content-Type: application/json");
    echo json_encode(array(
        "message" => "pre issest"
    ));
    if(isset($_SESSION['user_num'])&&isset($_POST['category'])){
        $stmt = $mysqli->prepare("select name, start, end from events where user_id=? and category=?");
        if(!$stmt){
            echo json_encode(array(
                "message" => "broke in query"       
            ));
            exit;
        } 
        $category = $_POST['category'];
        $stmt->bind_param('is', $_SESSION['user_num'], $category);
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
    }   
?>