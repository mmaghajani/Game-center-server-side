<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game</title>

    <!-- Bootstrap -->
    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//vjs.zencdn.net/5.4.6/video-js.min.css" rel="stylesheet">
    <!--<link href="../node_modules/video.js/dist/video-js.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="/node_modules/owl.carousel/dist/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="/node_modules/owl.carousel/dist/assets/owl.theme.default.css"/>

    <link href="/css/global.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/hw2-global.css">
    <link rel="stylesheet" href="/css/leaderboard.css">
    <link href="/css/game.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.rawgit.com/rastikerdar/shabnam-font/v1.0.2/dist/font-face.css" rel="stylesheet"
          type="text/css"/>
    <link href="/css/ionicons.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
<div class="row col-xs-12 col-lg-12 col-md-12 col-sm-12 navbar-fixed-top primary-bar" id="primary-bar">
    <div class="container col-xs-12 col-lg-8 col-md-8 col-sm-10">
        <nav class="navbar navbar-inverse col-sm-12">
            <div class="container-fluid col-sm-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"
                            id="navbar-collapse-button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="#">WebSiteName</a>-->
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html"><p class="h4 text-muted"><i
                                            class="icon glyphicon ion-ios-game-controller-b"></i> امیرکبیر <span
                                            class="studio"> استودیو </span>
                                </p></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">

                        <li class="navbar-left">
                            @if(Auth::guest())
                                <a href="./login.html"><span class="glyphicon glyphicon-user"></span>
                                    ورود</a>
                            @else
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                خروج
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                        <li>
                                            <a href="{{url('/profile')}}">
                                                صفحه شخصی
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </li>
                        <li class="navbar-left">
                            <form class="navbar-form">
                                <div class="input-group">
                                    <input type="text" id="query-search" class="form-control"
                                           placeholder="جست و جو ...">
                                    <div class="input-group-btn">
                                        <button class="btn btn-toolbar" type="button" onclick="handlerForSearchPanel()">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="row col-xs-12 col-lg-12 col-md-12 col-sm-12" id="header">
    <div id="main-content" class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
        <div id="frame" class="vertical-align-wrap col-xs-12 col-lg-12 col-md-12 col-sm-12">
            <div class="vertical-align--middle">
                <div class="row container col-xs-12 col-sm-10 col-md-8 col-lg-8" id="header-content">
                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 text-left">
                        <a href="{{url('/game_center/'.$game)}}">
                            <button type="button" class="btn-primary h4">شروع بازی</button>
                        </a>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
                        <div class="col-lg-9 col-xs-7 col-sm-9 col-md-9 text-right" id="info-panel">
                            <div class="type row">
                                <p class="h3 text-info"><img src="assets/audio.svg" class="loader text-center"></p>
                                <p class="h5 text-muted "></p>
                            </div>
                            <!--<br>-->
                            <div class="stars row header-star">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5 img-responsive" id="game-pic">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-xs-12 col-lg-12 col-md-12 col-sm-12" id="tab">
    <div class="row col-lg-8 col-sm-8 col-md-8 col-xs-12 container">
        <ul class="nav nav-pills nav-justified" id="menu-pill">
            <li id="info-tab-title" class="active tab-title" onclick="infoClicked()"><a data-toggle="pill" href="#info"
                                                                                        class="text-muted tab-title">اطلاعات
                    بازی</a></li>
            <li id="score-tab-title" class="tab-title" onclick="rankClicked()"><a data-toggle="pill" href="#score-tab"
                                                                                  class="text-muted tab-title">رتبه بندی
                    و امتیازات</a>
            </li>
            <li id="comment-tab-title" class="tab-title" onclick="commentClicked()"><a data-toggle="pill"
                                                                                       href="#comment"
                                                                                       class="text-muted tab-title">نظرات
                    کاربران</a></li>
            <li id="same-game-tab-title" class="tab-title" onclick="sameGameClicked()"><a data-toggle="pill"
                                                                                          href="#same-game"
                                                                                          class="text-muted tab-title">بازی
                    های مشابه</a>
            </li>
            <li id="videos-tab-title" class="tab-title" onclick="galleryClicked()"><a data-toggle="pill" href="#videos"
                                                                                      class="text-muted tab-title">عکس
                    ها و ویدیوها</a></li>
        </ul>
    </div>
