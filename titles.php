<!doctype html>
<html>
    <head>
        <title>Titles</title>
    </head>
    <body>
    <?php
        require_once('./class.articles.php');
        require_once ('./class.pdo.db.php');

        $db = Db::getInstance();
        $a = new Articles($db);

        print_r($a->find()->grouped());
    ?>
    </body>
</html>