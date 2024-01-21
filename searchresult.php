<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>全俳句データベース</title>
</head>


<body>

<?php
require_once('src/createMessage.php');
$message=new CreateMessage();
if (mb_strlen(htmlspecialchars($_GET['word_search']), 'UTF-8') !== 17) {
    $message->showError();
}else{

    $message->showSearhResult();
}
?>



</body>
</html>