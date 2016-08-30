<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="" method="post">
    <input name="name" type="text" placeholder="Name menu" required/><br><br>
    <input name="link" type="text" placeholder="Link" required/><br><br>
    Is active<input type="checkbox" name="active" required/><br><br>
    <input type="hidden" name="action" value="add">
    <input type="submit" value="Submit"><br><br>
</form>
<form action="" method="post">
    <input type="hidden" name="action" value="del">
    <select name="sel">
        <?php
        $arr = file($_SERVER['DOCUMENT_ROOT'] . '/menu.txt');
        foreach ($arr as $m) {
            $menu = unserialize($m);
            var_dump($menu);
            ?>
            <option value="<?= $menu['id'] ?>"><?= $menu['name'] ?></option>
            <?php
        }
        ?>
    </select><br><br>
    <input type="submit" value="Delete"><br><br>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['action'] == 'add') {
        $arr = file($_SERVER['DOCUMENT_ROOT'] . '/menu.txt');
        if (isset($_POST['name']) && isset($_POST['link']) && isset($_POST['active'])) {
            $menu = [
                'id' => (count($arr) + 1),
                'name' => $_POST['name'],
                'link' => $_POST['link'],
                'active' => $_POST['active']
            ];
            $f = fopen('../menu.txt', 'a');
            fwrite($f, serialize($menu) . "\n");
            fclose($f);
        }
    } elseif($_POST['action'] == 'del'){
        if (isset($_POST['sel'])) {
            $arr = file($_SERVER['DOCUMENT_ROOT'] . '/menu.txt');
            $f = fopen('../menu.txt', 'w+');
            fclose($f);
            foreach($arr as $m){
                $menu = unserialize($m);
                if($menu['id'] == $_POST['sel']){
                    $menu['active'] = 'off';
                }
                $f = fopen('../menu.txt', 'a');
                fwrite($f, serialize($menu) . "\n");
                fclose($f);
            }
        }
    }
}
?>
</body>
</html>