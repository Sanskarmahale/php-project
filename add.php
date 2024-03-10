<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=League+Spartan:wght@800&family=Raleway:wght@800&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="kk.css">

</head>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "billing2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>







<body>
    <div class="sidebar">
        <h2><a href="main2.php">Menu</a></h2>

        <ul>
            <li><a href="add.php"> <i class="fa-solid fa-cart-arrow-down fa-beat" style="color: #ffffff;"></i> Add Items</a></li>
            <li><a href="removei.php"><i class="fa-solid fa-trash-can fa-shake" style="color: #ffffff;"></i> Remove Item</a></li>
            <li><a href="emp1.php"><i class="fa-solid fa-user-plus fa-bounce" style="color: #ffffff;"></i> Add User</a></li>
            <li><a href="emp2.php"><i class="fa-solid fa-user-minus fa-beat-fade" style="color: #ffffff;"></i> Remove User</a></li>
            <li><a href="view.php"><i class="fa-solid fa-display fa-beat" style="color: #ffffff;"></i> View Items</a></li>
            <li><a href="genrate2.php"><i class="fa-solid fa-file-invoice fa-flip" style="color: #ffffff;"></i> Genrate Bill</a></li><br><br><br><br><br><br><br><br><br>
            <li><a href=""><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> Logout</a></li>
        </ul>



    </div>
    <h3 align="center">Add Items</h3>
    <div class="aa" id="add" align="center">
        <form method="POST">

            <label for="add">Name :</label>
            <input type="text" name="add" class="control1" required>
            <br>
            <br>
            <br><br>


            <label for="p1">Price :</label>
            <input type="text" name="p1" class="control1" required>
            <br>
            <br><br><br>

            <label for="c1">Code :</label>
            <input type="text" name="c1" class="control1" required>
            <br>
            <br><br><br>



            <input type="submit" name="Submit" value="save" class="btn">
        </form>


    </div>
    <?php

    if (isset($_POST['Submit'])) {
        $add1 = $_POST['add'];
        $price = $_POST['p1'];
        $code = $_POST['c1'];
        $q = "INSERT INTO items values('$add1','$price','$code')";
        $res = mysqli_query($conn, $q);
    }
    ?>






</body>

</html>