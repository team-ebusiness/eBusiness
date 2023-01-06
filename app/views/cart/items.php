<?php $this->setSiteTitle('Cart'); ?>

<?php $this->start('head'); ?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Cart</title>
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">

<style>
    body {
        margin:50px;
    }
</style>

<?php $this->end(); ?>

<?php $this->start('body'); ?>

<h1>List of Items</h1>
<br>
<table class="table">
    <thead>
    <tr>
        <th>Item Name</th>
        <th>Image</th>
        <th>price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $db = Db::getInstance();
    $getid=$db->query("SELECT user_id FROM user_session");
    $id=$getid->results();
    $id=$id[0]->user_id;

    $getid=$db->query("call view_cart($id)");
    $row=$getid->results();
    $name=$row[0]->product_name;

    $stmt = $db->query(
        "call view_cart($id)");


    $users = $stmt->results();
    $r=0;
    $a=$users[$r]->product_name;

    while($r<count($users)){
        echo "<tr>";
        echo "<td><img height='64' width='64' src='".$users[$r]->product_variant_img."'></td>";
        echo "<td>".$users[$r]->product_name."</td>";
        echo "<td>".$users[$r]->price."</td>";
        echo "<td>".$users[$r]->quantity."</td>";
        echo "<td>".$users[$r]->total."</td>";
        echo "</tr>";
        $r++;
    }
    {
        ?>

    <?php }
    ?>
    </tbody>

</table>

<button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="button">Continue Shopping</button>
<form method="POST" action="<?= PROOT ?>cart/checkout">
    <button type="submit" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" >Checkout</button>
</form>

<?php $this->end(); ?>