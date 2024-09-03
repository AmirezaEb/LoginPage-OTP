<?php

#---# پیکربندی ثابت ها#---#

const BASE_URL = 'http://localhost/LoginPage-OTP/English/'; # محل قرار گیری فایل
const BASE_PATH = __DIR__ . '/../';

#---# پیکربندی ایمیل #---#

$email = (object)[
    'host' => 'HeroExpert.ir', # هاست ایمیل
    'userName' => 'info@heroexpert.ir', # نام کاربری ایمیل
    'passWord' => '56e80a730b9eae', # رمزعبور ایمیل
    'port' => '507', # پورت ایمیل
    'secure' => 'SSL' # پروتکل امنیتی ایمیل
];

#---# پیکربندی پایگاه داده #---#

$dataBase = (object)[
    'host' => 'localhost',
    'user' => 'root', # نام کربری پایگاه داده
    'password' => '', # رمزعبور پایگاه داده
    'name' => 'heroexpert', # نام پایگاه داده
    'charset' => 'utf8mb4', # کارکتر ست پایگاه داده
];

#---# اتصال به پایگاه داده #---#

try {
    $pdo = new PDO("mysql:host=$dataBase->host;dbname=$dataBase->name;charset=$dataBase->charset", $dataBase->user, $dataBase->password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    # echo "اتصال موفقیت آمیز";
} catch (PDOException $e) {
    echo 'خطا در اتصال : ' . $e->getMessage();
}

/* 
-* توسعه داده شده توسط تیم کارشناس قهرمان
-* @HeroExpert_ir : کانال تلگرام
*/

?>