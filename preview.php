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
        <title>Preview</title>
        <link href="./style.css" rel="stylesheet">
    </head>
    <body>

        <h1>Preview</h1>

<?php

include_once('./class.articles.php');

$articles = new articles;

foreach ($articles->get() as $guid => $article)
{
    echo '<div class="article">';

    echo '<div class="article__field">';
    echo '<div class="article__field-label">Title</div>';
    echo "<div class='article__field-value'>{$article['title']}</div>";
    echo '</div>';

    echo '<div class="article__field">';
    echo '<div class="article__field-label">Post Slug</div>';
    echo "<div class='article__field-value'>{$article['post_slug']}</div>";
    echo '</div>';

    echo '<div class="article__field">';
    echo '<div class="article__field-label">Unique Identifier</div>';
    echo "<div class='article__field-value'>{$article['unique_identifier']}</div>";
    echo '</div>';

    echo '<div class="article__field article__field--raw">';
    echo '<div class="article__field-label">Post Author (Raw)</div>';
    echo "<div class='article__field-value'>{$article['post_author_raw']}</div>";
    echo '</div>';

    echo '<div class="article__field">';
    echo '<div class="article__field-label">Post Author</div>';
    echo "<div class='article__field-value'>{$article['post_author']}</div>";
    echo '</div>';

    echo '<div class="article__field article__field--raw">';
    echo '<div class="article__field-label">Post Date (Raw)</div>';
    echo "<div class='article__field-value'>{$article['post_date_raw']}</div>";
    echo '</div>';

    echo '<div class="article__field">';
    echo '<div class="article__field-label">Post Date</div>';
    echo "<div class='article__field-value'>{$article['post_date']}</div>";
    echo '</div>';

    echo '<div class="article__field">';
    echo '<div class="article__field-label">Excerpt</div>';
    echo "<div class='article__field-value'>{$article['excerpt']}</div>";
    echo '</div>';

	echo '<div class="article__field article__field--raw">';
	echo '<div class="article__field-label">Content (Raw)</div>';
	$var = htmlentities($article['content_raw']);
	echo "<div class='article__field-value'><pre><code>$var</code></pre></div>";
	echo '</div>';

    echo '<div class="article__field">';
    echo '<div class="article__field-label">Content</div>';
    $var = htmlentities($article['content']);
    echo "<div class='article__field-value'><pre><code>$var</code></pre></div>";
    echo '</div>';

    echo '<div class="article__field">';
    echo '<div class="article__field-label">Categories</div>';
    $var = htmlentities($article['categories']);
    echo "<div class='article__field-value'><pre><code>$var</code></pre></div>";
    echo '</div>';

    echo '<div class="article__field">';
    echo '<div class="article__field-label">Tags</div>';
    $var = htmlentities($article['tags']);
    echo "<div class='article__field-value'><pre><code>$var</code></pre></div>";
    echo '</div>';

    echo '<div class="article__field">';
    echo '<div class="article__field-label">Images</div>';
    echo "<div class='article__field-value'>{$article['images']}</div>";
    echo '</div>';

    echo '</div>';  // .article
}
?>

    </body>
</html>
