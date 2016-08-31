<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$menu = array(
    array("id" => 1, "url" => "/index.php", "name" => "Home"),
    array("id" => 2, "url" => "/contact.php", "name" => "Contact"),
    array("id" => 3, "url" => "/about.php", "name" => "About"),
    array("id" => 4, "url" => "/log.php", "name" => "Log")
);

$pageId = isset($_GET["id"]) ? $_GET["id"] : 1;

foreach ($menu as $m) {
    if ($m['id'] == $pageId)
        $path = $m['url'];
}

if ($pageId == 1):
    echo "Вы на странице 'Index'";
else:
    include($path);
endif;

?>
<ul class="menu">
    <?php
    foreach ($menu as $m): ?>
        <li class="menu-item">
            <a href="/index.php?id=<?= $m['id'] ?>"><?= $m['name'] ?></a>
        </li>
    <?php
    endforeach;
    ?>
</ul>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $dt = time();
    $page =  $_SERVER['REQUEST_URI'];
    if($page == "/")
        $page = 'mysite.local';
    elseif($page == "")
        $page = "Неизвесный ресурс";
    $index = strpos($_SERVER['HTTP_REFERER'], "localhost");
    $ref = substr($_SERVER['HTTP_REFERER'], $index + strlen("localhost"));
    if($ref == "/")
        $ref = 'mysite.local';
    elseif($ref == "")
        $ref = "Неизвесный ресурс";
    $str_log = $dt . "|" . $page . "|" . $ref . "\n";
    $file = fopen('Log/log.txt', 'a');
    fwrite($file, $str_log);
    fclose($file);
}
?>
</body>
</html>