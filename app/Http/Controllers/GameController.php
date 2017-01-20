<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    //
    public function header($title)
    {
        $game = $this->getGameWithTitle($title);

        $result = ["game" => $game];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function infoTab($title)
    {
        $game = $this->getGameWithTitle($title);

        $result = ["game" => $game];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function leaderBoardTab($title)
    {
        $game = $this->getGameWithTitle($title);

        $records = $game->records->load('user')->sortByDesc('score')->values();
        $records = $records->map(function ($item, $key) {
            return ['score' => $item['score'], 'level' => $item['level'], 'displacement' => $item['displacement'],
                'player' => $item['user']];
        });
        $result = ["leaderboard" => $records];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function commentsTab($title)
    {
        $game = $this->getGameWithTitle($title);

        $comments = $game->comments->load('user', 'game')->sortByDesc('created_at')->values();
        $comments = $comments->map(function ($item, $key) {
            return ['text' => $item['text'], 'rate' => $item['rate'], 'date' => $item['date'],
                'player' => $item['user'], 'game' => $item['game']];
        });

        $cut_point = rand(1, $comments->count());
        $comments = $comments->slice(0, $cut_point);

        $result = ["comments" => $comments];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function commentsOffset($title, Request $request)
    {
        $url = $request->fullUrl();
        $offset = intval(explode('=', explode('?', $url)[1])[1]);

        $game = $this->getGameWithTitle($title);
        $comments = $game->comments->load('user', 'game')->sortByDesc('created_at')->values();

        $comments = $comments->map(function ($item, $key) {
            return ['text' => $item['text'], 'rate' => $item['rate'], 'date' => $item['date'],
                'player' => $item['user'], 'game' => $item['game']];
        });
        $remainingComments = array_slice($comments->toArray(), $offset);

        $result = ["comments" => $remainingComments];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function relatedGamesTab($title)
    {
        $game = $this->getGameWithTitle($title);
        $categories = $game->categories;
        $collection = collect();
        foreach ($categories as $category) {
            $category_record = Category::all()->where('title', '=', $category)->pop();
            foreach ($category_record->games->load('categories') as $game) {
                $fgame = $this->fetchCategory($game);
                $collection->push($fgame);
            }

        }

        $result = ["games" => $collection->unique('title')->values()];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function galleryTab()
    {
        return ['response' => ['ok' => true, 'result' => ['gallery' => ['images' => [['title' => 'Last Guardian', 'views' => '5', 'url' => 'http://static1.gamespot.com/uploads/scale_super/1197/11970954/2886481-tlg_e315_04.jpg'],
            ['title' => 'Last Guardian', 'views' => '5', 'url' => 'http://static1.gamespot.com/uploads/scale_super/1197/11970954/2886481-tlg_e315_04.jpg'],
            ['title' => 'Last Guardian', 'views' => '5', 'url' => 'http://static3.gamespot.com/uploads/original/mig/7/8/4/7/1667847-952634_20110302_003.jpg'],
            ['title' => 'Last Guardian', 'views' => '5', 'url' => 'http://static3.gamespot.com/uploads/original/mig/7/8/4/7/1667847-952634_20110302_003.jpg'],
            ['title' => 'Last Guardian', 'views' => '5', 'url' => 'http://static1.gamespot.com/uploads/scale_super/1197/11970954/2886481-tlg_e315_04.jpg']], 'videos' => [['title' => 'Last Guardian', 'views' => '5', 'url' => 'http://as4.tabriz.asset.aparat.com/aparat-video/33599344cedadecf865082b9c469cc6f5900322-360p__48466.mp4']]]]]];
    }

    public function submitComment(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();

//        dd(html_entity_decode($input['title']));
        $comment = new Comment;
        $truthContent = htmlentities($input['content']);
        $comment->text = $truthContent;
        $comment->rate = $input['score'];
        $comment->user_id = $user->id;
        $game = Game::all()->where('title', '=', html_entity_decode($input['title']));
        $game = $game->pop();


        $date = $this->formatDateToJalaliString();

        $comment->date = $date;

        $comment->game_id = $game->id;

        $comment->save();

        return redirect('/home');
    }

    private function formatDateToJalaliString()
    {
        $s = "";

        $date = $this->mds_date("Y-D-A-L-Z-a-m-d-y");
        $date = html_entity_decode($date);
        $date = explode('-', $date);
        $year = $date[0];
        $month = $date[6];
        $day = $date[7];


        $x = intval($year);

        $x = strval($x);
        $x = strrev($x);
        $x = intval($x);

        $yearS = "";
        while ($x > 0) {
            switch (strval($x % 10)) {
                case "0":
                    $yearS .= "۰";
                    break;
                case "1":
                    $yearS .= "۱";
                    break;
                case "2":
                    $yearS .= "۲";
                    break;
                case "3":
                    $yearS .= "۳";
                    break;
                case "4":
                    $yearS .= "۴";
                    break;
                case "5":
                    $yearS .= "۵";
                    break;
                case "6":
                    $yearS .= "۶";
                    break;
                case "7":
                    $yearS .= "۷";
                    break;
                case "8":
                    $yearS .= "۸";
                    break;
                case "9":
                    $yearS .= "۹";
                    break;
            }

            $x = intval($x / 10);
        }

        $monthS = "";
        switch ($month) {
            case "01":
                $monthS .= "فروردین";
                break;
            case "02":
                $monthS .= "اردیبهشت";
                break;
            case "03":
                $monthS .= "خرداد";
                break;
            case "04":
                $monthS .= "تیر";
                break;
            case "05":
                $monthS .= "مرداد";
                break;
            case "06":
                $monthS .= "شهریور";
                break;
            case "07":
                $monthS .= "مهر";
                break;
            case "08":
                $monthS .= "آبان";
                break;
            case "09":
                $monthS .= "آذر";
                break;
            case "10":
                $monthS .= "دی";
                break;
            case "11":
                $monthS .= "بهمن";
                break;
            case "12":
                $monthS .= "اسفند";
                break;
        }


        $x = intval($day);

        $x = strval($x);
        $x = strrev($x);
        $x = intval($x);

        $dS = "";
        while ($x > 0) {

            switch (strval($x % 10)) {
                case "0":
                    $dS .= "۰";
                    break;
                case "1":
                    $dS .= "۱";
                    break;
                case "2":
                    $dS .= "۲";
                    break;
                case "3":
                    $dS .= "۳";
                    break;
                case "4":
                    $dS .= "۴";
                    break;
                case "5":
                    $dS .= "۵";
                    break;
                case "6":
                    $dS .= "۶";
                    break;
                case "7":
                    $dS .= "۷";
                    break;
                case "8":
                    $dS .= "۸";
                    break;
                case "9":
                    $dS .= "۹";
                    break;
            }


            $x = intval($x / 10);
        }


        $s = $dS . " " . $monthS . " " . $yearS;


        return $s;
    }

    private function getGameWithTitle($title)
    {
        $game = Game::with('categories')->where('title', '=', $title)->get();

        $game = $this->fetchCategory($game[0]);
        return $game;
    }

    private function createFinalResponse($result)
    {
        $response = ["ok" => true, "result" => $result];
        $final = ["response" => $response];
        return $final;
    }

    private function fetchCategory($game)
    {
        foreach ($game->categories as $key) {
            $game->categories->prepend($key->title);
            $game->categories->pop();
        }

        return $game;
    }


    function mds_date($format, $when = "now", $persianNumber = 0)
    {
        ///chosse your timezone
        $TZhours = 0;
        $TZminute = 0;
        $need = "";
        $result1 = "";
        $result = "";
        if ($when == "now") {
            $year = date("Y");
            $month = date("m");
            $day = date("d");
            list($Dyear, $Dmonth, $Dday) = $this->gregorian_to_mds($year, $month, $day);
            $when = mktime(date("H") + $TZhours, date("i") + $TZminute, date("s"), date("m"), date("d"), date("Y"));
        } else {
            //$when=0;
            $when += $TZhours * 3600 + $TZminute * 60;
            $date = date("Y-m-d", $when);
            list($year, $month, $day) = preg_split('/-/', $date);

            list($Dyear, $Dmonth, $Dday) = $this->gregorian_to_mds($year, $month, $day);
        }

        $need = $when;
        $year = date("Y", $need);
        $month = date("m", $need);
        $day = date("d", $need);
        $i = 0;
        $subtype = "";
        $subtypetemp = "";
        list($Dyear, $Dmonth, $Dday) = $this->gregorian_to_mds($year, $month, $day);
        while ($i < strlen($format)) {
            $subtype = substr($format, $i, 1);
            if ($subtypetemp == "\\") {
                $result .= $subtype;
                $i++;
                continue;
            }

            switch ($subtype) {

                case "A":
                    $result1 = date("a", $need);
                    if ($result1 == "pm") $result .= "&#1576;&#1593;&#1583;&#1575;&#1586;&#1592;&#1607;&#1585;";
                    else $result .= "&#1602;&#1576;&#1604;&#8207;&#1575;&#1586;&#1592;&#1607;&#1585;";
                    break;

                case "a":
                    $result1 = date("a", $need);
                    if ($result1 == "pm") $result .= "&#1576;&#46;&#1592;";
                    else $result .= "&#1602;&#46;&#1592;";
                    break;
                case "d":
                    if ($Dday < 10) $result1 = "0" . $Dday;
                    else    $result1 = $Dday;
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "D":
                    $result1 = date("D", $need);
                    if ($result1 == "Thu") $result1 = "&#1662;";
                    else if ($result1 == "Sat") $result1 = "&#1588;";
                    else if ($result1 == "Sun") $result1 = "&#1609;";
                    else if ($result1 == "Mon") $result1 = "&#1583;";
                    else if ($result1 == "Tue") $result1 = "&#1587;";
                    else if ($result1 == "Wed") $result1 = "&#1670;";
                    else if ($result1 == "Thu") $result1 = "&#1662;";
                    else if ($result1 == "Fri") $result1 = "&#1580;";
                    $result .= $result1;
                    break;
                case"F":
                    $result .= $this->monthname($Dmonth);
                    break;
                case "g":
                    $result1 = date("g", $need);
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "G":
                    $result1 = date("G", $need);
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "h":
                    $result1 = date("h", $need);
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "H":
                    $result1 = date("H", $need);
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "i":
                    $result1 = date("i", $need);
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "j":
                    $result1 = $Dday;
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "l":
                    $result1 = date("l", $need);
                    if ($result1 == "Saturday") $result1 = "&#1588;&#1606;&#1576;&#1607;";
                    else if ($result1 == "Sunday") $result1 = "&#1610;&#1603;&#1588;&#1606;&#1576;&#1607;";
                    else if ($result1 == "Monday") $result1 = "&#1583;&#1608;&#1588;&#1606;&#1576;&#1607;";
                    else if ($result1 == "Tuesday") $result1 = "&#1587;&#1607;&#32;&#1588;&#1606;&#1576;&#1607;";
                    else if ($result1 == "Wednesday") $result1 = "&#1670;&#1607;&#1575;&#1585;&#1588;&#1606;&#1576;&#1607;";
                    else if ($result1 == "Thursday") $result1 = "&#1662;&#1606;&#1580;&#1588;&#1606;&#1576;&#1607;";
                    else if ($result1 == "Friday") $result1 = "&#1580;&#1605;&#1593;&#1607;";
                    $result .= $result1;
                    break;
                case "m":
                    if ($Dmonth < 10) $result1 = "0" . $Dmonth;
                    else    $result1 = $Dmonth;
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "M":
                    $result .= $this->short_monthname($Dmonth);
                    break;
                case "n":
                    $result1 = $Dmonth;
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "s":
                    $result1 = date("s", $need);
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "S":
                    $result .= "&#1575;&#1605;";
                    break;
                case "t":
                    $result .= $this->lastday($month, $day, $year);
                    break;
                case "w":
                    $result1 = date("w", $need);
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "y":
                    $result1 = substr($Dyear, 2, 4);
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "Y":
                    $result1 = $Dyear;
                    if ($persianNumber == 1) $result .= $this->Convertnumber2farsi($result1);
                    else $result .= $result1;
                    break;
                case "U" :
                    $result .= mktime();
                    break;
                case "Z" :
                    $result .= $this->days_of_year($Dmonth, $Dday, $Dyear);
                    break;
                case "L" :
                    list($tmp_year, $tmp_month, $tmp_day) = $this->mds_to_gregorian(1384, 12, 1);
                    echo $tmp_day;
                    /*if(lastday($tmp_month,$tmp_day,$tmp_year)=="31")
                        $result.="1";
                    else
                        $result.="0";
                        */
                    break;
                default:
                    $result .= $subtype;
            }
            $subtypetemp = substr($format, $i, 1);
            $i++;
        }
        return $result;
    }

    function make_time($hour = "", $minute = "", $second = "", $Dmonth = "", $Dday = "", $Dyear = "")
    {
        if (!$hour && !$minute && !$second && !$Dmonth && !$Dmonth && !$Dday && !$Dyear)
            return mktime();
        if ($Dmonth > 11) die("Incorrect month number");
        list($year, $month, $day) = $this->mds_to_gregorian($Dyear, $Dmonth, $Dday);
        $i = mktime($hour, $minute, $second, $month, $day, $year);
        return $i;
    }

///Find num of Day Begining Of Month ( 0 for Sat & 6 for Sun)
    function mstart($month, $day, $year)
    {
        list($Dyear, $Dmonth, $Dday) = $this->gregorian_to_mds($year, $month, $day);
        list($year, $month, $day) = $this->mds_to_gregorian($Dyear, $Dmonth, "1");
        $timestamp = mktime(0, 0, 0, $month, $day, $year);
        return date("w", $timestamp);
    }

//Find Number Of Days In This Month
    function lastday($month, $day, $year)
    {
        $Dday2 = "";
        $jdate2 = "";
        $lastdayen = date("d", mktime(0, 0, 0, $month + 1, 0, $year));
        list($Dyear, $Dmonth, $Dday) = $this->gregorian_to_mds($year, $month, $day);
        $lastdatep = $Dday;
        $Dday = $Dday2;
        while ($Dday2 != "1") {
            if ($day < $lastdayen) {
                $day++;
                list($Dyear, $Dmonth, $Dday2) = $this->gregorian_to_mds($year, $month, $day);
                if ($jdate2 == "1") break;
                if ($jdate2 != "1") $lastdatep++;
            } else {
                $day = 0;
                $month++;
                if ($month == 13) {
                    $month = "1";
                    $year++;
                }
            }

        }
        return $lastdatep - 1;
    }

//Find days in this year untile now
    function days_of_year($Dmonth, $Dday, $Dyear)
    {
        $year = "";
        $month = "";
        $year = "";
        $result = "";
        if ($Dmonth == "01")
            return $Dday;
        for ($i = 1; $i < $Dmonth || $i == 12; $i++) {
            list($year, $month, $day) = $this->mds_to_gregorian($Dyear, $i, "1");
            $result += $this->lastday($month, $day, $year);
        }
        return $result + $Dday;
    }

//translate number of month to name of month
    function monthname($month)
    {

        if ($month == "01") return "&#1601;&#1585;&#1608;&#1585;&#1583;&#1610;&#1606;";

        if ($month == "02") return "&#1575;&#1585;&#1583;&#1610;&#1576;&#1607;&#1588;&#1578;";

        if ($month == "03") return "&#1582;&#1585;&#1583;&#1575;&#1583;";

        if ($month == "04") return "&#1578;&#1610;&#1585;";

        if ($month == "05") return "&#1605;&#1585;&#1583;&#1575;&#1583;";

        if ($month == "06") return "&#1588;&#1607;&#1585;&#1610;&#1608;&#1585;";

        if ($month == "07") return "&#1605;&#1607;&#1585;";

        if ($month == "08") return "&#1570;&#1576;&#1575;&#1606;";

        if ($month == "09") return "&#1570;&#1584;&#1585;";

        if ($month == "10") return "&#1583;&#1610;";

        if ($month == "11") return "&#1576;&#1607;&#1605;&#1606;";

        if ($month == "12") return "&#1575;&#1587;&#1601;&#1606;&#1583;";
    }

    function short_monthname($month)
    {

        if ($month == "01") return "&#1601;&#1585;&#1608;";

        if ($month == "02") return "&#1575;&#1585;&#1583;";

        if ($month == "03") return "&#1582;&#1585;&#1583;";

        if ($month == "04") return "&#1578;&#1610;&#1585;";

        if ($month == "05") return "&#1605;&#1585;&#1583;";

        if ($month == "06") return "&#1588;&#1607;&#1585;";

        if ($month == "07") return "&#1605;&#1607;&#1585;";

        if ($month == "08") return "&#1570;&#1576;&#1575;";

        if ($month == "09") return "&#1570;&#1584;&#1585;";

        if ($month == "10") return "&#1583;&#1610;";

        if ($month == "11") return "&#1576;&#1607;&#1605;";

        if ($month == "12") return "&#1575;&#1587;&#1601; ";
    }

//converts the numbers into the persian's number
    function Convertnumber2farsi($srting)
    {
        $num0 = "&#1776;";
        $num1 = "&#1777;";
        $num2 = "&#1778;";
        $num3 = "&#1779;";
        $num4 = "&#1780;";
        $num5 = "&#1781;";
        $num6 = "&#1782;";
        $num7 = "&#1783;";
        $num8 = "&#1784;";
        $num9 = "&#1785;";

        $stringtemp = "";
        $len = strlen($srting);
        for ($sub = 0; $sub < $len; $sub++) {
            if (substr($srting, $sub, 1) == "0") $stringtemp .= $num0;
            elseif (substr($srting, $sub, 1) == "1") $stringtemp .= $num1;
            elseif (substr($srting, $sub, 1) == "2") $stringtemp .= $num2;
            elseif (substr($srting, $sub, 1) == "3") $stringtemp .= $num3;
            elseif (substr($srting, $sub, 1) == "4") $stringtemp .= $num4;
            elseif (substr($srting, $sub, 1) == "5") $stringtemp .= $num5;
            elseif (substr($srting, $sub, 1) == "6") $stringtemp .= $num6;
            elseif (substr($srting, $sub, 1) == "7") $stringtemp .= $num7;
            elseif (substr($srting, $sub, 1) == "8") $stringtemp .= $num8;
            elseif (substr($srting, $sub, 1) == "9") $stringtemp .= $num9;
            else $stringtemp .= substr($srting, $sub, 1);
        }
        return $stringtemp;

    }///end conver to number in persian

    function is_kabise($year)
    {
        if ($year % 4 == 0 && $year % 100 != 0)
            return true;
        return false;
    }

    function mcheckdate($month, $day, $year)
    {
        $m_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
        if ($month <= 12 && $month > 0) {
            if ($m_days_in_month[$month - 1] >= $day && $day > 0)
                return 1;
            if ($this->is_kabise($year))
                echo "Asdsd";
            if ($this->is_kabise($year) && $m_days_in_month[$month - 1] == 31)
                return 1;
        }

        return 0;

    }

    function mtime()
    {
        return mktime();
    }

    function mgetdate($timestamp = "")
    {
        if ($timestamp == "")
            $timestamp = mktime();

        return array(
            0 => $timestamp,
            "seconds" => $this->mds_date("s", $timestamp),
            "minutes" => $this->mds_date("i", $timestamp),
            "hours" => $this->mds_date("G", $timestamp),
            "mday" => $this->mds_date("j", $timestamp),
            "wday" => $this->mds_date("w", $timestamp),
            "mon" => $this->mds_date("n", $timestamp),
            "year" => $this->mds_date("Y", $timestamp),
            "yday" => $this->days_of_year($this->mds_date("m", $timestamp), $this->mds_date("d", $timestamp), $this->mds_date("Y", $timestamp)),
            "weekday" => $this->mds_date("l", $timestamp),
            "month" => $this->mds_date("F", $timestamp),
        );
    }

    function div($a, $b)
    {
        return (int)($a / $b);
    }

    function gregorian_to_mds($g_y, $g_m, $g_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $m_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);


        $gy = $g_y - 1600;
        $gm = $g_m - 1;
        $gd = $g_d - 1;

        $g_day_no = 365 * $gy + $this->div($gy + 3, 4) - $this->div($gy + 99, 100) + $this->div($gy + 399, 400);

        for ($i = 0; $i < $gm; ++$i)
            $g_day_no += $g_days_in_month[$i];
        if ($gm > 1 && (($gy % 4 == 0 && $gy % 100 != 0) || ($gy % 400 == 0)))
            /* leap and after Feb */
            $g_day_no++;
        $g_day_no += $gd;

        $m_day_no = $g_day_no - 79;

        $j_np = $this->div($m_day_no, 12053); /* 12053 = 365*33 + 32/4 */
        $m_day_no = $m_day_no % 12053;

        $jy = 979 + 33 * $j_np + 4 * $this->div($m_day_no, 1461); /* 1461 = 365*4 + 4/4 */

        $m_day_no %= 1461;

        if ($m_day_no >= 366) {
            $jy += $this->div($m_day_no - 1, 365);
            $m_day_no = ($m_day_no - 1) % 365;
        }

        for ($i = 0; $i < 11 && $m_day_no >= $m_days_in_month[$i]; ++$i)
            $m_day_no -= $m_days_in_month[$i];
        $jm = $i + 1;
        $jd = $m_day_no + 1;

        return array($jy, $jm, $jd);
    }

    function mds_to_gregorian($m_y, $j_m, $m_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $m_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);


        $jy = $m_y - 979;
        $jm = $j_m - 1;
        $jd = $m_d - 1;

        $m_day_no = 365 * $jy + $this->div($jy, 33) * 8 + $this->div($jy % 33 + 3, 4);
        for ($i = 0; $i < $jm; ++$i)
            $m_day_no += $m_days_in_month[$i];

        $m_day_no += $jd;

        $g_day_no = $m_day_no + 79;

        $gy = 1600 + 400 * $this->div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */
        $g_day_no = $g_day_no % 146097;

        $leap = true;
        if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */ {
            $g_day_no--;
            $gy += 100 * $this->div($g_day_no, 36524); /* 36524 = 365*100 + 100/4 - 100/100 */
            $g_day_no = $g_day_no % 36524;

            if ($g_day_no >= 365)
                $g_day_no++;
            else
                $leap = false;
        }

        $gy += 4 * $this->div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */
        $g_day_no %= 1461;

        if ($g_day_no >= 366) {
            $leap = false;

            $g_day_no--;
            $gy += $this->div($g_day_no, 365);
            $g_day_no = $g_day_no % 365;
        }

        for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++)
            $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
        $gm = $i + 1;
        $gd = $g_day_no + 1;

        return array($gy, $gm, $gd);
    }

}
