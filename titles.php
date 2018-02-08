<!doctype html>
<html>
<head>
    <title>Titles</title>
</head>
<body>
<?php

require_once('./class.pdo.db.php');
require_once('./class.articles.php');

use IDD\MCMSExport\Db;

$db = Db::getInstance();
$a  = new \IDD\MCMSExport\Articles($db);

print_r($a->find()->grouped());

?>
</body>
</html>