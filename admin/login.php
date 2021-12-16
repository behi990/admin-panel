<?php
include_once '../include/user_functions.php';
if (isset($_POST['login_btn'])) {
    $data = $_POST['frm'];
    user_login($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>ورود به بخش مدیریت</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">همین حالا وارد شوید</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" name="frm[username]" placeholder="نام کاربری" autofocus>
            <input type="password" class="form-control" name="frm[password]" placeholder="کلمه عبور">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> مرا به خاطر بسپار
            </label>
            <span class="pull-right"> <a href="#"> کلمه عبور را فراموش کرده اید؟</a></span>
            <button class="btn btn-lg btn-login btn-block" name="login_btn" type="submit">ورود</button>
            <p>یا توسط یکی از حسابهای شبکه اجتماعی خود وارد شوید</p>
            <div class="login-social-link">
                <a href="#" class="facebook">
                    <i class="icon-facebook"></i>
                    Facebook
                </a>
                <a href="#" class="google">
                    <i class="icon-google-plus"></i>
                    Google
                </a>
            </div>
        </div>
    </form>
    <?php if(isset($_GET['password'])){ ?>
        <div class="alert-danger" style="height: 40px;text-align: center;display : flex;align-items: center;justify-content: center;">رمز ورود اشتباه است</div>
    <?php } ?>

    <?php if(isset($_GET['login'])){ ?>
        <div class="alert-success" style="height: 40px;text-align: center;display : flex;align-items: center;justify-content: center;">به بخش مدیریت خوش آمدید</div>
    <?php } ?>

    <?php if(isset($_GET['login_first'])){ ?>
        <div class="alert-danger" style="height: 40px;text-align: center;display : flex;align-items: center;justify-content: center;">ابتدا به حساب کاربری خود وارد شوید</div>
    <?php } ?>
</div>
</body>
</html>
