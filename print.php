<?php
/**
 * Created by PhpStorm.
 * User: SAYRE_TS
 * Date: 2017-09-19
 * Time: 3:28 PM
 *
 * Sample image URL
 * http://archive.mercer.edu/www2/www2.mercer.edu/NR/rdonlyres/65396474-EAE5-4E48-8B8B-DC626BD17560/0/Bell_Family.jpg
 *
 */

require_once('./class.articles.php');

//$articles = new class.articles();

print '<pre><code>';
print_r($articles->find()->toArray());
print '</code><pre>';
