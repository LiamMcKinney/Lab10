<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "l580m686", "peich4EJ", "l580m686");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$noError = true;
foreach ($_POST as $id => $user) {
    $query = "DELETE FROM Posts WHERE post_id=". $user . ";";

    if(!($result = $mysqli->query($query))){
        $noError = false;
        echo "Error deleting post id " . $id . "<br>";
    }
}

if($noError){
    echo "All selected posts deleted successfully.";
}
/* close connection */
$mysqli->close();
?>