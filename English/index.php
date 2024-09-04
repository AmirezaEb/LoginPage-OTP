<?php

require "config/init.php";

/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # All Register Page Actions
    if (isset($_POST['signUp'])) {
        $findEmail = findEmail($_POST['email']);
        $findPhone = findPhone($_POST['phone']);

        # Validation Data
        if ($findEmail->status) {
            setErrorAndRedirect('The Entered Email Is Available!', './?action=register');
        }
        if ($findPhone) {
            setErrorAndRedirect('The Entered Phone Is Available!', './?action=register');
        }
        if (!createUser($_POST)) {
            setErrorAndRedirect('An Error Occurred! Please Try Again', './?action=register');
        } else {
            $_SESSION['email'] = $_POST['email'];
            redirect('./?action=verify');
        }
    }

    # All Login Page Actions
    if (isset($_POST['signIn']) && !empty($_POST['email'])) {
        $userEmaile = $_POST['email'];
        $findEmaile = findEmail($userEmaile);

        if ($findEmaile->status) {
            $_SESSION['email'] = $userEmaile;
            redirect('./?action=verify');
        } else {
            setErrorAndRedirect('The Entered Email Is Not Available!', './');
        }
    }
}

# All Verify Page Actions
if (isset($_GET['action']) && $_GET['action'] == 'verify' && isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];

    # Verify Email By Token
    if (isset($_SESSION['otpObj']) && isset($_POST['verifySub'])) {
        $verifyCode = $_POST['verifyCode'];

        # User Authentication 
        if (!userAuthentication($verifyCode, $userEmail)) {
            setErrorAndRedirect('The Entered Token Is Wrong!', './?action=verify');
        }
        # SuccessFully Authentication And LogIn
        setMessageAndRedirect('You Have Successfully Logged In', './');
    }

    if (isset($_SESSION['otpObj']) && $_SESSION['otpObj']->expired >= time()) {
        # Send Again Email
        sendOtpByEmail($userEmail, $_SESSION['otpObj']->code);
    } else {
        # Generated A New Otp Token And Send Email
        $otp = generateOtp();
        $addOtp = updateOtpUser($otp->code, $otp->expired, $userEmail);
        $_SESSION['otpObj'] = $otp;
        sendOtpByEmail($userEmail, $otp->code);
    }
    # Include Verify Template
    includeTpl('tpl/verify-tpl.php');
}

# Log Out User
if (isset($_GET['ToDo']) && $_GET['ToDo'] == 'LogOut') {
    setcookie('auth', ' ', time() - 1010, '/');
    redirect('./');
}

# Include Home Template 
if (isset($_COOKIE['auth'])) {
    includeTpl('tpl/home-tpl.php');
}

# Include Register And LogIn Template
if (isset($_GET['action']) && $_GET['action'] == 'register') {
    includeTpl('tpl/register-tpl.php');
} else {
    includeTpl('tpl/login-tpl.php');
}

/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/
?>