<?php
/**
 * Created by PhpStorm.
 * User: SAYRE_TS
 * Date: 2018-02-07
 * Time: 12:42 PM
 *
 * When constructing, pass in an array with these key and values
 * - string guid
 * - string name
 * - string display_name
 * - string path
 * - array placeholders
 */

namespace IDD\MCMSExport;

class Article
{
    private $categories = '';
    private $content = '';
    private $contentOriginal = '';
    private $excerpt = '';
    private $images = '';
    private $path = '';
    private $postAuthor = '';
    private $postAuthorClean = '';
    private $postAuthorOriginal = '';
    private $postDate = '';
    private $postDateClean = '';
    private $postDateOriginal = '';
    private $postSlug = '';
    private $tags = '';
    private $title = '';
    private $titleOriginal = '';
    private $uniqueIdentifier = '';

    /**
     * class.article constructor.
     *
     * @param array $details
     */
    public function __construct($details)
    {

        echo '<pre>';
        print_r($details);
        echo '</pre>';

        if (! is_array($details)) {
            die('$details must be an array');
        }

        if (! array_key_exists('guid', $details)) {
            die('$details must have a guid');
        }

        if (! array_key_exists('name', $details)) {
            die('$details must have a name');
        }

        if (! array_key_exists('display_name', $details)) {
            die('$details must have a display_name');
        }

        if (! array_key_exists('path', $details)) {
            die('$details must have a path');
        }

        if (! array_key_exists('placeholders', $details)) {
            die('$details must have placeholders');
        }

        if (! is_array($details['placeholders'])) {
            die('placeholders must be an array');
        }

        // Title
        $this->setTitleOriginal($details['placeholders']['PH_headline']['text']);
        $this->setTitle($details['placeholders']['PH_headline']['text']);
        $this->setTitle(trim($this->getTitle()));

        // Content
//        $this->setContentOriginal($details['placeholders']['PH_article']['html'])

//        TODO: Implement author
//        PH_contact

//        TODO: Implement date
//        PH_date

        // MCMS articles will only be categorized as General
        $this->setCategories('General');
    }

    /**
     * @return string
     */
    public function getCategories(): string
    {
        return $this->categories;
    }

