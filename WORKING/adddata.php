<?php
    require_once "conn.php";
    if(isset($_POST['submit'])){

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phonenum = $_POST['phonenum'];
        $totalprice = $_POST['totalprice']; 

        if($firstname != "" && $lastname != "" && $phonenum != ""){
            // Corrected SQL query
            $sql = "INSERT INTO customer (firstname, lastname, phonenum, totalprice) VALUES ('$firstname', '$lastname', '$phonenum',  '$totalprice')";
            if (mysqli_query($conn, $sql)) {
                header("location: index.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }
        }else{
            echo "Name, Class and Marks cannot be empty!";
        }
    }
?>
