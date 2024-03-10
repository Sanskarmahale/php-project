<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <!-- Add any necessary CSS or styling here -->
</head>
<body>
    <h3 align="center">Receipt</h3>

    <table style="background-color: #f5f5f5;" align="center">
        <thead>
            <tr>
                <th>SR.NO</th>
                <th>PRODUCT NAME</th>
                <th>QUANTITY</th>
                <th colspan="4">PRICE</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
           


            // Retrieve the selected item and quantity from the form
            $selectedItem = $_POST['SELECTITEMS'];
            $quantity = $_POST['quantity'];
            $price = $_POST['pricee'];

            // Generate the receipt row based on the selected item and quantity
            echo "<tr>";
            echo "<td>1</td>"; // You can increment this for each item
            echo "<td>$selectedItem</td>";
            echo "<td>$quantity</td>";
            // You should fetch the price from your database based on the selected item and set it here
            echo "<td>$price</td>"; // Replace this with the actual price
            echo "</tr>";
            ?>
        </tbody>
    </table>
</body>
</html>
