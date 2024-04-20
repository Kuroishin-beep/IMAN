<?php
require_once "conn.php";

// Check if ID is provided in the URL
if(isset($_GET['customer_id'])){
    $id = $_GET['customer_id'];

    // Fetch data of the specified ID
    $sql_query = "SELECT * FROM customer WHERE customer_id='$id'";
    $result = $conn->query($sql_query);
    $row = $result->fetch_assoc();
}

// Check if form is submitted
if(isset($_POST['submit'])){
    // Retrieve form data and sanitize
    $id =  mysqli_real_escape_string($conn, $_POST['id']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $phonenum = mysqli_real_escape_string($conn, $_POST['phonenum']);
    $totalprice = mysqli_real_escape_string($conn, $_POST['totalprice']); // Make sure to sanitize this input

    // Update data in the database
    $sql_query = "UPDATE customer SET firstname='$firstname', lastname='$lastname', phonenum='$phonenum', totalprice='$totalprice' WHERE customer_id='$id'";
    if ($conn->query($sql_query) === TRUE) {
        $conn->close();
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <script>
            function addToTotal(value) {
                var currentTotal = parseFloat(document.getElementById('total').value) || 0;
                var newValue = currentTotal + value;
                document.getElementById('total').value = newValue.toFixed(2);
                document.getElementById('totalprice').value = newValue.toFixed(2);
            }
    </script>
</head>

<body>
<div class="container">
    <!-- Coffee Ordering Form -->
    <form name="calculator" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Coffee Ordering Form -->
            <h2>Coffee Order</h2>
            <input type="button" value="CAPPUCCINO" onClick="addToTotal(130)">
            <input type="button" value="MACCHIATO" onClick="addToTotal(150)">
            <input type="button" value="FLAT-WHITE" onClick="addToTotal(140)">
            <input type="button" value="LATTE" onClick="addToTotal(120)">
            <input type="button" value="MOCHA" onClick="addToTotal(150)">
            <input type="button" value="AFFOGATO" onClick="addToTotal(160)"><br>

            <br>Total: <input type="text" id="total" name="total" value="0">
            <input type="hidden" name="totalprice" id="totalprice">
            <input type="reset" value="CANCEL">

            <!-- Personal Information Form -->
            <h1 style="text-align: center;margin: 50px 0;">Update Ordering Data - Row ID: <?php echo $id; ?></h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row">
                <div class="form-group col-lg-4">
                        <label for="">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control"
                            value="<?php echo isset($row['firstname']) ? $row['firstname'] : ''; ?>" required>
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control"
                        value="<?php echo isset($row['lastname']) ? $row['lastname'] : ''; ?>" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="">Phone Number</label>
                    <input type="text" name="phonenum" id="phonenum" class="form-control"
                        value="<?php echo isset($row['phonenum']) ? $row['phonenum'] : ''; ?>" required>
                </div>
                <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
        </form>
        <div class="container">
            <h2 style="text-align: center;margin: 50px 0;">Student Data</h2>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { 
                            $Id = $row['customer_id'];
                            $firstname = $row['firstname'];
                            $lastname = $row['lastname'];
                            $phonenum = $row['phonenum'];
                            $totalprice = $row['totalprice'];
                    ?>
                    <tr class="trow">
                        <td><?php echo $row_number++; ?></td>
                        <td><?php echo $firstname; ?></td>
                        <td><?php echo $lastname; ?></td>
                        <td><?php echo $phonenum; ?></td>
                        <td><?php echo $totalprice; ?></td>
                        <td><a href="updatedata.php?id=<?php echo $Id; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="deletedata.php?id=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
