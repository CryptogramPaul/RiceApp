<?php
if ( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) { 
    // header("location:../../../error.html");
    header('HTTP/1.1 403 Forbidden');
    die();
}
require_once "../../conn/connection.php";
// require_once "../functions.php";

$username = $_POST['username'];
$password = $_POST['password'];

try {

    $login = $conn->prepare("SELECT a.* FROM user a WHERE a.username = ? and a.password = ? ");
    $login->execute([$username, $password]);
    $fetch_login = $login->fetch();

    if ($login->rowCount() > 0) {
        $user_id = $fetch_login['id'];
        // $user_role = $fetch_login['user_role'];

        setcookie('userid', $user_id, strtotime('+30 days'), "/");
        // setcookie('user_role', $user_role, strtotime('+30 days'), "/");
        echo "success";
    } else {
        echo "Invalid Credentials!";
    }

} catch (PDOException $e) {
    echo "Error!<br>Please Contact Our System Developer" . $e->getMessage();
}