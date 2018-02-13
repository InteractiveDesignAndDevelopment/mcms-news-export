<?php
/**
 * Created by PhpStorm.
 * User: SAYRE_TS
 * Date: 2017-09-19
 * Time: 10:05 AM
 *
 */
?>

<!doctype html>
<html>
<head>
    <title>Articles Print</title>
    <link href="./style.css" rel="stylesheet">
</head>
<body>

<h1>Articles Print</h1>

<?php

require_once('./class.pdo.db.php');
require_once('./class.articles.php');

use IDD\MCMSExport\Db;

$db = Db::getInstance();
$articles = new \IDD\MCMSExport\Articles($db);

print '<pre><code>';
print_r($articles->find()->toArray());
print '</code><pre>';

?>

</body>
</html>