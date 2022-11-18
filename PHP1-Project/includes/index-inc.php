<?php
require_once "dbh-inc.php";
require_once "functions-inc.php";

$data = loadUsers($conn);

echo "<table class='table'><tr><th>Name</th><th>Surname</th><th>Username</th></tr>";
while($row = mysqli_fetch_assoc($data)) {
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $username = $row["username"];

    echo "<tr><td>".$firstName."</td><td>".$lastName."</td><td>".$username."</td></tr>";
}
echo "</table>";

// print_r($data);
?>