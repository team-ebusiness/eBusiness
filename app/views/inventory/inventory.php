<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Inventory Page </h1>
    <div>
        <?php foreach ($this->details as $key => $value)  { ?>
        <div>
           <div>
                <?= $value[0] ?>
            </div>
            <div>
            <?php foreach ($value[1] as $x => $y){
            foreach ($y as $id => $val)  { ?>
                <?= $val->variant_name. ' : ' . $val->variant_val_name ?><br>
            <?php } ?>
            <?= 'Price : Rs.' . $y[0]->price ?><br>
            <?= 'Remainig quantity : ' . $y[0]->quantity ?><br><br>
            <?php } ?>
        <hr>
        </div>
        </div>
        <?php } ?>

    </div>
</body>
</html>