</div>
<div class="row col-xs-12 col-lg-12 col-md-12 col-sm-12" id="content-panel">

    <div id="context" class="tab-content col-lg-8 col-md-8 col-sm-10 col-xs-12">
        <div id="info" class="tab-pane fade in active">
            <div class="row title-holder"><p class="text-muted h2">اطلاعات بازی</p></div>
            <br>
            <div id="info-content" class="text-center">
                <img src="assets/audio.svg" class="loader text-center">
            </div>
            <!--<p class="h5 text-primary text-justify"></p>-->
        </div>
        <div id="score-tab" class="tab-pane fade">
            <div class="row title-holder"><p class="text-muted h2">رتبه بندی و امتیازات</p></div>
            <br>
            <div id="content" class="col-sm-12 col-lg-12 col-md-12 col-xs-12">

                <div id="board" class="col-sm-12 col-lg-12 col-md-12 col-xs-12 text-center container">
                    <div id="best" class="row col-lg-8 col-md-10 col-sm-12 col-xs-12 container">
                        <div id="person1" class="col-xs-12 col-sm-3 col-lg-3 col-md-3">
                            <div class="row">
                                <img src="assets/prof2.jpg" class="silver-border">
                                <div class="hexagon-40 level-16md">
                                    ۳۱
                                </div>
                            </div>
                            <br>
                            <div class="h4 row">
                                سروش صحت
                            </div>
                            <br>
                            <div class="h4 row text-warning">
                                ۱۵۰۰۰۰۰۰۰
                            </div>
                        </div>
                        <div id="person2" class="col-xs-12 col-sm-3 col-lg-3 col-md-3">
                            <div class="row">
                                <img src="assets/prof2.jpg" class="gold_border">
                                <div class="hexagon-45 level-18md">
                                    ۳۲
                                </div>
                            </div>
                            <br>
                            <div class="h3 row">
                                کریم عبدالجبار
                            </div>
                            <br>
                            <div class="h3 row text-warning">
                                ۱۵۰۰۰۰۰۰۰
                            </div>
                        </div>
                        <div id="person3" class="col-xs-12 col-sm-3 col-lg-3 col-md-3">
                            <div class="row">
                                <img src="assets/prof2.jpg" class="bronze-border">
                                <div class="hexagon-40 level-16md">
                                    ۲۹
                                </div>
                            </div>
                            <br>
                            <div class="h4 row">
                                الب ارسلان
                            </div>
                            <br>
                            <div class="h4 row text-warning">
                                ۱۵۰۰۰۰۰۰۰
                            </div>
                        </div>
                    </div>
                    <div id="list" class="row">
                        <div class="list-item list-item-header disabled vertical-align-wrap">

                            <div class="list-cell col-xs-1 col-lg-1 h4 vertical-align--middle">
                                رتبه
                            </div>
                            <div class="list-cell col-xs-1 col-lg-1 h4">

                            </div>
                            <div class="list-cell h4 col-xs-1 col-lg-1">
                                بازیکن
                            </div>
                            <div class="information list-cell col-xs-3 col-lg-5 text-success h4">

                            </div>

                            <div class="list-cell col-xs-2 col-lg-1 h4">
                                سطح
                            </div>
                            <div class="list-cell col-xs-2  col-lg-1 h4">
                                تغییر رتبه
                            </div>
                            <div class="list-cell col-xs-2 col-lg-2 h4">
                                امتیاز
                            </div>

                        </div>
                        <img src="assets/audio.svg" class="loader text-center">

                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
        <div id="comment" class="tab-pane fade">
            <div class="row title-holder media">
                <div class="text-left media-middle media-left col-xs-12 col-sm-2">
                    @if(Auth::guest())
                        <a href="login.html">
                            <button type="button" class="btn-primary h5 col-xs-12 col-sm-12 media-object"
                                    data-toggle="modal"
                                    data-target="">نظر دهید
                            </button>
                        </a>
                    @else
                        <button type="button" class="btn-primary h5 col-xs-12 col-sm-12 media-object"
                                data-toggle="modal"
                                data-target="#myModal">نظر دهید
                        </button>
                @endif

                <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content text-right">
                                <form method="POST" action="{{url('/submit_comment')}}">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <input type="text" readonly="readonly" name="title" class="h3"
                                               placeholder="عنوان" value="{{$game}}">
                                    </div>

                                    <div class="modal-body">
                                        <input type="text" name="content" class="h5"
                                               placeholder="نظر خود را بنویسید..." required autofocus>
                                    </div>
                                    <div class="modal-footer row vertical-align-wrap">
                                        <div class="form-group text-right text-muted col-sm-3 col-md-2 col-lg-2 col-xs-4">
                                            <label for="sel1" class="h6">امتیاز دهی :</label>
                                            <select class="form-control" name="score" id="sel1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-primary text-right vertical-align--middle"
                                        >ثبت نظر
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="media-body"><p class="text-muted h2">نظرات کاربران <span
                                class="h6" id="comment-number"></span></p></div>
            </div>
            <div class="row">
                <div id="comments" class="col-sm-12 text-center">
                    <img src="assets/audio.svg" class="loader text-center">
                    <div class="row">

                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="col-sm-8 col-md-8 col-xs-12 col-lg-8 container text-center">
                <div class="col-xs-12">
                    <button type="button" id="next-comment" class="btn-primary h5" onclick="nextComments()">بارگذاری
                        نظرات بعدی
                    </button>
                </div>
            </div>
            <br>
        </div>
        <div id="same-game" class="tab-pane fade">
            <div class="row title-holder"><p class="text-muted h2">بازی های مشابه</p></div>
            <br>
            <div id="related-slider-1" class="col-sm-12 col-md-12 col-xs-12 col-lg-12 text-center">
                <img src="assets/audio.svg" class="loader text-center">
                <div id="related-slider-owl1" class="owl-carousel owl-theme">

                </div>
            </div>
            <div id="related-slider-2" class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
                <div id="related-slider-owl2" class="owl-carousel owl-theme">

                </div>
            </div>
            <div id="related-slider-3" class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
                <div id="related-slider-owl3" class="owl-carousel owl-theme">

                </div>
            </div>
        </div>
        <div id="videos" class="tab-pane fade">
            <div class="row title-holder"><p class="text-muted h2">عکس ها و ویدیوها</p></div>
            <br>
            <div class="row">

                <video id="trailer"
                       class="video-js vjs-default-skin vjs-big-play-centered col-lg-12 col-sm-12 col-md-12 col-xs-12"
                       data-setup='{"techOrder": ["html5"] , "controls": true, "autoplay": false, "preload": "none"}'
                       poster="assets/call-of-duty-background-17.jpg" title="تریلر بازی Battlefield Dragon 4">
                    <div class="vjs-button">Button</div>
                </video>
            </div>
            <div class="slider col-sm-12 col-md-12 col-xs-12 col-lg-12">
                <div id="owl4" class="owl-carousel owl-theme">

                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
