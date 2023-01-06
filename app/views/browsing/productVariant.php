<?php $this->setSiteTitle('Variants'); ?>

<?php $this->start('head'); ?>

<?php $this->end(); ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#variants').on('change', function() {
            var demovalue = $(this).val();
            $("div.varDiv").hide();
            $("#" + demovalue).show();
        });
    });
</script>
<style>
    .varDiv {
        display: none;
    }
</style>

<?php $this->start('body'); ?>
    <h1> Variant Page </h1>
    <hr>
    <div>
        <?= 'Product name : ' . $this->product->product_name ?>
        <hr>
        <div>
            <select name="variants" id="variants" onchange="func()">
                <option>Select Option</option>
                <?php foreach ($this->variant_display as $key => $value) { ?>
                    <option value=<?= $key ?>>
                        <?= $value ?>
                    </option>
                <?php } ?>
            </select><br><br>
        </div>
        <?php foreach ($this->details as $key => $value) { ?>
            <div id=<?= $key ?> class="varDiv">
            <?php if($value[0]->quantity == 0) { ?>
                <h6>No items left from the selected variant</h6>
            <?php } else{ ?>
                <?php foreach ($value as $x => $y) { ?>
                    <?= $y->variant_name . ' : ' . $y->variant_val_name ?><br>
                <?php } ?>
                <?= 'Price : Rs.' . $value[0]->price ?><br>
                <?= 'weight : ' . $value[0]->weight ?><br>
                <?= 'Product Img : ' . $value[0]->product_variant_img ?><br>
                <a href="">Add to cart</a>
            <?php }?>
            </div>
        <?php } ?>
    </div>
    <?php $this->end(); ?>
