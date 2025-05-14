<?php
require_once 'user.php';

class DatabaseController {
    const DATABASE_PATH = './database.txt';

    public function __construct() {
        if (!file_exists(DatabaseController::DATABASE_PATH)) {
            touch(DatabaseController::DATABASE_PATH);
        }
    }

    public function saveUser($user) {
        # Не получается сделать проверку на user
        $row = $user->makeRow() . PHP_EOL;
        file_put_contents(DatabaseController::DATABASE_PATH, $row, FILE_APPEND);
        return true;
    }
}