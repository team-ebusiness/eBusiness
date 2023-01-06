<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Product Page </h1> <hr>
    <div> 
        <?php if (!count($this->details)) { ?>
            <h3> No products are available </h3>
        <?php } else { ?> 
        <?php foreach ($this->details as $value) { ?>
        <div>
            <div>
            <a href= <?= PROOT."Browsing/variantDisplay/" . $value[0]->product_id ?> ><?=  $value[0]->product_name ?> </a> <hr>
            </div> <br>
        </div>
    </div>
    <?php }} ?>
</body>
</html>