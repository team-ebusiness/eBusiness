<?php $this->setSiteTitle('Interest of an Item'); ?>

<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>
<center>
  <br>
  <h1> Interest of an item Report</h1>
  <br>
<form method="post" action="<?=PROOT?>reports/interest_of_item">
  <label><strong> Enter Product ID:</strong></label>
  <input type="number" min="1" name="id">
  <input type="submit" value="Search",name="Search">
</form>
<style>
table, th, td {
  border: 1.5px solid black;
  border-collapse: collapse;
}
th, td {
  background-color: peachpuff;
}

</style>
<br>
<table border="1px"> 
  
<?php
  $db = Db::getInstance();
  //SELECT product_id,product_name FROM product ORDER by product_id
  //query for the following view
  
  $products = $db->query('SELECT * FROM `product_details`')->results();
  echo '<table style="width: 30%; height: 100%">';
  echo '<tr border=2px>
        <th>Product ID</th>
        <th>Product Name</th>
        </tr>';
  foreach($products as $product) {
    echo '<tr>';
    echo "<td>$product->product_id</td>";
    echo "<td>$product->product_name</td>";
  
    echo "</tr>";
  }
?>
</table>
</center>
<?php $this->end(); ?>