<?php
/**
 * contains database credentials
 */
try {

    // or localhost
    $dbHost = 'localhost';

    $dbUsername = 'root';
    $dbPassword = '';

    $dbName = 'vvg';

    // try and connect to the database
    $db = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUsername, $dbPassword);

    // if an error occurs, throw an exception (we are in a try-catch)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $ex) {
    die($ex->getMessage());
}
