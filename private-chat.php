<?php
    session_start();
    require 'database.php';
    
    //check session id
    header("Content-Type: application/json");
    if(isset($_POST['name'])&&isset($_POST['name'])&&isset($_POST['roompassword'])){
        
        $stmt = $mysqli->prepare("INSERT INTO privaterooms (roomname, creator_id, saltedpass) VALUES (?, ?, ?)");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            echo json_encode(array(
            "success" => false,
            "message" => "Query Prep Failed"
            ));
            exit;
        }
        
        $stmt->bind_param('sis', $_POST['name'], $_SESSION['user_num'], crypt($_POST['roompassword'])); 
        $stmt->execute();
        $stmt->close();
    
        echo json_encode(array(
            "success" => true
        ));
        exit;
    }
    echo json_encode(array(
        "success" => false,
        "message" => "Not all forms filled in correctly"
    ));
    exit;
?>