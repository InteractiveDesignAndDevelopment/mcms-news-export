<?php
/**
 * Created by PhpStorm.
 * User: SAYRE_TS
 * Date: 2017-10-03
 * Time: 12:54 PM
 *
 */

include_once('./class.articles.php');
$articles = new articles;

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Compare Users</title>
    <link href="./style.css" rel="stylesheet">
</head>
<body>

<h1>Compare Users</h1>

<table>
    <thead>
        <tr>
            <th>Original</th>
            <th>Processed</th>
        </tr>
    </thead>
    <tbody>
        <?php

//        include_once('./class.articles.php');
//
//        $articles = new articles;
//
//        foreach ($articles->get() as $guid => $article)
//        {
//            echo '<tr>';
//
//            echo "<td>{$article['post_author_raw']}</td>";
//
//            echo "<td>{$article['post_author_clean']}</td>";
//
//            echo "<td>{$article['post_author']}</td>";
//
//            echo '</tr>';  // .article
//        }

        ?>
    </tbody>
</table>

</body>
</html>
