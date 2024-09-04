<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/


# Get Url Site Address
function siteUrl(string $uri = ''): string
{
    return BASE_URL . $uri;
}

# Adding Css And Js To Pages
function assets(string $path): string

{
    return siteUrl() . 'assets/' . $path;
}

function includeTpl(string $path): void
{
    include $path;
    die();
}

# Redirect The User To Another Page
function redirect(string $Url = BASE_URL): void
{
    if (!headers_sent()) {
        header("Location: $Url");
    } else {
        echo "<script type='text/javascript'>window.location.href='$Url'</script>";
        echo "<noscript><meta http-equiv='refresh' content='0;url=$Url'/></noscript>";
    }
    exit;
}

# Encode Or Decode String
function encodeORdecode($str)
{
    $result = (object)[
        'deCode' => openssl_decrypt($str, 'AES-128-ECB', '@HeroExpert_ir'),
        'enCode' => openssl_encrypt($str, 'AES-128-ECB', '@HeroExpert_ir')
    ];
    return $result;
}

# Set Message And Redirect User
function setMessageAndRedirect(string $message, string $target): void
{
    $_SESSION['message'] = $message;
    redirect(siteUrl($target));
}

# Set Error Message And Redirect User
function setErrorAndRedirect(string $message, string $target): void
{
    $_SESSION['error'] = $message;
    redirect(siteUrl($target));
}

# Find Email User In DataBase
function findEmail(string $email): object
{
    global $pdo;
    $sql = 'SELECT * FROM users WHERE email = :email;';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return (object)[
        'status' => $result ? true : false,
        'data' => $result
    ];
}

# Find Phone User In DataBase
function findPhone(string $phone): bool
{
    global $pdo;
    $sql = 'SELECT * FROM users WHERE (phone = :phone);';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result ? true : false;
}

/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/

# Create New User In DataBase
function createUser(array $data): bool
{
    global $pdo;
    $sql = 'INSERT INTO users (name,phone,email) VALUES (:name,:phone,:email);';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
    $stmt->bindParam(':phone', $data['phone'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount() ? true : false;
}

# Generate New Disposable Code
function generateOtp(): object
{
    $otpCode = rand(10000, 99999);
    $otpExpired = time() + 300;
    return (object)[
        'code' => $otpCode,
        'expired' => $otpExpired
    ];
}

# Update Disposable Code User In DateBase
function updateOtpUser(string $code, string $expired, string $email): bool
{
    global $pdo;
    $sql = 'UPDATE users SET otpCode = :otpCode, otpExpired = :otpExpired WHERE email = :email;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':otpCode' => $code, ':otpExpired' => date("Y-m-d H:i:s", $expired), ':email' => $email]);
    return $stmt->rowCount() ? true : false;
}

# Authentication User And Set Cookie
function userAuthentication(string $token, string $email): bool
{
    $userInfo = findEmail($email)->data;
    if ($token === $userInfo->otpCode && strtotime($userInfo->otpExpired) > time() && strlen($token) >= 4) {
        $valueCookie = $userInfo->email . '!-!' . strtotime($userInfo->createdAt);
        echo $valueCookie;
        setcookie('auth', encodeORdecode($valueCookie)->enCode, time() + 86400, '/');
        unset($_SESSION['email'], $_SESSION['otpObj']);
        updateOtpUser('', '0001010', $email);
        return true;
    }
    return false;
}

# Display Messages And Errors
function alarm(string $mode, string $message, string $size): string
{
    $alarm = "<script>
    Swal.fire({
        title: '$message',
        icon: '$mode',
        toast: true,
        width: '$size',
        position: 'top-start',
        showConfirmButton: false,
        timer: 3500,
        background: '#d2d6d7',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    })
    </script>";
    return $alarm;
}

/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/

# Send New Disposable Code For User By Email
function sendOtpByEmail($sendToo, $otpCode)
{
    global $email;
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = $email->secure;
    $mail->Port = $email->port;
    $mail->Host = $email->host;
    $mail->Username = $email->userName;
    $mail->Password = $email->passWord;
    $mail->From = $email->userName;
    $mail->FromName = "DO NOT REPLY";
    $mail->addAddress($sendToo, "");
    $mail->isHTML(true);
    $mail->Subject = "OTP Code";
    $mail->Body = "<html dir='rtl'>
    <head> 
    <title>HTML email</title>
    <style> 
        * { 
            direction: ltr;
            text-align: center; 
        } 
        body { 
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .div-container {
            max-width: 480px;
            background-color: #fff;
            width: 360px;
            margin: 3rem auto;
            border-top: 4px solid #713dea;
            border-bottom: 4px solid #713dea;
            border-radius: 1rem;
        }
        
        .header {
   	        text-align: center;
        }

        b { 
            display: block; 
            width: 50%; 
            text-align: center; 
            padding: 1rem; 
            margin: 1rem auto; 
            background-color: #713dea; 
            font-size: 1.2rem; 
            border-radius: .5rem; 
            cursor: pointer; 
            color: #fff;
        } 
 
        h2 { 
            color: #713dea; 
        } 
        .logo-a {
            direction: ltr;
            position: absolute!important;
            left: 15px;
            top: 15px;
        }
        .logo {
            width: 75px;
            height: 40px;
        }
 
        p { 
            margin: 1rem 0; 
            text-align: center; 
            width: 100%; 
        } 
        .resetLogo { 
            max-height: 180px; 
            color: #333; 
        }
        h5 { 
            display: flex;
            text-align: center!important;
            padding: 0rem 100px;
            width: 100%;
            margin: 0rem;
        } 
        .icon-link {
            margin: 16px 4px;
            display: inline;
        }
        .icon { 
            margin: 0 8px; 
            display: inline;
            width: 25px;
            height: 25px;
            max-height: 25px;
            max-width: 25px;   
        }
        .icon-telegram {
            width: 31px;
            height: 31px;
            margin: 0 8px; 
            display: inline;
            max-height: 35px;
            max-width: 35px;  
        }
    </style> 
    </head> 
    <body> 
        <div class='div-container'>
    	    <div class='header'>
    	        <h2>Hero Expert</h2> 
    	    </div>
            <h2>Wellcome/h2> 
            <h3>New OTP Code : <b class='password'>$otpCode</b></h3> 
        </div>
    </body> 
    </html>";
    $mail->AltBody = "";
    $mail->send();
}

/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/
?>