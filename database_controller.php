<?php
require_once 'user.php';

class DatabaseController {
    const DATABASE_PATH = './database.txt';

    public function __construct() {
        if (!file_exists(DatabaseController::DATABASE_PATH)) {
            touch(DatabaseController::DATABASE_PATH);
        }
    }

    protected function dumpDatabase($users) {
        file_put_contents(DatabaseController::DATABASE_PATH, '');
        foreach($users as $user) {
            echo var_dump($user);
            $this->saveUser($user);
        }
    }

    public function saveUser($user) {
        # Не получается сделать проверку на user
        $row = $user->makeRow() . PHP_EOL;
        file_put_contents(DatabaseController::DATABASE_PATH, $row, FILE_APPEND);
        return true;
    }

    public function loadAllUsers() {
        $database = file(DatabaseController::DATABASE_PATH);
        $users = [];
        foreach($database as $row) {
            $users[] = User::fromRow($row);
        }
        return $users;
    }

    public function disableUsers($disabling_users) {
        $users = $this->loadAllUsers();
        foreach($users as $user) {
            echo $user->id . PHP_EOL;
            echo var_dump(in_array($user->id, $disabling_users)) . PHP_EOL;
            if (in_array($user->id, $disabling_users)) {
                $user->disabled=true;
                echo 'Suk';
            }
        }
        $this->dumpDatabase($users);
    }
    
}