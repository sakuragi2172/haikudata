<?php

Class createNumber{
function createHaikuNumber(){
$hiraganaSentence = $_GET['word_search'];

$hiraganaMapping = [
    'あ' => 0, 'い' => 1, 'う' => 2, 'え' => 3, 'お' => 4,
    'か' => 5, 'き' => 6, 'く' => 7, 'け' => 8, 'こ' => 9,
    'さ' => 10, 'し' => 11, 'す' => 12, 'せ' => 13, 'そ' => 14,
    'た' => 15, 'ち' => 16, 'つ' => 17, 'て' => 18, 'と' => 19,
    'な' => 20, 'に' => 21, 'ぬ' => 22, 'ね' => 23, 'の' => 24,
    'は' => 25, 'ひ' => 26, 'ふ' => 27, 'へ' => 28, 'ほ' => 29,
    'ま' => 30, 'み' => 31, 'む' => 32, 'め' => 33, 'も' => 34,
    'や' => 35, 'ゆ' => 36, 'よ' => 37,
    'ら' => 38, 'り' => 39, 'る' => 40, 'れ' => 41, 'ろ' => 42,
    'わ' => 43, 'を' => 44, 'ん' => 45,
    'が' => 46, 'ぎ' => 47, 'ぐ' => 48, 'げ' => 49, 'ご' => 50,
    'ざ' => 51, 'じ' => 52, 'ず' => 53, 'ぜ' => 54, 'ぞ' => 55,
    'だ' => 56, 'ぢ' => 57, 'づ' => 58, 'で' => 59, 'ど' => 60,
    'ば' => 61, 'び' => 62, 'ぶ' => 63, 'べ' => 64, 'ぼ' => 65,
    'ぱ' => 66, 'ぴ' => 67, 'ぷ' => 68, 'ぺ' => 69, 'ぽ' => 70,
    'ゔ' => 71, 'ゃ' => 72, 'ゅ' => 73, 'ょ' => 74
];



// 文章を1文字ずつ分割して配列に格納し、各ひらがなをマッピングして新しい配列を作成
$hiraganaArray = array_map(function($char) use ($hiraganaMapping) {
    // マッピングが存在すればその値を、存在しなければそのままの文字を返す
    return isset($hiraganaMapping[$char]) ? $hiraganaMapping[$char] : $char;
}, mb_str_split($hiraganaSentence));

// 配列の内容を出力して確認
$haikunumber=0;
$weight=0;
foreach ($hiraganaArray as $key => $value) {
    //75進数とみなしては俳句No.を生成する
    $value = bcmul($value, bcpow('75', $weight));
    $haikunumber = bcadd($haikunumber, $value);
    $weight++;
}
$line1 = array_slice($hiraganaArray, 0, 5);
$line2 = array_slice($hiraganaArray, 5, 7);
$line3 = array_slice($hiraganaArray, 12, 5);
return $haikunumber;
}

function splitHiragana($inputString) {
    $resultArray = [];

    // 5文字目までの部分を抽出
    $resultArray[] = mb_substr($inputString, 0, 5, 'UTF-8');

    // 6文字目から12文字目までの部分を抽出
    $resultArray[] = mb_substr($inputString, 5, 7, 'UTF-8');

    // 13文字目から17文字目までの部分を抽出
    $resultArray[] = mb_substr($inputString, 12, 5, 'UTF-8');

    return $resultArray;
}
public function splitIntoHaiku($haikuHiragana) {
    $haiku = [];
    $haiku[] = array_slice($haikuHiragana, 0, 5);
    $haiku[] = array_slice($haikuHiragana, 5, 7);
    $haiku[] = array_slice($haikuHiragana, 12, 5);
    return $haiku;
}
function createRandomNumber(){
    // 乱数の範囲を指定
$minNumber = 0;
$maxNumber = 75169468182139098644256591796874;

// ランダムな数字を生成
$randomNumber = random_int($minNumber, $maxNumber);
}
function numberSearch($inputNumber){
    $searchnumber=$inputNumber;
}
}
?>