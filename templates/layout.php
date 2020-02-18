<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<div id="container" style="width: 70%; margin:auto">
    <div id="header">
        <?php include("header.inc.php"); //หาไม่เจอ จะหาที่โฟลเดอร์เดียวกัน ?>
    </div>
    <div id="content" style="text-align: center">
        <?= $content ?>
    </div>
    <div id="footer">
        <?php include("footer.inc.php"); ?>
    </div>
</div>
</body></html>
