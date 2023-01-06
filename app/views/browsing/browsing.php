<?php $this->setSiteTitle('Product Catagories'); ?>

<?php $this->start('head'); ?>

<?php $this->end(); ?>


<?php $this->start('body'); ?>
<h1> Browsing Page </h1>
<hr>
<div>
    <?php foreach ($this->details as $key => $value) { ?>
        <div>
            <div>
                <?= $value[0] ?>
                <hr>
            </div> <br>
            <div>
                <?php foreach ($value[1] as $id => $val) { ?>
                    <a href=<?= PROOT . "Browsing/productDisplay/" . $val->sub_category_id ?>><?= 'Products : ' . $val->sub_category_name ?><br></a>
                <?php } ?> <br>
                <hr>
            </div>
        </div>
    <?php } ?>

<?php $this->end(); ?>