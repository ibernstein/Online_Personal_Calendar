<?php
    session_start();
    require("database.php");
    header("Content-Type: application/json");
    
    if(isset($_SESSION['user_num'])&&isset($_POST['category'])){ 
        $stmt = $mysqli->prepare("select id, name, start, end from events where user_id=? and category=?");
        if(!$stmt){
            echo json_encode(array(
                "message" => "broke in query"       
            ));
            exit;
        } 
        $category = $_POST['category'];
        $stmt->bind_param('is', $_SESSION['user_num'], $category);
        $stmt->execute();
        $stmt->bind_result($id, $name, $start, $end);
        while($stmt->fetch()){
            $temp =  array(
                        
                        id => htmlspecialchars($id),
                        start => htmlspecialchars($start),
                        end => htmlspecialchars($end)
                    );
            $eventArray[htmlspecialchars($name)] = $temp;
        }
        $stmt->close();
        echo json_encode($eventArray);
    } 
?>