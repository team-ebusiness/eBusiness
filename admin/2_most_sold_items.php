<?php require_once('include/new_connection.php');?>
<!DOCTYPE html>
<html>
<head>
    <title> most Sold Items </title>
    <style>
        table {border-collapse: collapse;}
        td,th{border: 1px solid black ;padding: 5px;}
    </style>
</head>

<body>
    <center>
    <h2> Most Sold Items in a Given Time </h2>
    <form action="" method="post">
        <input type="date" name="from">
        <input type="date" name="to">
        <input type="submit" name="search" value="Search">

    </form>
    <?php
            if(isset($_POST['search'])){

                
            $from =$_POST["from"];
            $to =$_POST["to"];
            
            $sql="SELECT product.product_name as product_name, SUM(cart_item.quantity) as sold_quantity
            FROM cart_item
            JOIN product_variant ON cart_item.product_variant_id = product_variant.product_variant_id
            JOIN product ON product_variant.product_id = product.product_id
            JOIN order_details ON cart_item.cart_id = order_details.cart_id
            WHERE order_details.order_created_date BETWEEN '$from' AND '$to'
            GROUP BY product.product_name
            ORDER BY sold_quantity DESC";
                echo '<table border=1>';
                echo '<tr>
                        <th>Product Name</th>
                        <th>Quantity Sold</th>
                
                      </tr>';
                $result_set=mysqli_query($new_connection,$sql);
                while($row = mysqli_fetch_array($result_set)){
                    echo '<tr>
                    <td>'.$row['product_name'].'</td>
                    <td>'.$row['sold_quantity'].'</td>
                  </tr>';

                }
                echo '</table>';
                

            
        }
        else{
            echo "Empty Table";
        }
        
        ?>
    </center>
</body>
</html>
<?php mysqli_close($new_connection);?>