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

include_once('./articles.php');

$articles = new Articles;

$xmlDom               = new DOMDocument('1.0');
$xmlDom->formatOutput = true;
$xmlArticles          = $xmlDom->createElement('articles');

foreach ($articles->get() as $guid => $article)
{
    $xmlArticle = $xmlDom->createElement('article');

    // Name
    $xmlElement = $xmlDom->createElement('title');
    $xmlText = $xmlDom->createTextNode(utf8_encode($article['title']));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Content
    $xmlElement = $xmlDom->createElement('content');
    $xmlText = $xmlDom->createTextNode(utf8_encode($article['content']));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Excerpt
    $xmlElement = $xmlDom->createElement('excerpt');
    $xmlText = $xmlDom->createTextNode(htmlentities(utf8_encode($article['excerpt'])));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Images
    $xmlElement = $xmlDom->createElement('images');
    $xmlText = $xmlDom->createTextNode(htmlentities(utf8_encode($article['images'])));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Categories
    $xmlElement = $xmlDom->createElement('categories');
    $xmlText = $xmlDom->createTextNode(htmlentities(utf8_encode($article['categories'])));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Tags
    $xmlElement = $xmlDom->createElement('tags');
    $xmlText = $xmlDom->createTextNode(htmlentities(utf8_encode($article['tags'])));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Post Date
    $xmlElement = $xmlDom->createElement('post_date');
    $xmlText = $xmlDom->createTextNode(htmlentities(utf8_encode($article['post_date'])));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Post Slug
    $xmlElement = $xmlDom->createElement('post_slug');
    $xmlText = $xmlDom->createTextNode(htmlentities(utf8_encode($article['post_slug'])));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Post Author
    $xmlElement = $xmlDom->createElement('post_author');
    $xmlText = $xmlDom->createTextNode(htmlentities(utf8_encode($article['post_author'])));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    // Unique Identifier
    $xmlElement = $xmlDom->createElement('unique_identifier');
    $xmlText = $xmlDom->createTextNode(htmlentities(utf8_encode($article['unique_identifier'])));
    $xmlElement->appendChild($xmlText);
    $xmlArticle->appendChild($xmlElement);

    $xmlArticles->appendChild($xmlArticle);
}

$xmlDom->appendChild($xmlArticles);

header('Content-type: text/xml');
echo $xmlDom->saveXML();
