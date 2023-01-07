<?php require_once('include/new_connection.php');?>
<!DOCTYPE html>
<html>
<head>
    <title> Quarterly Sales </title>
    <style>
        table ,th,td{ border: 2px solid black;width: 500px;}
        .btn{width: 10%; height: 5%;font-size: 22px;padding: 0px;}
    </style>
</head>

<body>
    <center>
    <h2>Quartery Sales Report</h2>
    <div class="container">

    <form action="" method="post">
        <h3>Enter the year (yyyy)</h3>
        <input type="text" name="year" placeholder="Enter year">
        <input type="submit" name="search" value="Search">

    </form>
            <?php
            if(isset($_POST['search'])){

                
                $year=$_POST['year'];
                $query = "SELECT QUARTER(order_created_date) as quarter,SUM(bill_total) as quarterly_sales
                FROM order_details
                JOIN payment on `order_details`.payment_id = `payment`.payment_id
                WHERE YEAR(order_details.order_created_date) = $year AND payment.paid_on_date is NOT Null
                GROUP BY quarter
                ORDER BY quarter";
                echo '<table border=1>';
                echo '<tr>
                        <th>Quarter</th>
                        <th>Quarterly Sale sold</th>
                
                      </tr>';
                $result_set=mysqli_query($new_connection,$query);
                while($row = mysqli_fetch_array($result_set)){
                    echo '<tr>
                    <td>'.$row['quarter'].'</td>
                    <td>'.$row['quarterly_sales'].'</td>
                  </tr>';

                }
                echo '</table>';
                

            
        }
        else{
            echo "Empty Table";
        }
        
        ?>

    </table> 
    </div>
</center>
</body>
</html>


<?php mysqli_close($new_connection);?>