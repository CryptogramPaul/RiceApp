<?php
    if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
        header('HTTP/1.1 403 Forbidden');
        die();
    }
    require_once '../../../../conn/connection.php';
    require_once '../../../../functions.php';

    $disease = isset($_FILES['disease_img']) ? $_FILES['disease_img'] : null;
    $disease = sanitize_input($_POST['disease']);
    $disease_description = sanitize_input($_POST['disease_description']);
  
    try {
        $conn->beginTransaction();

        $sql_insert_disease = $conn->prepare("INSERT INTO disease (disease_img, disease_name, descriptions)VALUES(?,?,?)");
        $sql_insert_disease->execute([$diease_img, $disease, $disease_description ]);

        $conn->commit();
        echo "success";
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Please Contact System Administrator" . $e->getMessage();
    }
?>