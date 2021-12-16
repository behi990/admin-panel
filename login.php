<?php
$config = mysqli_connect('localhost', 'root', '', 'cms');
if (isset($_POST['login_btn'])) {
    $data = $_POST['frm'];
    $email = $data['email'];
    $password = sha1($data['password']);

    $sql = "SELECT * FROM user_tbl WHERE email='$email' ";
    $row = mysqli_query($config, $sql);
    $result = mysqli_fetch_array($row);
    session_start();
    $_SESSION['first_name'] = $result['first_name'];
    $_SESSION['last_name'] = $result['last_name'];

    $_SESSION['email'] = $result['email'];
    $_SESSION['password'] = $result['password'];
    if ($_SESSION['email'] == $email && $_SESSION['password'] == $password) {
        header('location:welcome.php?hello=user');
        echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " خوش آمدید ";

    }else if ($email == '' || $password == '') {
        header('location:login.php?login_first=false');
    }
    else if ($_SESSION['email'] == $email && $_SESSION['password'] != $password) {
        header('location:login.php?password=wrong');
    }  else if ($_SESSION['email'] != $email && $_SESSION['password'] != $password) {
        header('location:login.php?invalid=user');
    } else {
        header('location:login.php?logout=ok');
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود به داشبورد</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">


    <style>
        @font-face {
            font-family: 'shabnam-400';
            src: url("../fonts/shabnam-400/shabnam-400.eot"),url("../fonts/shabnam-400/shabnam-400.woff"),url("../fonts/shabnam-400/shabnam-400.woff2"),url("../fonts/shabnam-400/shabnam-400.ttf");
            font-weight: normal;
            font-style: normal;
        }
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        
        body{
            font-family: shabnam-400, sans-serif;
            background-color: lightcyan;
        }
        .form_box{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 500px;
            margin: 30px auto;
            border: 1px solid #cccccc;
            border-radius: 8px;
            box-shadow: 5px 5px 10px #5a6268;
            background-color: #869791;
        }
        .form_title{
            font-weight: 700;
            font-size: 28px;
            margin : 0 auto;
            text-align: center;
        }
        .row{
            margin: 15px;
            /*display: flex;*/
            flex-direction: row;
            justify-content: space-between;
        }
        label{
            margin-right: 30px;
            float: right;
        }
        input,select{
            margin-left: 25px !important;
            border-radius: 5px;
        }
        select{
            width: 100px;
        }
        input{
            width: 300px;
        }
        button[name='register'],
        button[name='edit'],
        button[name='enter']{
            margin-right: 20px;
        }
        button[name='cancel'],
        button[name='dismiss']{
            margin-left: 20px;
        }
        select,
        input[name='frm[username]'],
        input[name='frm[email]'],
        input[name='frm[password]'],
        input[type=file],
        input[name='frm[id]']{
            float: left;
            direction: ltr;
        }
        /*************************** user list page styles *********************/
        .main_tbl{
            border: 2px solid #000000;
            width: 98%;
            margin: 20px auto;
        }
        .main_tbl tr{
            text-align: center;
        }
        tr th{
            border: 2px solid #000000;
        }
        th{
            background-color: #5a6268;
            color: #fff3cd;
        }
        tr{
            border: 1px solid #000000;
        }
        .edit_btn:hover,
        .cancel_btn:hover{
            transform: scale(1.1);
            transition: 0.7ms ease;
        }
        .success_alert{
            position: fixed;
            bottom: 0;
            font-family: 'shabnam-400';
            width: 100%;
            padding-right: 10px;
            height: 40px;
            text-align: center;
            font-weight: 500;
            background-color: #1e7e34;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-self: flex-end;
            margin: 0 auto;
        }
        .login_alert1,
        .login_alert2{
            position: fixed;
            bottom: 0;
            font-family: shabnam-400;
            width: 100%;
            padding-right: 10px;
            height: 60px;
            text-align: center;
            font-weight: 500;
            background-color: #bd2130;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-self: flex-end;
            margin: 0 auto;
        }
        .profile_pic{
            margin-left: 30px;
            width: 50px;
        }
    </style>
</head>
<body>
<form action="" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="form_box">
            <div class="row">
                <div class="form_title">ورود به حساب کاربری</div>
            </div>
            <div class="row">
                <label for="frm[email]">ایمیل : </label>
                <input type="email" name="frm[email]" id="">
            </div>
            <div class="row">
                <label for="frm[password]">رمز عبور : </label>
                <input type="password" name="frm[password]" id="">
            </div>
            <div class="row">
                <button class="btn btn-success btn-block" name="login_btn">ورود</button>
                <button class="btn btn-danger btn-block" name="cancel_btn">انصراف</button>
            </div>
            <div class="row">
                <input type="checkbox" name="remember" id="remember" style="width: 20px;">
                <label for="remember" style="display: flex;flex-direction: row;">مرا به خاطر بسپار </label>
            </div>
            <div class="row">
                <div class="row" id="form_footer" style="text-decoration: underline;font-weight: 700;">
                    <a href="../chapter24/form.php">حساب کاربری ندارید؟ثبت نام کنید</a>
                </div>
            </div>
            <div class="row">
                <div class="row" id="form_footer" style="text-decoration: underline;font-weight: 700;">
                    <a href="../chapter24/form.php">فراموشی رمز عبور</a>
                </div>
            </div>

        </div>
    </div>
</form>
<!--
<?php if (isset($_GET['password'])) { ?>
    <div class="login_alert1">رمز ورود اشتباه است،دوباره امتحان کنید</div>
<?php } ?>

<?php if (isset($_GET['invalid'])) { ?>
    <div class="login_alert2">کاربر وجود ندارد</div>
<?php } ?>

<?php if (isset($_GET['login_first'])) { ?>
    <div class="login_alert2">ابتدا وارد حساب کاربری خود شوید</div>
<?php } ?>

<?php if (isset($_GET['hello'])) { ?>
    <div class="success_alert">ورود موفق به حساب کاربری</div>
<?php } ?>

<?php if (isset($_GET['logout'])) { ?>
    <div class="login_alert2">شما با موفقیت از حساب کاربری خود خارج شدید</div>
<?php } ?>
-->

<script src="js/jquery.minV3.6.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>