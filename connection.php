<?php
// Establish the database connection
$connection = mysqli_connect('sql9.freemysqlhosting.net', 'sql9635', '','hos');
$connect = $connection;
// Check if the connection was successful
if (!$connect) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Import the SQL file
// $sqlFile = 'path/to/hos.sql'; // Replace with the actual path to your hos.sql file
// $sql = file_get_contents('hos.sql');

// if (mysqli_multi_query($connection, $sql)) {
//     echo 'SQL file imported successfully.';
// } el
//     echo 'Error importing SQL file: ' . mysqli_error($connection);
// }
?>