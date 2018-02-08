<?php
/**
 * Created by PhpStorm.
 * User: SAYRE_TS
 * Date: 2018-02-08
 * Time: 09:25 AM
 */

namespace IDD\MCMSExport;

class Db
{
    private static $instance;
    private $connection; // Of what there is a single instance
    private $host = 'Wolverine.merceru.local';
    private $database = 'mcms-export';

    /**
     * Db constructor.
     */
    private function __construct()
    {
        try {
            $this->connection = new \PDO("sqlsrv:server=$this->host;Database=$this->database");
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(\PDO::SQLSRV_ATTR_ENCODING, \PDO::SQLSRV_ENCODING_UTF8);
        } catch (PDOException $e) {
            die(print_r($e->getMessage()));
        }
    }

    /**
     * Get an instance of the Db
     *
     * @return Db
     */
    public static function getInstance()
    {
        // If no instance then make one
        if ( ! self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get PDO connection
     *
     * @return \PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Magic method clone is empty to prevent duplication of connection
     */
    private function __clone()
    {
    }
}
