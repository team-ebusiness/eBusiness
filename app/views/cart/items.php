<?php $this->setSiteTitle('Cart'); ?>

<?php $this->start('head'); ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="<?= PROOT ?>css/custom.css" rel="stylesheet">

<?php require_once 'app/views/layouts/header.php';?>

    <script>
        $(document).ready(function () {
            $('.remove').on('click', function () {
                var id = $(this).attr('id');

                $.ajax({
                    type: "post",
                    url: "<?= PROOT ?>cart/remove",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        location.reload();
                    }
                });
            });
        });
    </script>

<?php $this->end(); ?>

<?php $this->start('body'); ?>

    <section class="h-100" style="background-color: #eee; height:100%">
        <div class="container h-100 py-5 " ><div >" "</div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10 ">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black" >Shopping Cart</h3>
                        <div>
                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price
                                    <i
                                            class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                    </div>
                    <?php
                    $db = Db::getInstance();
                    $id = $_SESSION[Customer::currentLoggedInUser()->getSessionName()];

                    $rows = $db->call_procedure('view_cart', [2]);
                    $i=count($rows);
                    $total = 0;


                    foreach ($rows as $row) {
                        $total+= $row->total;
                        ?>
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">

                                        <?php echo "<img height='64' width='64' border-radius='15' src='" . $row->product_variant_img . "' />"; ?>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2"><?php echo $row->product_name ?></p>

                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <buton
                                                class="form-control form-control-sm text-center"
                                                style="height:30px;width:60px"><?php echo $row->quantity ?></buton>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1" style="font-family: sans-serif">
                                        <h5 class="mb-0"></span>Rs:<?php echo $row->price ?></h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end remove"
                                         id="remove<?= $row->product_variant_id ?>">
                                        <div class="remove-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path style="display: block; margin: auto;" d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                    <div class="card mb-4">
                        <div class="card-body p-4 d-flex flex-row">
                            <div class="form-outline flex-fill ">
                                <button class="btn btn-warning btn-block btn-lg text-center"
                                        style="height:50px;width:200px;margin-left: 0px;pointer-events: none;background-color:#f0f0f0;border:none">
                                    Subtotal
                                </button>

                            </div>
                            <button
                                    class="form-control form-control-sm text-center "
                                    style="height:50px;width:200px;pointer-events: none">Rs:<?php echo round($total, 2);  ?>
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="<?= PROOT ?>cart/items">
                                <button type="submit" class="btn btn-warning btn-block btn-lg text-center"
                                        style="height:50px;width:200px;margin-left: 8px">Proceed to Pay
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </>


<?php $this->end(); ?>