    /**
     * @param string $categories
     */
    public function setCategories(string $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContentOriginal(): string
    {
        return $this->contentOriginal;
    }

    /**
     * @param string $contentOriginal
     */
    public function setContentOriginal(string $contentOriginal): void
    {
        $this->contentOriginal = $contentOriginal;
    }

    /**
     * @return string
     */
    public function getExcerpt(): string
    {
        return $this->excerpt;
    }

    /**
     * @param string $excerpt
     */
    public function setExcerpt(string $excerpt): void
    {
        $this->excerpt = $excerpt;
    }

    /**
     * @return string
     */
    public function getImages(): string
    {
        return $this->images;
    }

    /**
     * @param string $images
     */
    public function setImages(string $images): void
    {
        $this->images = $images;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPostAuthor(): string
    {
        return $this->postAuthor;
    }

    /**
     * @param string $postAuthor
     */
    public function setPostAuthor(string $postAuthor): void
    {
        $this->postAuthor = $postAuthor;
    }

    /**
     * @return string
     */
    public function getPostAuthorClean(): string
    {
        return $this->postAuthorClean;
    }

    /**
     * @param string $postAuthorClean
     */
    public function setPostAuthorClean(string $postAuthorClean): void
    {
        $this->postAuthorClean = $postAuthorClean;
    }

    /**
     * @return string
     */
    public function getPostAuthorOriginal(): string
    {
        return $this->postAuthorOriginal;
    }

    /**
     * @param string $postAuthorOriginal
     */
    public function setPostAuthorOriginal(string $postAuthorOriginal): void
    {
        $this->postAuthorOriginal = $postAuthorOriginal;
    }

    /**
     * @return string
     */
    public function getPostDate(): string
    {
        return $this->postDate;
    }

    /**
     * @param string $postDate
     */
    public function setPostDate(string $postDate): void
    {
        $this->postDate = $postDate;
    }

    /**
     * @return string
     */
    public function getPostDateClean(): string
    {
        return $this->postDateClean;
    }

    /**
     * @param string $postDateClean
     */
    public function setPostDateClean(string $postDateClean): void
    {
        $this->postDateClean = $postDateClean;
    }

    /**
     * @return string
     */
    public function getPostDateOriginal(): string
    {
        return $this->postDateOriginal;
    }

    /**
     * @param string $postDateOriginal
     */
    public function setPostDateOriginal(string $postDateOriginal): void
    {
        $this->postDateOriginal = $postDateOriginal;
    }

    /**
     * @return string
     */
    public function getPostSlug(): string
    {
        return $this->postSlug;
    }

    /**
     * @param string $postSlug
     */
    public function setPostSlug(string $postSlug): void
    {
        $this->postSlug = $postSlug;
    }

    /**
     * @return string
     */
    public function getTags(): string
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     */
    public function setTags(string $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitleOriginal(): string
    {
        return $this->titleOriginal;
    }

    /**
     * @param string $titleOriginal
     */
    public function setTitleOriginal(string $titleOriginal): void
    {
        $this->titleOriginal = $titleOriginal;
    }

    /**
     * @return string
     */
    public function getUniqueIdentifier(): string
    {
        return $this->uniqueIdentifier;
    }

    /**
     * @param string $uniqueIdentifier
     */
    public function setUniqueIdentifier(string $uniqueIdentifier): void
    {
        $this->uniqueIdentifier = $uniqueIdentifier;
    }

//    private function html_fragment_clean_post (string $html_fragment) {
//        $tidy_config = array(
//            'output-html'                 => true,
//            'show-body-only'              => true,
//            'wrap'                        => 0,
//        );
//        $tidy = tidy_parse_string($html_fragment, $tidy_config, 'UTF8');
//        $tidy->cleanRepair();
//        return preg_replace('/<\/?body>/', '', $tidy->body());
//    }

    private function divs_to_ps($html_fragment)
    {
        $dom = new DOMDocument;
        @$dom->loadHTML($html_fragment);
        $elements = $dom->getElementsByTagName('p');
//	  $images = '';
//	  foreach ($elements as $element)
//	  {
//		  $src = $element->getattribute('src');
//		  $images .= "http://archive.mercer.edu/www2/www2.mercer.edu{$src}\n";
//	  }
//	  return $images;
    }

    private function tidy_html_fragment(string $html_fragment)
    {
        $tidy_config = array(
            'bare'                        => true,
            'clean'                       => true,
            'drop-font-tags'              => true,
            'drop-proprietary-attributes' => true,
            'join-classes'                => true,
            'logical-emphasis'            => true,
            'merge-divs'                  => true,
            'merge-spans'                 => true,
            'quote-marks'                 => true,
            'quote-nbsp'                  => true,
            'show-body-only'              => true,
            'word-2000'                   => true,
            'wrap'                        => 0
        );
        $tidy        = tidy_parse_string($html_fragment, $tidy_config, 'UTF8');
        $tidy->cleanRepair();

        return $tidy->body();
    }

    private function html_fragment_clean_attributes(string $html_fragment)
    {
        $dom = new DOMDocument;
        @$dom->loadHTML($html_fragment);
        $elements = $dom->getElementsByTagName('*');
        foreach ($elements as $element) {
//        echo '<pre>';
//        print_r($element);
//        echo '</pre>';
            foreach ($element->attributes as $attribute) {
//            echo '<pre>';
//            print_r($attribute);
//            echo '</pre>';
                if (('a' !== $element->tagName && 'href' !== $attribute->name) ||
                    ('img' !== $element->tagName && 'src' !== $attribute->name)) {
                    $element->removeAttribute($attribute->nodeName);
                }
            }
        }
        $body_node     = $dom->getElementsByTagName('body')->item(0);
        $html_fragment = $dom->saveHTML($body_node);
        $html_fragment = preg_replace('/<\/?body>/', '', $html_fragment);

        return $html_fragment;
    }

    private function convert_ascii(string $string)
    {
        // Replace Single Curly Quotes
        $search[]  = chr(226) . chr(128) . chr(152);
        $replace[] = "'";
        $search[]  = chr(226) . chr(128) . chr(153);
        $replace[] = "'";

        // Replace Smart Double Curly Quotes
        $search[]  = chr(226) . chr(128) . chr(156);
        $replace[] = '"';
        $search[]  = chr(226) . chr(128) . chr(157);
        $replace[] = '"';

        // Replace En Dash
        $search[]  = chr(226) . chr(128) . chr(147);
        $replace[] = '--';

        // Replace Em Dash
        $search[]  = chr(226) . chr(128) . chr(148);
        $replace[] = '---';

        // Replace Bullet
        $search[]  = chr(226) . chr(128) . chr(162);
        $replace[] = '*';

        // Replace Middle Dot
        $search[]  = chr(194) . chr(183);
        $replace[] = '*';

        // Replace Ellipsis with three consecutive dots
        $search[]  = chr(226) . chr(128) . chr(166);
        $replace[] = '...';

        // Replace Non-breaking space with regular space
        $search[]  = chr(194) . chr(160);
        $replace[] = ' ';

        // Replace Carriage Return + Line Feed
        $search[]  = chr(13) . chr(10);
        $replace[] = '';

        // Replace Line Feed
        $search[]  = chr(10);
        $replace[] = '';

        // Replace Carriage Return
        $search[]  = chr(13);
        $replace[] = '';

        // Apply Replacements
        $string = str_replace($search, $replace, $string);

        // Remove any non-ASCII Characters
        $string = preg_replace("/[^\x01-\x7F]/", "", $string);

        return $string;
    }

    private function extract_excerpt(string $html_fragment)
    {
        // Old articles used this to demarcate the 'cut'
        $at_at_at_pos = strpos($html_fragment, '@@@');

        if (false !== $at_at_at_pos) {
            return strip_tags(substr($html_fragment, 0, $at_at_at_pos));
        }

        $doc = new DOMDocument;
        @$doc->loadHTML(htmlspecialchars_decode(htmlentities(html_entity_decode($html_fragment))));

        $paragraphs = $doc->getElementsByTagName('p');

        if (0 < $paragraphs->length) {
            $excerpt = $paragraphs[0]->nodeValue;
            if (0 < strlen(trim($excerpt))) {
                return strip_tags($excerpt);
            }
        }

        $allElements = $doc->getElementsByTagName('*');

        if (0 < $allElements->length) {
            $excerpt = $allElements[0]->nodeValue;
            if (0 < strlen(trim($excerpt))) {
                return strip_tags($excerpt);
            }
        }

        return '';
    }

    private function extract_image_urls(string $html_fragment)
    {
        $dom = new DOMDocument;
        @$dom->loadHTML($html_fragment);
        $elements = $dom->getElementsByTagName('img');
        $images   = '';
        foreach ($elements as $element) {
            $src    = $element->getattribute('src');
            $images .= "http://archive.mercer.edu/www2/www2.mercer.edu{$src}\n";
        }

        return $images;
    }

    private function extract_author($text)
    {
        $text   = strtolower(trim($text));
        $author = 'news';

        if (0 == strlen($text)) {
            return $author;
        }

        // Dave Beyer (beyer_wd)
        if (false !== strpos($text, 'beyer') && false !== strpos($text, 'dave')) {
            $author = 'beyer_wd';
        }

        // Larry Brumley (brumley_ld)
        if (false !== strpos($text, 'brumley') && false !== strpos($text, 'larry')) {
            $author = 'brumley_ld';
        }

        // Jenny Butkus (butkus_j)
        if (false !== strpos($text, 'butkus') && false !== strpos($text, 'jenny')) {
            $author = 'butkus_j';
        }

        // Richard Cameron (cameron_rl)
        if (false !== strpos($text, 'cameron') && false !== preg_match('/ric(hard|k)/', $text)) {
            $author = 'cameron_rl';
        }

        // Denise Cook (cook_d)
        if (false !== strpos($text, 'cook') && false !== strpos($text, 'denise')) {
            $author = 'cook_d';
        }

        // Steven Ericson (ericson_sp)
        if (false !== strpos($text, 'ericson') && false !== preg_match('/ste(ph|v)en/', $text)) {
            $author = 'ericson_sp';
        }

        // Elizabeth Flader (flader_e)
        if (false !== strpos($text, 'flader') && false !== strpos($text, 'elizabeth')) {
            $author = 'flader_e';
        }

        // Nancy Fullbright (fullbright_n)
        if (false !== strpos($text, 'fullbright') && false !== strpos($text, 'nancy')) {
            $author = 'fullbright_n';
        }

        // Wes Griffith (griffith_w)
        if (false !== strpos($text, 'griffith') && false !== strpos($text, 'wes')) {
            $author = 'griffith_w';
        }

        // David Hefner (hefner_dn)
        if (false !== strpos($text, 'hefner') && false !== strpos($text, 'david')) {
            $author = 'hefner_dn';
        }

        // Cindy Hill (hill_c)
        if (false !== strpos($text, 'hill') && false !== strpos($text, 'cindy')) {
            $author = 'hill_c';
        }

        // Brett Jarrett (jarrett_b)
        if (false !== strpos($text, 'jarrett') && false !== strpos($text, 'brett')) {
            $author = 'jarrett_b';
        }

        // Roban Johnson (johnson_r)
        if (false !== strpos($text, 'johnson') && false !== strpos($text, 'roban')) {
            $author = 'johnson_r';
        }

        // Randy Jones (jones_r3)
        if (false !== strpos($text, 'jones') && false !== strpos($text, 'randy')) {
            $author = 'jones_r3';
        }

        // Joel Lamp (lamp_j)
        if (false !== strpos($text, 'joel') && false !== strpos($text, 'lamp')) {
            $author = 'lamp_j';
        }

        // Judith Lunsford (lunsford_j)
        if (false !== strpos($text, 'lunsford') && false !== preg_match('/jud(ith|y)/', $text)) {
            $author = 'lunsford_j';
        }

        // (Lindsay M. Moss)
        if (false !== strpos($text, 'moss') && false !== strpos($text, 'lindsay')) {
            $author = 'moss_lm';
        }

        // Sonal Patel (patel_sd)
        if (false !== strpos($text, 'patel') && false !== strpos($text, 'sonal')) {
            $author = 'patel_sd';
        }

        // Andy Peters (peters_a)
        if (false !== strpos($text, 'peters') && false !== strpos($text, 'andy')) {
            $author = 'peters_a';
        }

        // Billie Rampley (rampley_bb)
        if (false !== strpos($text, 'rampley') && false !== strpos($text, 'billie')) {
            $author = 'rampley_bb';
        }

        // Dan Recupero (recupero_d)
        if (false !== strpos($text, 'recupero') && false !== strpos($text, 'dan')) {
            $author = 'recupero_d';
        }

        // Anna Sandison (sandison_aw)
        if (false !== strpos($text, 'sandison') && false !== strpos($text, 'anna')) {
            $author = 'sandison_aw';
        }

        // Mark Vanderhoek (vanderhoek_m)
        if (false !== strpos($text, 'vanderhoek') && false !== strpos($text, 'mark')) {
            $author = 'vanderhoek_m';
        }

        // Lance Wallace (wallace_l)
        if (false !== strpos($text, 'wallace') && false !== strpos($text, 'lance')) {
            $author = 'wallace_l';
        }

        return $author;
    }

    private function clean_author($text)
    {
        $text = str_replace(',', ' ', $text);

        $text = preg_replace('/\(\d{3}(\)|\()\s*\d{3}\s*-\s*?\d{4}/i', ' ', $text);
        $text = preg_replace('/\(?\d{3}\s*(-|\/)\s*\d{3}\s*-\s*\d{4}\)?/i', ' ', $text);
        $text = preg_replace('/event contacts?\s*:?/i', ' ', $text);
        $text = preg_replace('/media contacts?\s*:?/i', ' ', $text);
        $text = preg_replace('/media advisorys?\s*:?/i', ' ', $text);
        $text = preg_replace('/registration contacts?\s*:?/i', ' ', $text);
        $text = preg_replace('/session contacts?\s*:?/i', ' ', $text);
        $text = preg_replace('/ext(.?|\s+|.?\s+)\d+/i', ' ', $text);
        $text = preg_replace('/contact\s*:?/i', ' ', $text);
        $text = preg_replace('/ticket\s+sales?:?/i', ' ', $text);
        $text = preg_replace('/or\s*$/i', ' ', $text);

        $text = preg_replace('/\s+/', ' ', $text);

        $text = trim($text);

        return $text;
    }

    private function extract_date($date, $name, $path)
    {
        $parsed_date = date_parse($date);
        preg_match('/^\/news\/articles\/(\d{4})/i', $path, $path_matches);
        preg_match('/^(\d+)/i', $name, $name_matches);

//        echo '<pre>';
//        print_r($parsed_date);
//        echo '</pre>';

        // Year
        if ($parsed_date && 0 == $parsed_date['error_count'] && 0 < strlen($parsed_date['year'])) {
            $year = $parsed_date['year'];
        } elseif (isset($path_matches[1]) && 4 == strlen($path_matches[1])) {
            $year = $path_matches[1];
        } elseif (isset($name_matches[1]) && 6 == strlen($name_matches[1])) {
            $year = substr($name_matches[1], 0, 2);
            if ($year < 0) {
                $year = "20$year";
            } else {
                $year = "19$year";
            }
        } else {
            $year = '1900';
        }

        // Month
        if ($parsed_date && 0 == $parsed_date['error_count'] && 0 < strlen($parsed_date['month'])) {
            $month = str_pad($parsed_date['month'], 2, '0', STR_PAD_LEFT);
        } elseif (isset($name_matches[1]) && 6 == strlen($name_matches[1])) {
            $month = substr($name_matches[1], 2, 2);
        } elseif (isset($name_matches[1]) && 4 == strlen($name_matches[1])) {
            $month = substr($name_matches[1], 0, 2);
        } elseif (isset($name_matches[1]) && 2 == strlen($name_matches[1])) {
            $month = $name_matches[1];
        } else {
            $month = '01';
        }

        // Day
        if ($parsed_date && 0 == $parsed_date['error_count'] && 0 < strlen($parsed_date['day'])) {
            $day = str_pad($parsed_date['day'], 2, '0', STR_PAD_LEFT);
        } elseif (isset($name_matches[1]) && 6 == strlen($name_matches[1])) {
            $day = substr($name_matches[1], 4, 2);
        } elseif (isset($name_matches[1]) && 4 == strlen($name_matches[1])) {
            $day = substr($name_matches[1], 2, 2);
        } else {
            $day = '01';
        }

        // Last chance to deal with errors
        if ($year < 1900 || 2013 < $year) {
            $year = '1900';
        }

        if (12 < $month) {
            if ($day < 12 && $month < cal_days_in_month(CAL_GREGORIAN, $day, $year)) {
                $temp  = $month;
                $month = $day;
                $day   = $temp;
            } else {
                $month = '01';
            }
        }

        if (cal_days_in_month(CAL_GREGORIAN, $month, $year) < $day) {
            $day = '01';
        }

        return "$year-$month-$day";
    }

    private function remove_forbidden_tags(string $html_fragment)
    {
        if (0 == strlen(trim($html_fragment))) {
            return '';
        }

        return $html_fragment = strip_tags($html_fragment, '<a><b><em><i><p><strong>');
    }

//    /**
//     * @param $groupedArr
//     *
//     * @return array
//     */
//    private function grouped_arr_to_importable_arr($groupedArr)
//    {
//        $arr = array();
//
//        foreach ($groupedArr as $guid => $article) {
//            if ( ! isset($article['placeholders']['PH_article'])) {
//                continue;
//            }
//
//            // $importable_article_html = $this->html_fragment_clean($article['placeholders']['PH_article']['html']);
//            $importable_article_html = $article['placeholders']['PH_article']['html'];
//            $importable_article_html = $this->remove_forbidden_tags($importable_article_html);
////            $importable_article_html = tidy_html_fragment($importable_article_html);
////            $importable_article_html = htmlentities($importable_article_html);
//            $importable_headline_text = $article['placeholders']['PH_headline']['text'];
//            $importable_headline_text = $this->convert_ascii($importable_headline_text);
//
//            // echo '<div>';
//            // echo $importable_headline_text;
//            // for( $i = 0; $i <= strlen($importable_headline_text); $i++ ) {
//            //     $char = substr( $importable_headline_text, $i, 1 );
//            //     $ord = ord($char);
//            //     echo "<div><code>${char}</code> = ${ord}</div>";
//            //     // $char contains the current character, so do your processing here
//            // }
//            // echo '</div>';
//
//            $importable_arr                      = array();
//            $importable_arr['categories']        = 'General';
//            $importable_arr['content']           = trim($importable_article_html);
//            $importable_arr['content_raw']       = trim($article['placeholders']['PH_article']['html']);
//            $importable_arr['excerpt']           = trim($this->extract_excerpt($article['placeholders']['PH_article']['html']));
//            $importable_arr['images']            = trim($this->extract_image_urls($article['placeholders']['PH_article']['html']));
//            $importable_arr['path']              = $article['path'];
//            $importable_arr['post_author']       = trim($this->extract_author($article['placeholders']['PH_contact']['text']));
//            $importable_arr['post_author_clean'] = trim($this->clean_author($article['placeholders']['PH_contact']['text']));
//            $importable_arr['post_author_raw']   = trim($article['placeholders']['PH_contact']['text']);
//            $importable_arr['post_date']         = trim($this->extract_date($article['placeholders']['PH_date']['text'],
//                $article['name'], $article['path']));
//            $importable_arr['post_date_raw']     = trim($article['placeholders']['PH_date']['text']);
//            $importable_arr['post_slug']         = trim($article['name']);
//            $importable_arr['tags']              = '';
//            $importable_arr['title']             = trim($importable_headline_text);
//            $importable_arr['unique_identifier'] = trim($guid);
//
//            $arr[] = $importable_arr;
//        }
//
//        return $arr;
//    }

}