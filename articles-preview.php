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
?>

<!doctype html>
<html>
    <head>
        <title>Articles Preview</title>
        <link href="./style.css" rel="stylesheet">
    </head>
    <body>

        <h1>Articles Preview</h1>

<?php

require_once('./class.pdo.db.php');
require_once('./class.articles.php');

use IDD\MCMSExport\Db;

$db = Db::getInstance();
$articles = new \IDD\MCMSExport\Articles($db);

/** @var \IDD\MCMSExport\Article $article */
foreach ($articles->find()->toArray() as $article)
{
    echo '<div class="article">';

    // Title
    $code = $article->getTitle();
    echo '<div class="article__field">';
    echo '<div class="article__field-label">Title</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Post Slug
    $code = htmlentities($article->getPostSlug());
    echo '<div class="article__field">';
    echo '<div class="article__field-label">Post Slug</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Unique Identifier
    $code = htmlentities($article->getUniqueIdentifier());
    echo '<div class="article__field">';
    echo '<div class="article__field-label">Unique Identifier</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Post Author (Original)
    $code = htmlentities($article->getPostAuthorOriginal());
    echo '<div class="article__field article__field--raw">';
    echo '<div class="article__field-label">Post Author (Original)</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Post Author
    $code = htmlentities($article->getPostAuthor());
    echo '<div class="article__field">';
    echo '<div class="article__field-label">Post Author</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Post Date (Original)
    $code = htmlentities($article->getPostDateOriginal());
    echo '<div class="article__field article__field--raw">';
    echo '<div class="article__field-label">Post Date (Original)</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Post Date
    $code = htmlentities($article->getPostDate());
    echo '<div class="article__field">';
    echo '<div class="article__field-label">Post Date</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Excerpt
    $code = htmlentities($article->getExcerpt());
    echo '<div class="article__field">';
    echo '<div class="article__field-label">Excerpt</div>';
    echo "<div class='article__field-value'>$code</div>";
    echo '</div>';

    // Content (Original)
    $code = htmlentities($article->getContentOriginal());
    echo '<div class="article__field article__field--raw">';
    echo '<div class="article__field-label">Content (Original)</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Content
    $code = htmlentities($article->getContent());
    echo '<div class="article__field">';
    echo '<div class="article__field-label">Content</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Categories
    $code = htmlentities($article->getCategories());
    echo '<div class="article__field">';
    echo '<div class="article__field-label">Categories</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Tags
    $code = htmlentities($article->getTags());
    echo '<div class="article__field">';
    echo '<div class="article__field-label">Tags</div>';
    echo "<div class='article__field-value'><pre><code>$code</code></pre></div>";
    echo '</div>';

    // Images
    $code = $article->getImages();
    echo '<div class="article__field">';
    echo '<div class="article__field-label">Images</div>';
    echo "<div class='article__field-value'>$code</div>";
    echo '</div>';

    echo '</div>';  // .article
}
?>

    </body>
</html>
