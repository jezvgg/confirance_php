<?php
require_once 'user.php';

class DatabaseController {
    private $db;

    private $insert;
    private $select;
    private $disable;

    public function __construct() {
        $this->db = new PDO(
            'mysql:host=localhost:3306;dbname=your_database_name',
            'your_username',
            'your_password'
        );
        $this->insert = $this->db->prepare('INSERT INTO Users VALUE (:id, :date, :ip, :name, :surname, 
                        :email, :phone, :theme, :payment, :sender, :disabled)');
        $this->select = $this->db->prepare('SELECT * FROM Users');
        $this->disable = $this->db->prepare('UPDATE Users SET `disabled` = 1 WHERE `id`=\':id\'');
    }

    public function saveUser($user) {
        $this->insert->execute(get_object_vars($user));
    }

    public function loadAllUsers() {
        $this->select->execute();
        $users = [];
        foreach($this->select->fetchAll() as $params) {
            $users[] = new User($params['name'], $params['surname'],
            $params['email'], $params['phone'], $params['theme'],
             $params['payment'], (bool)$params['sender'], $params['id'], $params['disabled']);
        }
        return $users;
    }

    public function disableUsers($users) {
        foreach($users as $user) {
            $this->disable->execute($user->id);
        }
    }
    
}