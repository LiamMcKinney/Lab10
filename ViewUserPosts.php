<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Posts</title>
</head>
<body>
    <form action="ViewUserPostsResults.php" method="post">
        <select name="username">
            <?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "l580m686", "peich4EJ", "l580m686");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users;";
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while($row = $result->fetch_assoc()){
        printf("<option value='%s'> %s </option>", $row["user_id"], $row["user_id"]);
    }
    /* free result set */
    $result->free();
}else{
    echo "Error. Hopefully you don't see this";
}
/* close connection */
$mysqli->close();
            ?>

        </select>
        <input type="submit"/>
    </form>
</body>
</html>