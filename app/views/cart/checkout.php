<?php $this->setSiteTitle('header'); ?>

<?php $this->start('head'); ?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<?php $this->end(); ?>

<?php $this->start('body'); ?>



<div class="container" style="margin-top: 100px">
    <?php
    $db = Db::getInstance();
    $id = $_SESSION[Customer::currentLoggedInUser()->getSessionName()];

   $total=0;
    $contacts=$db->find('delivery_info',[
        'conditions'=>'customer_id="2"',
        'order'=>'first_name, last_name',]);

    $rows = $db->call_procedure('view_cart', [2]);
    $i=count($rows);
    $items= ' ';


    foreach ($rows as $row) {
    $items.= $row->product_name . ' x ' . $row->quantity . '  ';
        $total+= $row->total
    ?>

        <?php
    }
    ?>


    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div>
                                <p>  Deliver to: <?php echo $contacts[0]->first_name?> <?php echo $contacts[0]->last_name ?></p>
                                <p>   <?php echo $contacts[0]->phone_no ?>     <?php echo $contacts[0]->address1 ?>, <?php echo $contacts[0]->address2 ?>, <?php echo $contacts[0]->city ?>, <?php echo $contacts[0]->state?>, <?php echo $contacts[0]->postal_code ?></p>
                                <p style="color: #0a53be">   Bill to the same address</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col">
                            <div class="row">

                                <div class="col">
                                   <p>  Order summary: </p>
                                    <p>  <?php echo $items ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p>Product Cost</p>
                        </div>
                        <div class="col">
                            <p class="text-end"><i class="fa fa-euro"></i><?php echo round($total, 2)?></p>
                        </div>
                    </div>
                    <hr style="color: rgb(0,0,0);" />
                    <div class="row">
                        <div class="col">
                            <p>Shipng Cost</p>
                        </div>
                        <div class="col">
                            <p class="text-end"><i class="fa fa-euro"></i>  </p>
                        </div>
                    </div>

                    <hr style="color: rgb(0,0,0);" />

                    <div class="row">
                        <div class="col">
                            <p style="font-size: 18px;"><strong>Total</strong></p>
                        </div>
                        <div class="col">
                            <p class="text-end" style="font-size: 18px;"><i class="fa fa-euro"></i> </p>
                        </div>
                    </div>

                    <hr style="color: rgb(0,0,0);" />
                    <div class="row">
                        <div class="col-12 col-sm-6"><button class="btn btn-outline-dark d-block w-100" type="submit">Cash on delivery</button></div>
                        <div class="col-12 col-sm-6"><form method="POST" action="<?= PROOT ?>cart/checkout">
                                <button class="btn btn-outline-dark d-block w-100" type="submit" style="background: #ffc720;border: none">Proceed to Pay
                                </button>
                            </form></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->end(); ?>
