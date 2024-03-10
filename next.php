<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Bill</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="kk.css">
    <style>
        table {
            width: 100px;
            height: 50vh;
            text-align: center;
            padding-left: 50px;
            padding-right: 80px;
            padding-top: 20px;
            margin-right: 90px;
            margin-top: 10px;
        }

        th {
            font-size: large;
        }

        .form-control {
            padding: 7px;
            margin: 10px;
            width: 140px;
            margin-left: 60px;
            border-radius: 4px;
            border-style: none;
        }

        .item {
            margin-left: 300px;
        }

        .qu {
            padding: 7px;
            width: 60px;
            border-radius: 4px;
            border-style: none;
        }

        .btn2 {
            text-align: center;
            border-style: none;
            background-color: #7efeeb;
            width: 90px;
            height: 35px;
            border-radius: 4px;
            font-family: 'Raleway', sans-serif;
            font-size: 13px;
        }

        .btn2:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2><a href="main2.php">Menu</a></h2>
        <ul>
            <li><a href="add.php"> <i class="fa-solid fa-cart-arrow-down fa-beat"
                        style="color: #ffffff;"></i> Add Items</a></li>
            <li><a href="removei.php"><i class="fa-solid fa-trash-can fa-shake" style="color: #ffffff;"></i> Remove
                    Item</a></li>
            <li><a href="emp1.php"><i class="fa-solid fa-user-plus fa-bounce" style="color: #ffffff;"></i> Add User</a>
            </li>
            <li><a href="emp2.php"><i class="fa-solid fa-user-minus fa-beat-fade"
                        style="color: #ffffff;"></i> Remove User</a></li>
            <li><a href=""><i class="fa-solid fa-display fa-beat" style="color: #ffffff;"></i> View Items</a></li>
            <li><a href=""><i class="fa-solid fa-file-invoice fa-flip" style="color: #ffffff;"></i> Generate Bill</a>
            </li><br><br><br><br><br><br><br><br><br>
            <li><a href=""><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> Logout</a></li>
        </ul>
    </div>

    <h3 align="center">Generate Bill</h3>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "billing2";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process the form data when it's submitted
        $selectedItems = $_POST["SELECTITEMS"];
        $quantities = $_POST["quantity"];
        
        echo '<table style="background-color: #f5f5f5;" align="right">';
        echo '<thead>';
        echo '<div class="res" align="right">';
        echo '<h1 style="margin-right: 280px; margin-top:10px;">Receipt</h1>';
        echo '</div>';
        echo '<div class="receipt">';
        echo '<tr>';
        echo '<th>SR.NO</th>';
        echo '<th>PRODUCT NAME</th>';
        echo '<th>QUANTITY</th>';
        echo '<th colspan="4">PRICE</th>';
        echo '<th>Total</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        $totalBillAmount = 0; // To calculate the total bill amount
        $srNo = 1; // For serial number
        
        // Loop through the selected items and quantities
        foreach ($selectedItems as $key => $item) {
            $quantity = $quantities[$key];
            
            // Fetch the price from the database for the selected item
            $query = "SELECT price FROM items WHERE id = '$selectedItems'";
            $result = mysqli_query($conn, $query);
            
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $price = $row['price'];
                
                // Calculate total item price
                $totalItemPrice = $quantity * $price;
                $totalBillAmount += $totalItemPrice;
                
                // Display the item in the receipt table
                echo '<tr>';
                echo '<td>' . $srNo . '</td>';
                echo '<td>' . $item . '</td>';
                echo '<td>' . $quantity . '</td>';
                echo '<td colspan="4">' . $price . '</td>';
                echo '<td>' . $totalItemPrice . '</td>';
                echo '</tr>';
                
                $srNo++; // Increment serial number
            } else {
                echo "Error fetching price: " . mysqli_error($conn);
            }
        }
        
        echo '</tbody>';
        echo '</table>';
        
        // Display the total bill amount
        echo '<p>Total Bill Amount: ₹' . $totalBillAmount . '</p>';
    }
    ?>

    <div class="pro" align="center">
        <form method="POST">
            <label for="SELECTITEMS" class="item">ITEMS LIST</label>
            <SELECT name="SELECTITEMS[]" id="SELECTITEMS" class="form-control" multiple required>
                <?php
                $query = "SELECT names FROM items";
                $d = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($d)) {
                    echo '<option value="' . $row['names'] . '">' . $row['names'] . '</option>';
                }
                ?>
            </SELECT>
            <label for="quantity">Quantities (comma-separated):</label>
            <input type="text" id="quantity" name="quantity" class="qu" required>
            <input type="submit" name="s" value="Generate Bill" class="btn2">
        </form>
    </div>
</body>

</html>
