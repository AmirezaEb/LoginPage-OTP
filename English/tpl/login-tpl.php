<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css">
    <link href="https://fonts.cdnfonts.com/css/junicode" rel="stylesheet">
    <link rel="stylesheet" href="<?= assets('css/main.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/responsive.css') ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.11.0/sweetalert2.all.js"></script>
</head>

<!--
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
-->

<body>
    <div class="container">
        <div class="inner-container">
            <div class="form-container">
                <form action="<?= siteUrl('./') ?>" class="sign-in-form" method="post">
                    <h2 class="sign-in-title">Login</h2>
                    <div class="sign-in__name-input-container">
                        <input name="email" type="text" class="sign-in__name-input" id="sign-in__name-input">
                        <label for="sign-in__name">Email Address</label>
                        <i class="fas fa-check-circle valid-feedback-icon"></i>
                        <i class="fas fa-exclamation-circle invalid-feedback-icon"></i>
                        <p class="sign-in__name-input-valid-feedback" id="sign-in__name-input-valid-feedback">
                        </p>
                    </div>
                    <button name="signIn" class="sign-in__submit-btn btn" id="sign-in__submit-btn">SIGNIN</button>

                    <p class="register">If You Don't SignUp Before<a href="<?= siteUrl('./?action=register') ?>" class="register__btn" id="register__btn">REGISTER</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= assets('js/app.js') ?>"></script>
</body>

</html>
<?php
if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
    echo alarm('error', $_SESSION['error'], '24em');
    unset($_SESSION['error']);
} elseif (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
    echo alarm('success', $_SESSION['message'], '24em');
    unset($_SESSION['message']);
}
/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/
?>