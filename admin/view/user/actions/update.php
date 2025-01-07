<?php
    if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
        header('HTTP/1.1 403 Forbidden');
        die();
    }
    require_once '../../../../conn/connection.php';
    require_once '../../../../functions.php';

    // $disease = isset($_FILES['disease_img']) ? $_FILES['disease_img'] : null;
    $id = sanitize_input($_POST['id']);
    $firstname = sanitize_input($_POST['firstname']);
    $middlename = sanitize_input($_POST['middlename']);
    $lastname = sanitize_input($_POST['lastname']);
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['lastname']);

    $sql_check = $conn->prepare("SELECT count(id) FROM user WHERE username = ? AND password = ? AND id <> ? ");
    $sql_check->execute([$username,$password, $id]);

    if ($sql_check->fetchColumn(0) > 0) {
        echo "Username and password is already taken.";
        exit();
    }

    try {
        $conn->beginTransaction();

        $sql_insert = $conn->prepare("UPDATE user SET firstname = ?, middlename = ?, lastname = ?, username = ?, password = ? WHERE id = ?");
        $sql_insert->execute([$firstname, $middlename, $lastname,$username, $password, $id ]);
        
        $conn->commit();
        echo "success";
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Please Contact System Administrator" . $e->getMessage();
    }
?>