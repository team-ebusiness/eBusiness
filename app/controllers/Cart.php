<?php

class Cart extends Controller {
    private array $pageRestrict = [
        'checkout' => false,
        'payment' => false,
        'successful' => false
    ];
    // S_PATH/e_business/cart
    // constructor
    // cart/items : img,name, price, quantity, subtotal
    // cart/checkout : name, quantity, subtotal
    // cart/payment : [optional]
    // cart/successful  :placed

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
    }

    public function itemsAction()
    {
        if ($_POST) {
            $this->pageRestrict['checkout'] = true;
            Router::redirect('cart/checkout');
        }

        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
            $db = Db::getInstance();
            $results = $db->call_procedure('view_cart', [Customer::currentLoggedInUser()->customer_id]);

            // TODO: implement the functionality to generate the html for the cart items
//            $this->view->itemsToDisplay['cart/items'] = $results;
        } else {
            Router::redirect('account/signin');
        }

        $this->view->setLayout('default');
        $this->view->render('cart/items');
    }

    public function checkoutAction()
    {
        if ($_POST) {
            $this->pageRestrict['payment'] = true;
            Router::redirect('cart/payment');
        }

        if (!$this->pageRestrict['checkout']) {
            header("HTTP/1.1 403 Unauthorized");
            exit;
        }
        // TODO: implement the functionality to generate the html for the checkout page

        $this->view->setLayout('default');
        $this->view->render('cart/checkout');
    }

    public function paymentAction()
    {
        if ($_POST) {
            $this->pageRestrict['successful'] = true;
            Router::redirect('cart/successful');
        }

        if (!$this->pageRestrict['payment']) {
            header("HTTP/1.1 403 Unauthorized");
            exit;
        }

        $this->view->setLayout('default');
        $this->view->render('cart/payment');
    }

    public function successfulAction()
    {
        if (!$this->pageRestrict['successful']) {
            header("HTTP/1.1 403 Unauthorized");
            exit;
        }

        foreach ($this->pageRestrict as $key => $value) {
            $this->pageRestrict[$key] = false;
        }

        $this->view->setLayout('default');
        $this->view->render('cart/successful');
        header("Refresh:5; url=" . PROOT . "home/index");
    }
}