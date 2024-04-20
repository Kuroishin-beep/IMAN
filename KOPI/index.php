<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
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
            var newValue = currentTotal + parseFloat(value);
            document.getElementById('total').value = newValue;
            // Set the total price in the hidden field
            document.getElementById('totalprice').value = newValue.toFixed(2);
        }
    </script>
</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Cafe Ala Jaja</h1>
        <div class="container">
        <!-- Coffee Ordering Form -->
        <form name="calculator" method="post" action="adddata.php">
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
           
                <h2 style="margin-top: 50px;">Personal Information</h2>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="phonenum">Phone Number</label>
                        <input type="text" name="phonenum" id="phonenum" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <!-- Calculate total price before submitting the form -->
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    <!-- PHP and MySQL Data Display -->
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table table-dark">
                <!-- Table Header -->
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
                    require_once "conn.php";
                    $sql_query = "SELECT * FROM customer";
                    if ($result = $conn->query($sql_query)) {
                        $row_number = 1; // Initialize row number counter
                        while ($row = $result->fetch_assoc()) { 
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
                        <!-- Edit and Delete Buttons -->
                        <td><a href="updatedata.php?id=<?php echo $row['ref_id']; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="deletedata.php?id=<?php echo $row['ref_id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                    <?php
                            } 
                        } 
                    ?>
                </tbody>
              </table>
        </div>
    </section>