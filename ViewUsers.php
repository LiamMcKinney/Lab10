<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link href="tableDisplay.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "l580m686", "peich4EJ",
"l580m686");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users;";
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    echo "<table><tr><th>Username</th></tr>";
    while($row = $result->fetch_assoc()){
        printf("<tr><td>%s</td></tr>", $row["user_id"]);
    }
    echo "</table>";
    /* free result set */
    $result->free();
}else{
    echo "Error. Hopefully you don't see this";
}
/* close connection */
$mysqli->close();
?>
</body>
</html>
