@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">تغییر اطلاعات</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/change_info') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">نام</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()['name'] }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">رایانامه</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" readonly="readonly" class="form-control" name="email" value="{{ Auth::user()['email'] }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">نام کاربری</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" disabled class="form-control" name="username" value="{{ Auth::user()['username'] }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">رمزعبور جدید</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">تکرار رمز عبور جدید</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">تغییر دسته بندی های مورد علاقه</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/change_favorite_categories') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">
                            <label class="checkbox-inline"><input type="checkbox" name="تیراندازی" {{$category->pull('تیراندازی')}} value="checked">تیراندازی</label>
                            <label class="checkbox-inline"><input type="checkbox" name="اول شخص" {{$category->pull('اول شخص')}} value="">اول شخص</label>
                            <label class="checkbox-inline"><input type="checkbox" name="اکشن" {{$category->pull('اکشن')}} value="">اکشن</label>
                            <label class="checkbox-inline"><input type="checkbox" name="ماجراجویی" {{$category->pull('ماجراجویی')}} value="">ماجراجویی</label>
                            <label class="checkbox-inline"><input type="checkbox" name="ورزشی" {{$category->pull('ورزشی')}} value="">ورزشی</label>
                            <label class="checkbox-inline"><input type="checkbox" name="مهارتی" {{$category->pull('مهارتی')}} value="">مهارتی</label>
                            <label class="checkbox-inline"><input type="checkbox" name="ماشین سواری" {{$category->pull('ماشین سواری')}} value="">ماشین سواری</label>
                            <label class="checkbox-inline"><input type="checkbox" name="فکری" {{$category->pull('فکری')}} value="">فکری</label>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">انتخاب تصویر پروفایل</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/upload_avatar') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="file" name="image">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection