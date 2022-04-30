<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Posts</title>
    <link href="tableDisplay.css" rel="stylesheet" type="text/css">
</head>
<body>
<form action="DeletePostResult.php" method="post">
<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "l580m686", "peich4EJ",
"l580m686");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT post_id, content, author_id FROM Posts;";
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    echo "<table><tr><th>Username</th><th>Post</th><th>Delete?</th></tr>";
    while($row = $result->fetch_assoc()){
        printf("<tr><td>%s</td><td>%s</td><td><input type='checkbox' name='%d' value='%d'/>Delete?</td></tr>", $row["author_id"], str_replace("\n", "<br>", $row["content"]), $row["post_id"], $row["post_id"]);
    }
    echo "</table><input type='submit' />";
    /* free result set */
    $result->free();
}else{
    echo "Error. Hopefully you don't see this";
}
/* close connection */
$mysqli->close();
?>
</form>
</body>
</html>
