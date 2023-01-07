<?php include 'include/new_connection.php';
    
    $id =$_POST["id"];
    
    $sql="SELECT MONTHNAME(order_created_date) as month, COUNT(*) as num_sales
    FROM `order_details` o
    JOIN cart_item ci ON o.cart_id = ci.cart_id
    JOIN product_variant pv ON ci.product_variant_id = pv.product_variant_id
    WHERE pv.product_id = $id AND YEAR(order_created_date) = 2022
    GROUP BY MONTH(order_created_date)";
    
    $result = $new_connection->query($sql);

    if($result->num_rows>0){
        //echo "Having data";
        echo '<table border=1>';
        echo '<tr>
                <th>Month</th>
                <th>Items sold</th>
        
              </tr>';
        while($row=$result->fetch_assoc()){
            echo '<tr>
                <td>'.$row['month'].'</td>
                <td>'.$row['num_sales'].'</td>
              </tr>';
        }
        echo '</table>';
    }
    else{
        echo "Empty Table";
    }

?>