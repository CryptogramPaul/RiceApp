<?php
    if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
        header('HTTP/1.1 403 Forbidden');
        die();
    }
    require_once '../../../../conn/connection.php';
    require_once '../../../../functions.php';

    $id = sanitize_input($_POST['id']);
    $pest = sanitize_input($_POST['pest']);
    $recommendations = sanitize_input($_POST['recommendations']);

    try {
        $conn->beginTransaction();

        $sql_insert = $conn->prepare("UPDATE recommendations SET type = ?, type_id = ?, recommendations = ? WHERE id = ?");
        $sql_insert->execute(['Pest', $pest, $recommendations, $id ]);
        
        $conn->commit();
        echo "success";
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Please Contact System Administrator" . $e->getMessage();
    }
?>