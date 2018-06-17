<?php

$db["db_host"] = 'localhost';
$db["db_user"] = 'root';
$db["db_pass"] = 'root';
$db["db_name"] = 'cms';
$db["db_port"] = '8889';
$db["db_socket"] = '/Applications/MAMP/tmp/mysql/mysql.sock';

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT, DB_SOCKET);

//if($connection) {
//    echo 'we are connected';
//}
?>