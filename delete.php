<?php
require_once 'user.php';
require_once 'database_controller.php';

$controller = new DatabaseController();

$controller->disableUsers($_POST['selected_files']);

echo var_dump($_POST['selected_files']);

?>