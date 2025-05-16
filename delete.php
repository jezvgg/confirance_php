<?php
require_once 'user.php';
require_once 'database_controller.php';

$controller = new DatabaseController();

$controller->disableUsers($_POST['selected_files']);

header("Location: admin.php");

?>