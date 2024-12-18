<?php
    if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
        header('HTTP/1.1 403 Forbidden');
        die();
    }
    require_once '../../../../conn/connection.php';
    require_once '../../../../functions.php';

    // $disease = isset($_FILES['disease_img']) ? $_FILES['disease_img'] : null;
    $pest_name = sanitize_input($_POST['pest']);
    $pest_descriptions = sanitize_input($_POST['pest_descriptions']);
    $pest_img = null;

  
    try {
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

        $conn->beginTransaction();

        $sql_insert = $conn->prepare("INSERT INTO pest (pest_img, pest_name, descriptions)VALUES(?,?,?)");
        $sql_insert->execute([$pest_img, $pest_name, $pest_descriptions ]);
        
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $pest_img = $uniqueFileName; // Save the file name for database entry
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