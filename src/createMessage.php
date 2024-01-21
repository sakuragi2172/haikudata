<?php
require_once('createNumber.php');
require_once('numberSearch.php');
class CreateMessage{
    function showMainPage(){
        echo(
            '<br>
<h1 align="center">全俳句データ</h1>
<div align="center">
<b>全部の俳句のデータベースです。<br><br>
No.1からNo.75169468182139100842291361742848までの<br
>約7516溝(こう)句が収録されています。</b><br>
あああああ あああああああ あああああ から<br>
ょょょょょ ょょょょょょょ ょょょょょ まで収録されています<br>
※季語が無いものも含まれています。<br>
※字余り、字足らずには対応していません。<br><br><br>
<br>
</div>'
        );
    }
    function showMatchSearchPage(){
        echo '<body>
        <br>
        <h1 align="center">全俳句データ</h1>
        <div align="center">
        <b>検索したい俳句を17文字のひらがなで入力してください。</b><br><br>
        
        <form method="get" action="searchresult.php">
        <input type="text" name="word_search" size="34"><button type="submit">検索</button>
        </form>
        ';
    }
    function showNumberSearchPage(){
        echo '<br>
        <h1 align="center">全俳句データベース</h1>
        <div align="center">
        <b>1から75169468182139100842291361742848までの整数を入力してください。</b><br><br>
        
        <form action="numbersearchresult.php"method="post" >
        <input type="number" name="number_search" size="33"> <button type="submit">検索</button>
        </form>';
    }
    function showRandomPage(){
        echo '<br>
        <h1 align="center">全俳句データ</h1>
        <div align="center">
        <b>全部の俳句の中からランダムで1つ表示します。</b><br><br>
        <form action="searchresult.php" method="post">
        <!-- 一定の値を送るための隠しフィールド -->
        <input type="hidden" name="hidden_value" value="randomcreate">
        <!-- 送信ボタン -->
        <button type="submit">ランダム表示</button>
    </form>';

    }
    function showLogicPage(){
        echo '<br>
        <h1 align="center">全俳句データ</h1>
        <div align="center">
        <b>実際はデータベースではありません<br>
        入力されたひらがな17文字を配列に入力<br>
        "あ"は"1"、"い"は"2"として変換して<br>
        それぞれを67進数として計算してNo.にしています<br><br>
        詳しいプログラムはGithubに上げています
        <a href="">Github</a></b>';
    }
    function showSearhResult(){
        echo '<br>
        <h1 align="center">全俳句データベース</h1>
        <div align="center">
        <b>検索したい俳句を全て17文字のひらがなで入力してください。</b><br>
        
        <form method="get" action="searchresult.php">
        <input type="text" name="word_search" size="34"><button type="submit">検索</button>
        </form>
        
        <br><br><br>';
        $result=new CreateNumber();
        $matchResult=($result->createHaikuNumber());
        $haikuHiragana=$result->splitHiragana(htmlspecialchars($_GET['word_search']));


        echo'<div id="result">

        <table border="5" bordercolor="black"><tr><td id="haiku_number" style="font-size : 20px;"></td></tr>
        <tr><td id="haiku_contents" style="font-size : 30px;">No.';
        echo number_format($matchResult+1, 0);
        echo '</td></tr>
        <tr><td id="tweet" style="font-size : 20px;">';
        foreach($haikuHiragana as $value){
        echo $value." ";
        }
        echo'</td></tr>
        </table>
        <br>';
        // echo'
        // <a href="#?=prev" >&lt;&lt;前へ</a>

        // <a href="#?=next" >次へ&gt;&gt;</a>
        // </div>';
    }
    function showNumberSearchresult(){
        echo '<br>
        <h1 align="center">全俳句データベース</h1>
        <div align="center">
        <b>1から75169468182139100842291361742848までの整数を入力してください。</b><br><br>
        
        <form action="numbersearchresult.php"method="post" >
        <input type="number" name="number_search" size="33"> <button type="submit">検索</button>
        </form><br><br><br>';

        $result=new numberSearch();
        $split=new createNumber();
        $matchResult=htmlspecialchars($_POST['number_search']);
        $numberArray=$result->number75BaseConversion(htmlspecialchars($_POST['number_search']));
        $haikuHiragana=$result->numberTransHiragana($numberArray);

        $haikuParts = $split->splitIntoHaiku($haikuHiragana);


        echo'<div id="result">

        <table border="5" bordercolor="black"><tr><td id="haiku_number" style="font-size : 20px;"></td></tr>
        <tr><td id="haiku_contents" style="font-size : 30px;">No.';
        echo $matchResult;
        echo '</td></tr>
        <tr><td id="tweet" style="font-size : 20px;">';
    // 5, 7, 5 それぞれの部分を表示
    foreach ($haikuParts as $part) {
        foreach ($part as $value) {
            echo $value;
        }
        echo " ";
    }

        echo'</td></tr>
        </table>
        <br>';
        // echo'
        // <a href="#?=prev" >&lt;&lt;前へ</a>

        // <a href="#?=next" >次へ&gt;&gt;</a>
        // </div>';
    }

