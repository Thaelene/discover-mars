<?php

define('URL', 'http://localhost:8888/discover-mars/dist/');
define('API_KEY', '');

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','discover_mars');
define('DB_USER','root');
define('DB_PASS','root');

try
{
    // Try to connect to database
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

    // Set fetch mode to object
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die('Could not connect');
}
