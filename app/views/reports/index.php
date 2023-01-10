<?php $this->setSiteTitle('Reports'); ?>

<?php $this->start('head'); ?>
<style>
      a:link {
         color: greenyellow;
         background-color: transparent;
         text-decoration: none;
      }
      a:visited {
         color: black;
         background-color: transparent;
         text-decoration: none;
      }
      a:active {
         color: black;
         background-color: transparent;
      }
   </style>

<?php $this->end(); ?>

<?php $this->start('body'); ?>
<center>
<br>
<a href="index"style="text-decoration: none"><h1 class="text-center red">Reports</h1></a>
<br>
<h2><a href="quarterly_sales"style="text-decoration: none">1.Quarterly Sales Report</a></h2>
<h2><a href="most_sold_products"style="text-decoration: none">2.Most Sold Products Report </a></h2>
<h2><a href="most_sold_cats"style="text-decoration: none">3.Most Sold Categories Report</a></h2>
<h2><a href="interest_of_item"style="text-decoration: none">4.Interest of an Item Report</a></h2>
<h2><a href="customer_orders"style="text-decoration: none">5.Customer Orders Report</a></h2>
</center>
<?php $this->end(); ?>
