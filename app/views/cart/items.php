<?php $this->setSiteTitle('Title here'); ?>

<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>
    <h4 class="text-center h4-title-card bg-primary">Welcome to Title!</h4>
    <?= $this->itemsToDisplay['cart/items']; ?>
<?php $this->end(); ?>