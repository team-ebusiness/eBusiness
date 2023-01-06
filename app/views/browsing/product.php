<?php $this->setSiteTitle('Products'); ?>

<?php $this->start('head'); ?>

<?php $this->end(); ?>


<?php $this->start('body'); ?>
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

<?php $this->end(); ?>