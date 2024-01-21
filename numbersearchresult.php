<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>全俳句データベース</title>
</head>


<body>

<?php
require_once('src/createMessage.php');
$message = new CreateMessage();

// 'number_search'が$_POST配列に設定されているか確認
if (isset($_POST['number_search'])) {
    // 'number_search'の値を整数に変換
    $number =$_POST['number_search'];

    // 数字の範囲を確認
    if ($number <= 0 || $number > 75169468182139100842291361742848) {
        // 範囲外の場合はエラーメッセージを表示
        $message->showNumberError();
    } else {
        // 正しい範囲内の場合は検索結果を表示
        $message->showNumberSearchResult();
    }
} else {
    // 'number_search'が$_GET配列に設定されていない場合はエラーメッセージを表示
    $message->showNumberError();
}

?>



</body>
</html>