<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Browsing Page </h1> <hr>
    <div> 
        <?php foreach ($this->details as $key => $value) { ?>
        <div>
            <div>
                <?= $value[0] ?> <hr>
            </div> <br>
            <div>
            <?php foreach($value[1] as $id=>$val){ ?>
                    <a href= <?= PROOT."Browsing/productDisplay/" . $val->sub_category_id ?> ><?= 'Products : ' . $val->sub_category_name ?><br></a> 
            <?php } ?> <br> <hr>
        </div>
        </div>
        <?php } ?>
</body>
</html>