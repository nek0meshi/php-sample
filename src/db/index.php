<?php
$dbname = 'sample';
$user = 'sample';
$password = 'sample';
$host = 'db';
$port = 3300;

try {
    $dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
    foreach ($dbh->query('SELECT * from fruits') as $row) {
        print_r($row);
        echo '<br>';
    }
} catch (PDOException $e) {
    print "error: " . $e->getMessage(). "<br>";
}
?>
