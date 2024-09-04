<?php

require "config/init.php";
/* 
-* توسعه داده شده توسط تیم کارشناس قهرمان
-* @HeroExpert_ir : کانال تلگرام
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # تمامی اقدامات صفحه ثبت نام کاربر
    if (isset($_POST['signUp'])) {
        $findEmail = findEmail($_POST['email']);
        $findPhone = findPhone($_POST['phone']);

        # اعتبار سنجی داده های کاربر
        if ($findEmail->status) {
            setErrorAndRedirect('ایمیل وارد شده موجود است!', './?action=register');
        }
        if ($findPhone) {
            setErrorAndRedirect('تلفن وارد شده موجود است!', './?action=register');
        }
        if (!createUser($_POST)) {
            setErrorAndRedirect('خطایی رخ داد! لطفا دوباره تلاش کنید', './?action=register');
        } else {
            $_SESSION['email'] = $_POST['email'];
            redirect('./?action=verify');
        }
    }

    # تمامی اقدامات صفحه ورود کاربر
    if (isset($_POST['signIn']) && !empty($_POST['email'])) {
        $userEmaile = $_POST['email'];
        $findEmaile = findEmail($userEmaile);

        if ($findEmaile->status) {
            $_SESSION['email'] = $userEmaile;
            redirect('./?action=verify');
        } else {
            setErrorAndRedirect('ایمیل وارد شده در دسترس نیست!', './');
        }
    }
}

# تمامی اقدامات صفحه تایید کاربر 
if (isset($_GET['action']) && $_GET['action'] == 'verify' && isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];

    # حراز هویت کاربر توسط ایمیل و رمز یکبار مصرف
    if (isset($_SESSION['otpObj']) && isset($_POST['verifySub'])) {
        $verifyCode = $_POST['verifyCode'];

        # احراز هویت ناموفق
        if (!userAuthentication($verifyCode, $userEmail)) {
            setErrorAndRedirect('توکن وارد شده اشتباه است!', './?action=verify');
        }
        # احراز هویت موفق
        setMessageAndRedirect('شما با موفقیت وارد شدید', './');
    }

    if (isset($_SESSION['otpObj']) && $_SESSION['otpObj']->expired >= time()) {
        # ارسال ایمیل مجدد
        sendOtpByEmail($userEmail, $_SESSION['otpObj']->code);
    } else {
        # تولید رمز یکبار مصرف جدید و ارسال به ایمیل کاربر
        $otp = generateOtp();
        $addOtp = updateOtpUser($otp->code, $otp->expired, $userEmail);
        $_SESSION['otpObj'] = $otp;
        sendOtpByEmail($userEmail, $otp->code);
    }
    # انتقال کاربر به صفحه تایید حساب
    includeTpl('tpl/verify-tpl.php');
}

# خارج شدن کاربر از حساب خود
if (isset($_GET['ToDo']) && $_GET['ToDo'] == 'LogOut') {
    setcookie('auth', ' ', time() - 1010, '/');
    redirect('./');
}

# انتقال کاربر به صفحه پنل کاربری
if (isset($_COOKIE['auth'])) {
    includeTpl('tpl/home-tpl.php');
}

# اتقال کاربر به صفحات ورود یا ثبت نام
if (isset($_GET['action']) && $_GET['action'] == 'register') {
    includeTpl('tpl/register-tpl.php');
} else {
    includeTpl('tpl/login-tpl.php');
}

/* 
-* توسعه داده شده توسط تیم کارشناس قهرمان
-* @HeroExpert_ir : کانال تلگرام
*/
?>