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
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        throw new Exception("Method not allowed");
    }

    // Get all the conferences
    $products = $conference->getAllConferences();

    // Return the products as JSON
    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($products, JSON_PRETTY_PRINT);
} catch (Exception $e) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(["error" => $e->getMessage()], JSON_PRETTY_PRINT);
}