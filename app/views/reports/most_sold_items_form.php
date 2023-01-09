<?php $this->setSiteTitle('2nd Report'); ?>

<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>
<center>
 <h1> Most Sold Items Report</h1>
<form method="post" action="<?=PROOT?>reports/most_sold_items">
  <label>Enter dates:</label>
  <input type="date" name="from">
  <input type="date" name="to" >
  <input type="submit" value="Search",name="Search">
</form>
<br>
<table>

</center>

<?php $this->end(); ?>
