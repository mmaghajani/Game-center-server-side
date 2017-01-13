<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Game;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $slider = $this->makeSlider();
        $new_games = $this->makeNewGames();
        $comments = $this->getComments();
        $tutorials = $this->getTutorials();

        $homepage = ["slider" => $slider, "new_games" => $new_games, "comments" => $comments , "tutorials" => $tutorials];
        $result = ["homepage" => $homepage];
        $response = ["ok" => true, "result" => $result];
        $final = ["response" => $response];
        return $final;
    }

    private function getComments()
    {
        return Comment::query()->orderBy('created_at', 'desc')->take(5)->get();
    }

    private function makeSlider()
    {
        $slider = array();
        $categories = Category::all();
        $index = 0;
        foreach ($categories as $category) {
            $games = $category->games;
            $popularGame = $this->findPopularGame($games);
            $slider[$index] = $popularGame;
            $index++;
        }

        return $slider;
    }

    private function findPopularGame($gamesCategory)
    {
        $popularGame = new Game();
        $rate = 0;
        foreach ($gamesCategory as $gameCategory) {
            $game = $gameCategory->game;
            if ($game->rate > $rate) {
                $rate = $game->rate;
                $popularGame = $game;
            }
        }

        return $popularGame;
    }

    private function makeNewGames()
    {
        $newGames = Game::query()->orderBy('created_at', 'desc')->take(5)->get();
        return $newGames;
    }

    private function getTutorials()
    {
        return ["title"=>"راهنمای بازی The Last Guardian","date"=>"۲۵ دی ۱۳۹۵" , "game" =>[
            "title" => "بازی The Last Guardian" , "abstract" => "هفت سال انتظار برای انتشار یک بازی که روند ساختش فراز و نشیب‌های بسیاری از سر گذارند اصلاً اتفاق رایجی در دنیای بازی‌های ویدیویی نیست. اما «آخرین نگهبان» هم یک بازی معمولی نیست...",
            "info" => '<p>هفت سال انتظار برای انتشار یک بازی که روند ساختش فراز و نشیب&zwnj;های بسیاری از سر گذارند اصلاً اتفاق رایجی در دنیای بازی&zwnj;های ویدیویی نیست. اما «آخرین نگهبان» هم یک بازی معمولی نیست، کافیست نگاهی به آثار پیشین سازندگان آن بیاندازیم تا ببینیم آن&zwnj;ها چه دنیاهایی خلق کرده&zwnj;اند. استودیوی&zwnj;های جن&zwnj;دیزاین و ژاپن استودیو به رهبری فومیتو اوئدا، بار دیگری اثری خلق کردند که تنها مشابهانش را در بازی&zwnj;های گذشته&zwnj;ش خودشان می&zwnj;تواند پیدا کرد. بن&zwnj;مایه&zwnj;ی بازی رابطه&zwnj;ی غیرمعمول پسر بچه و موجودی فرازمینی است که در طول آشنایی با یکدیگر، ماجراهای زیادی از سر می&zwnj;گذارنند.</p><p>اما شاید حالا که بازی منتشر شده، مهم&zwnj;ترین خبر در مورد بازی نظر منتقدین نسبت به بازی باشد. با توجه به نمره&zwnj;های منتشر شده، با یک بازی شاخص طرف هستیم که البته بازه&zwnj;ی نمرات از ۴ تا ۱۰ را در بر می&zwnj;گیرد. اینطور که از ابتدا هم به نظر می&zwnj;رسید، The Last Guardian یک بازی کاملاً سلیقه&zwnj;ای است که هرکسی نمی&zwnj;تواند با آن ارتباط برقرار کند. منتقدین در مجموع اتمسفر و دنیای بازی، شخصیت&zwnj;پردازی و گرافیک هنری بازی را تحسین کرده&zwnj;اند و از مشکلات فنی مانند کنترل دوربین نالیده&zwnj;اند. در ادامه می&zwnj;توانید خلاصه&zwnj;ی نقد چند وبسایت معتبر بازی&zwnj;های رایانه&zwnj;ای را مطالعه کنید و البته بررسی ویدیویی و متنی زومجی از The Last Guardian را هم هفته&zwnj;ی آینده از دست ندهید.</p><h3>The Last Guardian</h3><ul><li><strong><strong>سازنده: </strong></strong>جن&zwnj;دیزاین، ژاپن استودیو</li><li><strong><strong><strong>سبک: </strong></strong></strong>ماجراجویی</li><li><strong><strong>پلتفرم: </strong></strong>پلی&zwnj;استیشن 4<strong><strong><br></strong></strong></li><li><strong>تاریخ انتشار:</strong> ۱۶ آذر</li></ul><p><img src=\"http://cdn.zoomg.ir/2016/11/7b62a451-3ae4-46ec-b7f0-75a503cd26ea.jpg\" alt=\"the last guardian\"></p><h2>'
            , "rate" => "3.8" , "number_of_comments" => 5 , "large_image" => "http://cdn.zoomg.ir/2016/11/7b62a451-3ae4-46ec-b7f0-75a503cd26ea.jpg" ,
            "small_image" => "http://cdn.zoomg.ir/2016/11/7b62a451-3ae4-46ec-b7f0-75a503cd26ea.jpg",
            "categories" => array("اکشن" , "ماجراجویی")
        ]] ;
    }
}
