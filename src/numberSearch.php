<?php
Class numberSearch{
    function number75BaseConversion($inputNumber){
    $inputNumber--;
    $hiraganaNumberArray = [];
    //75進数に変換する
    for ($i = 1; $i <= 17; $i++) {
        $quotient = floor($inputNumber / 75);
        $remainder = $inputNumber % 75;
        array_unshift($hiraganaNumberArray, $remainder); // unshiftを使って先頭に追加
        $inputNumber = $quotient;
    }

    return $hiraganaNumberArray;
}
    function numberTransHiragana($inputNumber){
        // ひらがなのマッピング
    $hiraganaMapping = array(
    0 => 'あ', 1 => 'い', 2 => 'う', 3 => 'え', 4 => 'お',
    5 => 'か', 6 => 'き', 7 => 'く', 8 => 'け', 9 => 'こ',
    10 => 'さ', 11 => 'し', 12 => 'す', 13 => 'せ', 14 => 'そ',
    15 => 'た', 16 => 'ち', 17 => 'つ', 18 => 'て', 19 => 'と',
    20 => 'な', 21 => 'に', 22 => 'ぬ', 23 => 'ね', 24 => 'の',
    25 => 'は', 26 => 'ひ', 27 => 'ふ', 28 => 'へ', 29 => 'ほ',
    30 => 'ま', 31 => 'み', 32 => 'む', 33 => 'め', 34 => 'も',
    35 => 'や', 36 => 'ゆ', 37 => 'よ',
    38 => 'ら', 39 => 'り', 40 => 'る', 41 => 'れ', 42 => 'ろ',
    43 => 'わ', 44 => 'を', 45 => 'ん',
    46 => 'が', 47 => 'ぎ', 48 => 'ぐ', 49 => 'げ', 50 => 'ご',
    51 => 'ざ', 52 => 'じ', 53 => 'ず', 54 => 'ぜ', 55 => 'ぞ',
    56 => 'だ', 57 => 'ぢ', 58 => 'づ', 59 => 'で', 60 => 'ど',
    61 => 'ば', 62 => 'び', 63 => 'ぶ', 64 => 'べ', 65 => 'ぼ',
    66 => 'ぱ', 67 => 'ぴ', 68 => 'ぷ', 69 => 'ぺ', 70 => 'ぽ',
    71 => 'ゔ', 72 => 'ゃ', 73 => 'ゅ', 74 => 'ょ'
    );

    // それぞれの17個の数字に対応するひらがなを戻す
    $hiraganaArray = array_map(function ($number) use ($hiraganaMapping) {
        //該当文字がない場合
        return $hiraganaMapping[$number] ?? "";}, $inputNumber);
        $hiraganaArray = array_reverse($hiraganaArray);
        return $hiraganaArray;
    }

}

?>