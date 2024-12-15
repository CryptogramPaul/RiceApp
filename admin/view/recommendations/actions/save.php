<?php
    if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
        header('HTTP/1.1 403 Forbidden');
        die();
    }
    require_once '../../../../conn/connection.php';
    require_once '../../../../functions.php';

    // $disease = isset($_FILES['disease_img']) ? $_FILES['disease_img'] : null;
    $disease = sanitize_input($_POST['disease']);
    $recommendations = sanitize_input($_POST['recommendations']);

    try {
        $conn->beginTransaction();

        $sql_insert = $conn->prepare("INSERT INTO recommendations (type, type_id, recommendations)VALUES(?,?,?)");
        $sql_insert->execute(['Disease', $disease, $recommendations ]);
        
        $conn->commit();
        echo "success";
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Please Contact System Administrator" . $e->getMessage();
    }
?>