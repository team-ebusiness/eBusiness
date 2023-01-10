<?php $this->setSiteTitle('3rd Report'); ?>

<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>
<center>
  <h1> Most sold Categories</h1>
<form method="post" action="<?=PROOT?>reports/most_sold_cats">
  <label>Enter year:</label>
  <input type="number" name="year" min="2000" max="2100" required>
  <input type="submit" value="Search",name="Search">
</form>
<br>
<table> 

</table>
</center>
<?php $this->end(); ?>