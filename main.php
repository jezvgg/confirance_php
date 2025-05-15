<?php
require_once 'user.php';
require_once 'database_controller.php';

$filename = './database.txt';

if (User::validateParams($_POST['name'], $_POST['surname'], $_POST['email'], 
$_POST['phone'], $_POST['theme'], $_POST['payment'], 
(bool)$_POST['email-sender'])) {
    $user = new User($_POST['name'], $_POST['surname'], $_POST['email'], 
    $_POST['phone'], $_POST['theme'], $_POST['payment'], 
    (bool)$_POST['email-sender'], session_id());

    $controller = new DatabaseController();
    echo (int)$controller->saveUser($user);
    if (!$status) {
        # Если запись в БД прошла неудачно, то возращаем ошибку
        http_response_code(500);
    }
    header("Location: confirm.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>