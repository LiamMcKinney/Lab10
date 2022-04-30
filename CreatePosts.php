<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "l580m686", "peich4EJ",
"l580m686");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO Posts (content, author_id) VALUES ('" . $_POST['content'] . "', '" . $_POST['username'] . "');";
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    echo "Post successfully created.";
    /* free result set */
    $result->free();
}else{
    echo "User " . $_POST["username"] . " does not exist.";
}
/* close connection */
$mysqli->close();
?>