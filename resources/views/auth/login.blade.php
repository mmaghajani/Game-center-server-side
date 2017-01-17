<!doctype html>

<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>ورود</title>
    <meta name="description" content="ورود به سایت">
    <meta name="author" content="mma">

    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css"‍ rel="stylesheet">
    <link rel="stylesheet" href="/css/hw2-global.css">
    <link rel="stylesheet" href="/css/login.css">
    <link href="https://cdn.rawgit.com/rastikerdar/shabnam-font/v1.0.2/dist/font-face.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<div id="header">
    <ul id="menu" class="container">
        <li id="account" class="account col-xs-6 text-center"><a href="#"><i class="material-icons md-36">account_box</i></a></li>
        <li id="games" class="games col-xs-6 text-center"><a href="#">ceitgames</a></li>
    </ul>
</div>
<div id="content">
    <div id="form">
        <div id="form_content">
            <div id="title">
                ورود
            </div>
            <div id="form_body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    <div id="row1"><input class="field" type="text" name="firstname"
                                          placeholder="ایمیل یا شماره تلفن">
                        <i class="material-icons md-36">email</i>
                    </div>
                    <br>
                    <div id="row2"><input class="field" type="password" name="lastname"
                                          placeholder="رمز عبور">
                        <i class="material-icons md-36">https</i>
                    </div>
                    <br><br>
                    <input id="submit_button" type="submit" value="ورود">
                </form>
            </div>
            <div id="text_plain"><a href="#"> رمزمو یادم رفته </a></div>
        </div>
        <div id="form_footer">
            حساب کاربری ندارید؟<a href="./register.html"> ثبت نام کنید </a>
        </div>
    </div>
</div>

<script src="/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>