    function showRandomSearch(){
        echo'<br>
        <h1 align="center">全俳句データベース</h1>
        <div align="center">
        <b>全部の俳句の中からランダムで1つ表示します。</b><br><br>
        <form action="randomresult.php" method="post">
        <button type="submit" name="randomselect" value="random">ランダム表示</button>
        </form>';
    }
    function showRandomResult(){
        echo'<br>
        <h1 align="center">全俳句データベース</h1>
        <div align="center">
        <b>全部の俳句の中からランダムで1つ表示します。</b><br><br>
        <form action="randomresult.php" method="post">
        <button type="submit" name="randomselect" value="random">ランダム表示</button>
        </form>';

        $result=new numberSearch();
        $split=new createNumber();

        $min = 0;
        $max = 7516946;

        $randomNumber = mt_rand($min, $max);
        $matchResult=$randomNumber;
        $numberArray=$result->number75BaseConversion(htmlspecialchars($matchResult));
        $haikuHiragana=$result->numberTransHiragana($numberArray);

        $haikuParts = $split->splitIntoHaiku($haikuHiragana);


        echo'<div id="result">

        <table border="5" bordercolor="black"><tr><td id="haiku_number" style="font-size : 20px;"></td></tr>
        <tr><td id="haiku_contents" style="font-size : 30px;">No.';
        echo $matchResult;
        echo '</td></tr>
        <tr><td id="tweet" style="font-size : 20px;">';
    // 5, 7, 5 それぞれの部分を表示
    foreach ($haikuParts as $part) {
        foreach ($part as $value) {
            echo $value;
        }
        echo " ";
    }

        echo'</td></tr>
        </table>
        <br>';
        // echo'
        // <a href="#?=prev" >&lt;&lt;前へ</a>

        // <a href="#?=next" >次へ&gt;&gt;</a>
        // </div>';
    }
    function showError(){
        echo '<body>
        <br>
        <h1 align="center">全俳句データ</h1>
        <div align="center">
        "エラー: 17文字のひらがな文字列を入力してください。"<br>
        <b>検索したい俳句を17文字のひらがなで入力してください。</b><br><br>
        
        <form method="get" action="searchresult.php">
        <input type="text" name="word_search" size="34"><button type="submit">検索</button>
        </form>
        ';
    }
    function showNumberError(){
        echo '<body>
        <br>
        <h1 align="center">全俳句データ</h1>
        <div align="center">      
        <b>"エラー: 範囲内の数字を入力してください"<br></b><br><br>
        
        <form method="post" action="randomresult.php">
        <input type="number" name="number_search" size="34"><button type="submit">検索</button>
        </form>
        ';        
    }
}
?>