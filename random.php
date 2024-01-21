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
    $message->showRandomSearch();
?>



</body>
</html>