<!-- session must be intialized before executing this script -->
<img src=<?= Router::getSourcePath()."img/banner.jpg"?> alt="banner" width="100%"/>
<?php
if (isset($_SESSION["username"]) && $_SESSION["username"] != "")
{
    echo "<div align='right'>สวัสดีคุณ {$_SESSION["name"]} {$_SESSION["surname"]} <a href='logout.php'>Logout</a></div>";
}
?>
<?php
/*echo "<hr/>";
echo "<pre><code>";
show_source(__FILE__);
echo "</code></pre>";*/
