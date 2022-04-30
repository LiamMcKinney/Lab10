<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "l580m686", "peich4EJ",
"l580m686");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO Users (user_id) VALUES ('" . $_POST['username'] . "');";
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    echo "User " . $_POST["username"] . " successfully created.";
    /* free result set */
    $result->free();
}else{
    echo "User " . $_POST["username"] . " already exists.";
}
/* close connection */
$mysqli->close();
?>