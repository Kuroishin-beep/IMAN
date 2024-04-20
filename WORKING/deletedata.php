<?php
require_once "conn.php";

if(isset($_GET['customer_id'])){
    $id = $_GET['customer_id'];

    $sql_query = "DELETE FROM customer WHERE customer_id='$id'";
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
