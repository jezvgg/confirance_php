<?php

class User {
    public $date;
    public $ip;
    public $name;
    public $surname;
    public $email;
    public $phone;
    public $theme;
    public $payment;
    public $sender;
    public $disabled = 0;

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

    public function __construct($name, $surname, $email, $phone, $theme, $payment, $sender) {
        if (!User::validateParams($name, $surname, $email, $phone, $theme, $payment, $sender)) {
            throw new ErrorException('Parameters of new User in incorrect!');
        }
        $this->date = date('d.m.Y');
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->theme = $theme;
        $this->payment = $payment;
        $this->sender = (int)$sender;
    }

    public function makeRow() {
        echo var_dump(get_object_vars($this));
        return implode('|', array_values(get_object_vars($this)));
    }

    // public function fromRow($row) {
    //     if (User::validateParams(explode('|', $row))) {

    //     }
    // }
}