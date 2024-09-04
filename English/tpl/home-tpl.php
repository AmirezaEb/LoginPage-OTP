<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.cdnfonts.com/css/junicode" rel="stylesheet">
    <link rel="stylesheet" href="<?= assets('css/main.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/responsive.css') ?>">
</head>
<!--
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
-->
<body>
    <div class="container">
        <div class="home-container">
            <?php
            if (isset($_COOKIE['auth'])) :
                $user = explode('!-!', encodeORdecode($_COOKIE['auth'])->deCode);
            ?>
                <h1 class="succes-title">Login was Successful</h1>
                <h4 class="registion-date">Date Of Registration : <?= date('Y/F/j', $user['1']) ?></h4>
                <h4 class="userEmail">Your Email : <?= $user['0'] ?></h4>
            <?php else : ?>
                <h1 style="text-align: center; color:red"><a href="<?= siteUrl() ?>">Click To Login</a></h1>
            <?php endif; ?>

            <a class="logOutBtn btn " href="<?= siteUrl('./?ToDo=LogOut') ?>">logOut</a>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
    echo alarm('success', $_SESSION['message'], '24em');
    unset($_SESSION['message']);
}
/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/
?>