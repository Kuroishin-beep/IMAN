<?php
require_once "conn.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql_query = "DELETE FROM results WHERE id='$id'";
    if ($conn->query($sql_query) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
    
    // Redirect back to the main screen
    header("Location: index.php");
    exit();
}
?>
