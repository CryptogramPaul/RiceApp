<?php
    if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
        header('HTTP/1.1 403 Forbidden');
        die();
    }
    require_once '../../../../conn/connection.php';
    require_once '../../../../functions.php';

    // $disease = isset($_FILES['symptoms_img']) ? $_FILES['symptoms_img'] : null;
    $disease = sanitize_input($_POST['disease']);
    $symptoms_name = sanitize_input($_POST['symptoms_name']);
    $symptoms_img = null;

  
    try {
        if (isset($_FILES['symptoms_img']) && $_FILES['symptoms_img']['error'] == 0) {
            $file = $_FILES['symptoms_img'];
            $targetDir = "../../../../uploads/";

            // Ensure the upload directory exists
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Generate a unique file name to avoid collisions
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $uniqueFileName = uniqid("symptoms_", true) . '.' . $fileExtension;
            $targetFile = $targetDir . $uniqueFileName;
            $symptoms_img = $uniqueFileName;
            
        }

        $conn->beginTransaction();

        $sql_insert_disease = $conn->prepare("INSERT INTO symptoms (symptoms_img, symptoms_name, disease_id)VALUES(?,?,?)");
        $sql_insert_disease->execute([$symptoms_img, $symptoms_name, $disease ]);
        
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $symptoms_img = $uniqueFileName; // Save the file name for database entry
        } else {
            throw new Exception("Failed to upload file.");
        }

        $conn->commit();
        echo "success";
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Please Contact System Administrator" . $e->getMessage();
    }
?>