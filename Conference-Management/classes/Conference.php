<?php

namespace classes;

use Exception;
use PDO;

/**
 * Class Conference
 *
 * Handles the conference data
 */
class Conference
{
    private int $id;
    private string $name;
    private string $description;
    private string $date;
    private string $host;
    private string $location;
    private PDO $con;

    /**
     * Conference constructor.
     *
     * Initialize the conference object
     */
    public function __construct()
    {
        // Logic to initialize the conference object
    }

    /**
     * Get the conference id
     *
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the conference name
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the conference description
     *
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Get the conference date
     *
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * Get the conference host
     *
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * Get the conference location
     *
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * Get the conference connection
     *
     * @param PDO $con
     */
    public function setCon(PDO $con): void
    {
        $this->con = $con;
    }

    /**
     * Get all conferences from the database
     *
     * @return false|array
     */
    public function getAllConferences(): false|array
    {
        try {
            // Query to get all conferences
            $query = 'SELECT * FROM conferences';

            // Prepare the query
            $stmt = $this->con->prepare($query);

            // Execute the query
            $stmt->execute();

            // Fetch all products
            return $stmt->fetchAll();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }

    /**
     * Add a new conference to the database
     *
     * @return bool
     */
    public function addConference(): bool
    {
        try {
            // Start the transaction
            $this->con->beginTransaction();

            // Query to add a new conference
            $query = 'INSERT INTO conferences (name, description, date, host, location) VALUES (:name, :description, :date, :host, :location)';

            // Prepare the statement
            $stmt = $this->con->prepare($query);

            // Bind the parameters
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':date', $this->date, PDO::PARAM_STR);
            $stmt->bindParam(':host', $this->host, PDO::PARAM_STR);
            $stmt->bindParam(':location', $this->location, PDO::PARAM_STR);

            // Execute the statement
            if (!$stmt->execute()) {
                // Rollback the transaction
                $this->con->rollBack();
                return false;
            }

            // Commit the transaction
            $this->con->commit();

            return true;
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }

    /**
     * Update a conference in the database
     *
     * @return bool
     */
    public function updateConference(): bool
    {
        try {
            // Start the transaction
            $this->con->beginTransaction();

            // Query to update a conference
            $query = 'UPDATE conferences SET name = :name, description = :description, date = :date, host = :host, location = :location WHERE id = :id';

            // Prepare the statement
            $stmt = $this->con->prepare($query);

            // Bind the parameters
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':date', $this->date, PDO::PARAM_STR);
            $stmt->bindParam(':host', $this->host, PDO::PARAM_STR);
            $stmt->bindParam(':location', $this->location, PDO::PARAM_STR);

            // Execute the statement
            if (!$stmt->execute()) {
                // Rollback the transaction
                $this->con->rollBack();
                return false;
            }

            // Commit the transaction
            $this->con->commit();

            return true;
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }

    /**
     * Delete a conference from the database
     *
     * @return bool
     */
    public function deleteConference(): bool
    {
        try {
            // Start the transaction
            $this->con->beginTransaction();

            // Query to delete a conference
            $query = 'DELETE FROM conferences WHERE id = :id';

            // Prepare the statement
            $stmt = $this->con->prepare($query);

            // Bind the parameters
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

            // Execute the statement
            if (!$stmt->execute()) {
                // Rollback the transaction
                $this->con->rollBack();
                return false;
            }

            // Commit the transaction
            $this->con->commit();

            return true;
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }
}