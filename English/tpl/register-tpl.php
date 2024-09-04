<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
                <form action="<?= siteUrl('./?action=register') ?>" class="register-form" method="post">
                    <h2 class="register-title">Register</h2>
                    <!-- Name Input -->
                    <div class="register__name-input-container">
                        <input name="name" type="text" class="register__name-input" id="register__name-input">
                        <label for="register__name">Name</label>
                        <i class="fas fa-check-circle valid-feedback-icon"></i>
                        <i class="fas fa-exclamation-circle invalid-feedback-icon"></i>
                        <p class="register__name-input-valid-feedback" id="register__name-input-valid-feedback">
                        </p>
                    </div>
                    <!-- Phone Input -->
                    <div class="register__phone-input-container">
                        <input name="phone" type="text" class="register__phone-input" id="register__phone-input">
                        <label for="register__phone">Phone</label>
                        <i class="fas fa-check-circle valid-feedback-icon"></i>
                        <i class="fas fa-exclamation-circle invalid-feedback-icon"></i>
                        <p class="register__phone-input-valid-feedback" id="register__phone-input-valid-feedback">
                        </p>
                    </div>
                    <!-- Email Input -->
                    <div class="register__email-input-container">
                        <input name="email" type="text" class="register__email-input" id="register__email-input">
                        <label for="register__email">Email Address</label>
                        <i class="fas fa-check-circle valid-feedback-icon"></i>
                        <i class="fas fa-exclamation-circle invalid-feedback-icon"></i>
                        <p class="register__email-input-valid-feedback" id="register__email-input-valid-feedback">
                        </p>
                    </div>

                    <button name="signUp" class="register__submit-btn btn" id="register__submit-btn">Sign Up</button>

                    <p class="sign-in">If You SignUp Before? <a href="<?= siteUrl('./') ?>" class="register__btn" id="register__btn">LOGIN</a></p>
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