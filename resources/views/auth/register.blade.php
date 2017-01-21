<!doctype html>

<html lang="fa" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">

    <title>ثبت نام</title>
    <meta name="description" content="ثبت نام در سایت">
    <meta name="author" content="mma">

    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/hw2-global.css">
    <link rel="stylesheet" href="/css/register.css">
    <link href="https://cdn.rawgit.com/rastikerdar/shabnam-font/v1.0.2/dist/font-face.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<div id="header">
    <ul id="menu" class="container">
        <li id="account" class="account col-xs-6 col-md-6 col-lg-6 col-sm-6 text-center"><a href="/login"><i
                        class="material-icons md-36">account_box</i></a></li>
        <li id="games" class="games col-xs-6 col-md-6 col-lg-6 col-sm-6 text-center"><a href="/home">ceitgames</a></li>
    </ul>
</div>
<div class="container" id="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" id="form">
                <div class="panel-heading" id="title">ثبت نام</div>
                <div class="panel-body" id="form_body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="row field-box col-md-12" id="row1">

                                <div class="col-md-11" >
                                    <input id="name" type="text" class="form-control field col-md-8" name="name"
                                           placeholder="نام"
                                           value="{{ old('name') }}"
                                           required autofocus>
                                </div>
                                <div class="col-md-1">
                                    <i class="material-icons md-36 col-md-4">person</i>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            {{--<label for="name" class="col-md-4 control-label">نام</label>--}}

                            <div class="row field-box col-md-12">
                                <div class="col-md-11">
                                    <input id="username" type="text" class="form-control field" name="username"
                                           placeholder="نام کاربری" value="{{ old('name') }}"
                                           required autofocus>
                                </div>
                                <div class="col-md-1">
                                    <i class="material-icons md-36 col-md-4">account_circle</i>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{--<label for="email" class="col-md-4 control-label">رایانامه</label>--}}

                            <div class="row field-box col-md-12">
                                <div class="col-md-11">
                                    <input id="email" type="email" class="form-control field" name="email"
                                           placeholder="رایانامه"
                                           value="{{ old('email') }}" required>
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
                            {{--<label for="password" class="col-md-4 control-label">رمز عبور</label>--}}

                            <div class="row field-box col-md-12">
                                <div class="col-md-11">
                                    <input id="password" type="password" class="form-control field"
                                           placeholder="رمز عبور"
                                           name="password" required>
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
                            {{--<label for="password-confirm" class="col-md-4 control-label">تکرار رمز عبور</label>--}}

                            <div class="row field-box col-md-12">
                                <div class="col-md-11">
                                    <input id="password-confirm" type="password" class="form-control field"
                                           placeholder="تکرار رمز عبور" name="password_confirmation" required>
                                </div>
                                <div class="col-md-1">
                                    <i class="material-icons md-36 col-md-4">https</i>
                                </div>
                            </div>
                        </div>

                        <div class="row field-box col-md-12" id="accept">
                            <input id="box" type="checkbox" name="rules" value="false"><label for="box" class="label"><a href="#">قوانین</a> را می پذیرم</label>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn" id="submit_button">
                                    ثبت نام
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
