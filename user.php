<?php

class User {
    public $id;
    public $date;
    public $ip;
    public $name;
    public $surname;
    public $email;
    public $phone;
    public $theme;
    public $payment;
    public $sender;
    public $disabled;

    const THEMES = ['buisness', 'technology', 'markating'];
    const PAYMENTS = ['web-money', 'yandex', 'paypal', 'card'];

    public static function validateParams($name, $surname, $email, $phone, $theme, $payment, $sender) {
        if (str_contains(trim($name), ' ') or str_contains(trim($surname), ' ') or
        !preg_match('/[^@]+@[^@]+\.[^@]+/', $email) or 
        !preg_match('/\+\d{11}/', $phone) or !in_array($theme, User::THEMES) or
        !in_array($payment, User::PAYMENTS) or !is_bool($sender)) {
            return false;
        }
        return true;
    }

    public static function fromRow($row) {
        $raw_params = explode('|', $row);
        $keys_params = array_keys(get_class_vars('User'));
        $params = [];
        for($i = 0; $i < count($raw_params); $i++) {
            $params[$keys_params[$i]] = $raw_params[$i];
        }
        // echo var_dump($params);

        if (!(count($params) > 0 and User::validateParams($params['name'], $params['surname'],
                                         $params['email'], $params['phone'], $params['theme'],
                                          $params['payment'], (bool)$params['sender']))) {
            return false;
        }
        return new User($params['name'], $params['surname'],
        $params['email'], $params['phone'], $params['theme'],
         $params['payment'], (bool)$params['sender'], $params['id'], $params['disabled']);
    }

    public function __construct($name, $surname, $email, $phone, $theme, $payment, $sender, $id = 0, $disabled = 0) {
        if (!User::validateParams($name, $surname, $email, $phone, $theme, $payment, $sender)) {
            throw new ErrorException('Parameters of new User in incorrect!');
        }
        $this->id = $id;
        if ($id==0) {$this->id = uniqid();}
        $this->date = date('d.m.Y');
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->theme = $theme;
        $this->payment = $payment;
        $this->sender = (int)$sender;
        $this->disabled = $disabled;
    }

    public function makeRow() {
        return implode('|', array_values(get_object_vars($this)));
    }
}