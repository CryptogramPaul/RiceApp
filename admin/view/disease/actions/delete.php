<?php
    if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
        header('HTTP/1.1 403 Forbidden');
        die();
    }
    require_once '../../../../conn/connection.php';
    require_once '../../../../functions.php';

    $id = sanitize_input($_POST['id']);
   
  
    try {
        $conn->beginTransaction();

        $sql_delete = $conn->prepare("DELETE FROM disease WHERE disease_id = ?");
        $sql_delete->execute([$id]);
        
        $recommendations = $conn->prepare("DELETE FROM recommendations WHERE type_id = ?");
        $recommendations->execute([$id]);
        
        $treatment = $conn->prepare("DELETE FROM treatment WHERE type_id = ?");
        $treatment->execute([$id]);
       
        $conn->commit();
        echo "success";
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Please Contact System Administrator" . $e->getMessage();
    }
?>