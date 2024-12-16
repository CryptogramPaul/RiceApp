<?php
    if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
        header('HTTP/1.1 403 Forbidden');
        die();
    }
    require_once '../../../../conn/connection.php';
    require_once '../../../../functions.php';

    // $disease = isset($_FILES['symptoms_id']) ? $_FILES['symptoms_id'] : null;
    $disease = sanitize_input($_POST['disease']);
    $symptoms_name = sanitize_input($_POST['symptoms_name']);
    $symptoms_id = sanitize_input($_POST['symptoms_id']);
    $NotChange = sanitize_input($_POST['NotChange']);
    $symptoms_id = null;

  
    try {
        if ($NotChange == 'true') {
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
                $symptoms_id = $uniqueFileName;
                
            }
        }else{
            $symptoms_id = $_POST['symptoms_img'];
        }



        $conn->beginTransaction();

        $sql_update_disease = $conn->prepare("UPDATE symptoms SET disease_id = ?, symptoms_name = ?, symptoms_name = ? WHERE symptoms_id = ?");
        $sql_update_disease->execute([$disease, $symptoms_name, $symptoms_name, $symptoms_id]);
        
        if ($NotChange == 'true') {
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                $symptoms_id = $uniqueFileName; // Save the file name for database entry
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