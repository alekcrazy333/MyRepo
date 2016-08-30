<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*file_exists($fileName);
filesize($fileName);
fileatime($fileName);
is_readable($fileName);
is_writable($fileName);
$f = fopen($path, $mode); // create, open file; 'r' => read, begin; 'r+' => read, write, begin; 'w' = > write, begin; 'w+' => rewrite; 'a' => write, append; 'a+' read, write, append;
fclose($f); // close file
fgetss($f); // delete tags
feof($f);
fgets(); get string*/
echo "<ul style='list-style: none; margin: 0;>";
$arr = file('menu.txt');
foreach($arr as $m) {
$menu = unserialize($m);
    if($menu['active'] == 'on') {
        $myLink = $menu['link'];
        $myName = $menu['name'];
        echo "<li style='display: inline; margin: 10px;'><a href='$myLink'>$myName</a></li>";
    }
}
echo "</ul>";
?>
</body>
</html>