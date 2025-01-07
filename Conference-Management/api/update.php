<?php

use classes\Conference;
use classes\DbConnector;

require_once("../classes/DbConnector.php");
require_once("../classes/Conference.php");

try {
    // Get the database connection
    $db = new DbConnector();
    $conference = new Conference();

    // Set the database connection for the conference
    $conference->setCon($db->getConnection());

    // Check request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception("Method not allowed");
    }

    // Validate input
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['date']) && isset($_POST['host']) && isset($_POST['location'])){
        // Sanitize input
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8');
        $host = htmlspecialchars($_POST['host'], ENT_QUOTES, 'UTF-8');
        $location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');

        // Set the conference data
        $conference->setId($id);
        $conference->setName($name);
        $conference->setDescription($description);
        $conference->setDate($date);
        $conference->setHost($host);
        $conference->setLocation($location);

        // Update the conference
        if ($conference->updateConference() !== true) {
            throw new Exception("Failed to update the conference");
        }

        // Return the response as JSON
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode(["message" => "Conference updated successfully"], JSON_PRETTY_PRINT);
    } else {
        throw new Exception("Missing required fields");
    }
} catch (Exception $e) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(["error" => $e->getMessage()], JSON_PRETTY_PRINT);
}
