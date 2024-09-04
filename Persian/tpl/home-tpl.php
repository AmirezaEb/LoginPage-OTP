<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل کاربر</title>
    <link href="https://fonts.cdnfonts.com/css/junicode" rel="stylesheet">
    <link rel="stylesheet" href="<?= assets('css/main.css') ?>">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= assets('css/responsive.css') ?>">
</head>

<body>
    <div class="container">
        <div class="home-container">
            <?php
            if (isset($_COOKIE['auth'])) :
                $user = explode('!-!', encodeORdecode($_COOKIE['auth'])->deCode);
            ?>
                <h1 class="succes-title">ورود با موفقیت انجام شد</h1>
                <h4 class="registion-date">تاریخ ثبت نام : <?= date('Y/F/j', $user['1']) ?></h4>
                <h4 class="userEmail">ایمیل شما : <?= $user['0'] ?></h4>
            <?php else : ?>
                <h1 style="text-align: center; color:red"><a href="<?= siteUrl() ?>">برای ورود کلیک کنید</a></h1>
            <?php endif; ?>

            <a class="logOutBtn btn " href="<?= siteUrl('./?ToDo=LogOut') ?>">خروج</a>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
    echo alarm('success', $_SESSION['message'], '24em');
    unset($_SESSION['message']);
}
?>