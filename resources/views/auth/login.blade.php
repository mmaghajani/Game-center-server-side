<!doctype html>

<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>ورود</title>
    <meta name="description" content="ورود به سایت">
    <meta name="author" content="mma">

    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/hw2-global.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.rawgit.com/rastikerdar/shabnam-font/v1.0.2/dist/font-face.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<div id="header">
    <ul id="menu" class="container">
        <li id="account" class="account col-xs-6 text-center"><a href="#"><i
                        class="material-icons md-36">account_box</i></a></li>
        <li id="games" class="games col-xs-6 text-center"><a href="#">ceitgames</a></li>
    </ul>
</div>
<div class="container" id="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" id="form">
                <div class="panel-heading" id="title">ورود</div>
                <div class="panel-body" id="form_body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="row field-box col-md-12" id="row1">
                                <div class="col-md-11">
                                    <input id="email" type="email" class="form-control field col-md-8"
                                           placeholder="رایانامه"
                                           name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                <div class="col-md-1">
                                    <i class="material-icons md-36 col-md-4">email</i>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row field-box col-md-12" id="row1">

                                <div class="col-md-11">
                                    <input id="password" type="password" class="form-control field col-md-8"
                                           placeholder="رمز عبور" name="password" required>
                                </div>
                                <div class="col-md-1">
                                    <i class="material-icons md-36 col-md-4">https</i>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-6">
                                <div class="checkbox">
                                    <label>
                                        <div class="row field-box col-md-12" id="accept">
                                            <input id="box" type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : ''}}>
                                            <label for="box" class="label"> مرا به خاطر بسپار</label>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button id="submit_button" type="submit" class="btn btn-primary">
                                    ورود
                                </button>
                                <br>
                                <br>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    رمزمو یادم رفته
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="form_footer" class="panel-footer">
                    حساب کاربری ندارید؟<a href="./register.html"> ثبت نام کنید </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
