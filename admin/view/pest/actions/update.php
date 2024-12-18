<?php
    if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
        header('HTTP/1.1 403 Forbidden');
        die();
    }
    require_once '../../../../conn/connection.php';
    require_once '../../../../functions.php';

    // $pest = isset($_FILES['pest_img']) ? $_FILES['pest_img'] : null;
    $pest = sanitize_input($_POST['pest']);
    $pest_descriptions = sanitize_input($_POST['pest_descriptions']);
    $pest_id = sanitize_input($_POST['pest_id']);
    $NotChange = sanitize_input($_POST['NotChange']);
    $pest_img = null;

  
    try {
        if ($NotChange == 'true') {
            if (isset($_FILES['pest_img']) && $_FILES['pest_img']['error'] == 0) {
                $file = $_FILES['pest_img'];
                $targetDir = "../../../../uploads/";

                // Ensure the upload directory exists
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }

                // Generate a unique file name to avoid collisions
                $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $uniqueFileName = uniqid("pest_", true) . '.' . $fileExtension;
                $targetFile = $targetDir . $uniqueFileName;
                $pest_img = $uniqueFileName;
                
            }
        }else{
            $pest_img = $_POST['pest_img'];
        }



        $conn->beginTransaction();

        $sql_update = $conn->prepare("UPDATE pest SET pest_img = ?, pest_name = ?, descriptions = ? WHERE id = ?");
        $sql_update->execute([$pest_img, $pest, $pest_descriptions, $pest_id]);
        
        if ($NotChange == 'true') {
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                $pest_img = $uniqueFileName; // Save the file name for database entry
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