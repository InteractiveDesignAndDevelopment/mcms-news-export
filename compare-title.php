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
$articles = new \IDD\MCMSExport\Articles($db);

//echo '<pre>';
//print_r($articles->find()->toArray());
//echo '</pre>';

foreach ($articles->find()->toArray() as $article) {
    echo '<div><strong>Importable:</strong> ';
    echo $article->getTitle();
    echo '</div>';
    echo '<div><strong>Original:</strong> ';
    echo $article->getTitleOriginal();
    echo '</div>';
}

?>
</body>
</html>