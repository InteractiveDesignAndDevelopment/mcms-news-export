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

namespace IDD\MCMSExport;

require_once './class.article.php';

class Articles
{

    /**
     * @var \PDO
     */
    private $conn;
    /**
     * @var array
     */
    private $articles = [];

    /* Functions: Public */

    /**
     * class.articles constructor.
     *
     * @param Db $db
     */
    public function __construct(Db $db)
    {
        $this->conn = $db->getConnection();
    }

    /**
     * class.articles destructor.
     */
    public function __destruct()
    {
        $this->conn = null;
    }

    /**
     * @return Articles
     */
    public function find()
    {
        $sql = <<<SQL
           SELECT postings.[guid]       AS posting_guid,
                  postings.name         AS posting_name,
                  postings.display_name AS posting_display_name,
                  postings.[path]       AS posting_path,
                  placeholders.name     AS placeholder_name,
                  placeholders.[type]   AS placeholder_type,
                  placeholders.html     AS placeholder_html,
                  placeholders.[text]   AS placeholder_text
             FROM postings
        LEFT JOIN placeholders
               ON postings.guid = placeholders.posting_guid
            WHERE 1=1
              AND postings.[path] LIKE '/news/articles/%'
              AND postings.[path] NOT LIKE '%default'
              AND postings.[template_guid] = '2B44B611-1C16-4FA4-A1F2-35B460C277CF'
-- Begin random sampling =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
--               AND postings.guid IN (
--            SELECT TOP 10 po2.guid
--              FROM postings po2
--         LEFT JOIN placeholders pl2 ON po2.guid = pl2.posting_guid
--             WHERE po2.[path] LIKE '/news/articles/%'
--               AND po2.[path] NOT LIKE '%default'
--               AND po2.[template_guid] = '2B44B611-1C16-4FA4-A1F2-35B460C277CF'
--          ORDER BY NEWID())
-- End random sampling =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
-- Begin specific problems =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
--                   AND postings.guid IN (
--                   -- Title ends in capital A circumflex
--                   '14151E1C-7C07-4FA7-B79C-12869D0BC177',
--                   '1F6C0185-A3D4-4B13-AA96-440FF2A4444D',
--                   -- Title has lowercase a circumflex Euro TM
--                   'EA277333-9279-4048-A8F4-DD480986B4A3',
--                   '6598359B-B1EE-463E-9E3B-85DE1B34C3A5',
--                   'A0926DFA-79A7-47C2-BA74-513B1E36D205',
--                   -- Title has misplaced interrogation point
--                   '4EAB1913-530A-4CF7-8621-83C0403AC0C8',
--                   -- Body has wrong e aigu accent
--                   '6AC60A98-9757-416F-B354-BC93610372D0',
--                   -- Um... lots
--                   'A9A8E3C5-9D9F-4320-A1B7-AF7ADBA9B3F3',
--                   -- All divs, no ps
--                   'DB5DD77F-B34F-4630-B4FF-2101D32FFBDC',
--                   -- p tag with extraneous attributes
--                   '005C9A2D-47F5-4AC8-B7D3-773D6947C273',
--                   -- Facutly & Staff Notables
--                   'ECC31E65-FB9E-4571-9EA4-2FFAD1B573D1',
--                   '81DBDD7A-BFA2-4593-BD83-C100C5D9600A',
--                   '88FA331A-6E75-44DB-83E8-312ED47F031A',
--                   '9A1B4383-DA2D-4013-ABB0-6AB5DCF3A7B1',
--                   -- HTML entity in title and styling
--                   'DDA02377-690E-4523-9A8D-1F63A1C3D438'
--                   )
-- End specific problems =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
         ORDER BY posting_name ASC
SQL;

        $statementResults = $this->conn->query($sql);

        $this->articles = $this->statementResultsToArticleArray($statementResults);

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
//        $arr = [];
//
//        foreach ($this->stmtGrouped() as $guid => $details) {
//            $details['guid'] = $guid;
//            $arr[] = new article($details);
//        }
//
//        return $arr;
        return $this->articles;
    }

    /**
     * @param $statementResults
     *
     * @return array
     */
    public function statementResultsToArticleArray($statementResults)
    {
        $arr      = array();
        $articles = array();

        foreach ($statementResults as $row) {
            $posting_guid     = $row['posting_guid'];
            $placeholder_name = $row['placeholder_name'];

            // Posting
            if ( ! isset($arr[$posting_guid])) {
                $arr[$posting_guid] = array();
            }

            // Posting::Placeholders
            if ( ! isset($arr[$posting_guid]['placeholders'])) {
                $arr[$posting_guid]['placeholders'] = array();
            }

            // Posting::Placeholders::Placeholder
            if ( ! isset($arr[$posting_guid]['placeholders'][$row['placeholder_name']])) {
                $arr[$posting_guid]['placeholders'][$placeholder_name] = array();
            }

            // Posting::Display Name
            if ( ! isset($arr[$posting_guid]['display_name'])) {
                $arr[$posting_guid]['display_name'] = $row['posting_display_name'];
            }

            // Posting::GUID
            if ( ! isset($arr[$posting_guid]['posting_guid'])) {
                $arr[$posting_guid]['guid'] = $row['posting_guid'];
            }

            // Posting::Name
            if ( ! isset($arr[$posting_guid]['name'])) {
                $arr[$posting_guid]['name'] = $row['posting_name'];
            }

            // Posting::Path
            if ( ! isset($arr[$posting_guid]['path'])) {
                $arr[$posting_guid]['path'] = $row['posting_path'];
            }

            // Posting::Placeholders::Placeholder::HTML
            if ( ! isset($arr[$posting_guid]['placeholders'][$placeholder_name]['html'])) {
                $arr[$posting_guid]['placeholders'][$placeholder_name]['html'] = $row['placeholder_html'];
            }

            // Posting::Placeholders::Placeholder::Text
            if ( ! isset($arr[$posting_guid]['placeholders'][$row['placeholder_name']]['text'])) {
                $arr[$posting_guid]['placeholders'][$placeholder_name]['text'] = $row['placeholder_text'];
            }

            // Posting::Placeholders::Placeholder::Type
            if ( ! isset($arr[$posting_guid]['placeholders'][$row['placeholder_name']]['type'])) {
                $arr[$posting_guid]['placeholders'][$placeholder_name]['type'] = $row['placeholder_type'];
            }
        }

        foreach ($arr as $a) {
            $articles[] = new Article($a);
        }

        return $articles;
    }

}