</div>
<br>
<br>
<footer>
    <div class="footer-top col-sm-12">
        <div class="container col-lg-8 col-sm-8 col-md-8 col-xs-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a href="index.html">
                        <p class="h4 text-muted"><i
                                    class="icon glyphicon ion-ios-game-controller-b"></i> امیرکبیر <span
                                    class="studio">استودیو</span></p>
                    </a>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" id="menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav">
                                <li><a href="#" class="text-success">حریم خصوصی</a></li>
                                <li><a href="#" class="text-success">سوالات متداول</a></li>
                                <li><a href="#" class="text-success">ارتباط با سازندگان</a></li>
                                <li><a href="#" class="text-success">درباره ما</a></li>
                                <li><a href="index.html" class="text-success">صفحه اصلی</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12" id="social">
                    <a href="http://facebook.com"><i class="ionicons ion-social-facebook social"></i></a>
                    <a href="http://twitter.com"><i class="ionicons ion-social-twitter social"></i></a>
                    <a href="http://instagram.com"><i class="ionicons ion-social-instagram social"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-down col-sm-12 vertical-align-wrap">
        <p class="text-muted h4 text-center vertical-align--middle">تمامی حقوق محفوظ و متعلق به دانشگاه امیرکبیر
            است</p>
    </div>
</footer>

<script src="/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="/js/global.js"></script>
<script src="/js/game.js"></script>
<script src="//vjs.zencdn.net/5.4.6/video.min.js"></script>
<!--<script src="../node_modules/video.js/dist/video.min.js"></script>-->
<!--<script>-->
<!--videojs.options.flash.swf = "../node_modules/videojs-swf/dist/video-js.swf"-->
<!--</script>-->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>