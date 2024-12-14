<?php
    if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
        header('HTTP/1.1 403 Forbidden');
        die();
    }
    require_once '../../../../conn/connection.php';
    require_once '../../../../functions.php';

    // $disease = isset($_FILES['disease_img']) ? $_FILES['disease_img'] : null;
    $disease = sanitize_input($_POST['disease']);
    $disease_description = sanitize_input($_POST['disease_description']);
    $disease_id = sanitize_input($_POST['disease_id']);
    $NotChange = sanitize_input($_POST['NotChange']);
    $disease_img = null;

  
    try {
        if ($NotChange == 'true') {
            if (isset($_FILES['disease_img']) && $_FILES['disease_img']['error'] == 0) {
                $file = $_FILES['disease_img'];
                $targetDir = "../../../../uploads/";

                // Ensure the upload directory exists
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }

                // Generate a unique file name to avoid collisions
                $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $uniqueFileName = uniqid("disease_", true) . '.' . $fileExtension;
                $targetFile = $targetDir . $uniqueFileName;
                $disease_img = $uniqueFileName;
                
            }
        }else{
            $disease_img = $_POST['disease_img'];
        }



        $conn->beginTransaction();

        $sql_update_disease = $conn->prepare("UPDATE disease SET disease_img = ?, disease_name = ?, descriptions = ? WHERE disease_id = ?");
        $sql_update_disease->execute([$disease_img, $disease, $disease_description, $disease_id]);
        
        if ($NotChange == 'true') {
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                $disease_img = $uniqueFileName; // Save the file name for database entry
            } else {
                throw new Exception("Failed to upload file.");
            }
        }


        $conn->commit();
        echo "success";
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Please Contact System Administrator" . $e->getMessage();
    }
?>