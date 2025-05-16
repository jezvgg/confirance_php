<?php
include_once 'user.php';

$user = new User('adad', 'adad', 'jezv@yandex.ru', '+79246167062', 'buisness', 'yandex', true);
echo var_dump(get_object_vars($user));