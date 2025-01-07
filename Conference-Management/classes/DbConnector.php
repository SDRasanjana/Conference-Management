<?php

namespace classes;

use Exception;
use PDO;
use PDOException;

/**
 * Class DbConnector
 *
 * Handles database connections using PDO
 */
class DbConnector
{
    private string $host = 'localhost';
    private string $db = 'conference';
    private string $username = 'root';
    private string $password = '';
    private PDO $pdo;

    /**
     * DbConnector constructor.
     * Create a new PDO instance for the database connection
     *
     * @throws Exception If an error occurs while connecting to the database
     */
    public function __construct()
    {
        // Set Domain Name System (DNS) for the database connection
        $dsn = "mysql:host=$this->host;dbname=$this->db";

        // Set the PDO options
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            // Create a new PDO instance
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            // If an error occurs, throw an exception
            throw new Exception("Database connection error: " . $e->getMessage());
        }
    }

    /**
     * Get the PDO connection instance.
     *
     * @return PDO The PDO instance for the database connection
     */
    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
