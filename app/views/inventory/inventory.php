<?php $this->setSiteTitle('Inventory'); ?>

<?php $this->start('head'); ?>

<?php $this->end(); ?>


<?php $this->start('body'); ?>
<h1> Inventory Page </h1>
<div>
    <?php foreach ($this->details as $key => $value) { ?>
        <div>
            <div>
                <?= $value[0] ?>
            </div>
            <div>
                <?php foreach ($value[1] as $x => $y) {
                    foreach ($y as $id => $val) { ?>
                        <?= $val->variant_name . ' : ' . $val->variant_val_name ?><br>
                    <?php } ?>
                    <?= 'Price : Rs.' . $y[0]->price ?><br>
                    <?= 'Remainig quantity : ' . $y[0]->quantity ?><br><br>
                <?php } ?>
                <hr>
            </div>
        </div>
    <?php } ?>

</div>
<?php $this->end(); ?>