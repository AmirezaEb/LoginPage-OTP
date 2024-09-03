<?php

#---# Constants Config#---#

const BASE_URL = 'http://localhost/LoginPage-OTP/English/'; # Source Url
const BASE_PATH = __DIR__ . '/../';

#---# Mail Config #---#

$email = (object)[
    'host' => 'HeroExpert.ir', # Email Host
    'userName' => 'info@heroexpert.ir', # Email UserName
    'passWord' => '56e80a730b9eae', # Email Password
    'port' => '507', # Email Port
    'secure' => 'SSL' # Email Secure
];

#---# DataBase Config #---#

$dataBase = (object)[
    'host' => 'localhost',
    'user' => 'root', # DataBase UserName
    'password' => '', # DataBase Password
    'name' => 'heroexpert', # DataBase Name
    'charset' => 'utf8mb4', # DataBase Charset
];

#---# DataBase Connect #---#

try {
    $pdo = new PDO("mysql:host=$dataBase->host;dbname=$dataBase->name;charset=$dataBase->charset", $dataBase->user, $dataBase->password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    # echo "Connecting Successfully";
} catch (PDOException $e) {
    echo 'Connect Failed : ' . $e->getMessage();
}

/* 
-* Developed by Hero Expert 
-* Telegram channel: @HeroExpert_ir
*/

?>