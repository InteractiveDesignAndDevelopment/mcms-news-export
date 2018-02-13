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

header('Content-type: text/xml');
header('Content-disposition: inline; filename=articles.xml');

require_once('./class.pdo.db.php');
require_once('./class.articles.php');

use IDD\MCMSExport\Db;

$db = Db::getInstance();
$articles = new \IDD\MCMSExport\Articles($db);

$xmlDom = new DOMDocument('1.0');
$xmlDom->formatOutput = true;
$xmlArticles = $xmlDom->createElement('class.articles');

/** @var \IDD\MCMSExport\Article $article */
foreach ($articles->find()->toArray() as $article)
{
    $xmlArticle = $xmlDom->createElement('class.article');

    // Name
    $xmlElement = $xmlDom->createElement('title');
    $xmlText = $xmlDom->createTextNode(htmlentities($article->getTitle()));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Content
    $xmlElement = $xmlDom->createElement('content');
    $xmlText = $xmlDom->createTextNode(htmlentities($article->getContent()));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Excerpt
    $xmlElement = $xmlDom->createElement('excerpt');
    $xmlText = $xmlDom->createTextNode(htmlentities($article->getExcerpt()));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Images
    $xmlElement = $xmlDom->createElement('images');
    $xmlText = $xmlDom->createTextNode(htmlentities($article->getImages()));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Categories
    $xmlElement = $xmlDom->createElement('categories');
    $xmlText = $xmlDom->createTextNode(htmlentities($article->getCategories()));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Tags
    $xmlElement = $xmlDom->createElement('tags');
    $xmlText = $xmlDom->createTextNode(htmlentities($article->getTags()));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Post Date
    $xmlElement = $xmlDom->createElement('post_date');
    $xmlText = $xmlDom->createTextNode(htmlentities($article->getPostDate()));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Post Slug
    $xmlElement = $xmlDom->createElement('post_slug');
    $xmlText = $xmlDom->createTextNode(htmlentities($article->getPostSlug()));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Post Author
    $xmlElement = $xmlDom->createElement('post_author');
    $xmlText = $xmlDom->createTextNode(htmlentities($article->getPostAuthor()));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Unique Identifier
    $xmlElement = $xmlDom->createElement('unique_identifier');
    $xmlText = $xmlDom->createTextNode(htmlentities($article->getUniqueIdentifier()));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    $xmlArticles->appendChild($xmlArticle);
}

$xmlDom->appendChild($xmlArticles);

echo $xmlDom->saveXML();
