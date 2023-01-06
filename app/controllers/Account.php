<?php

class Account extends Controller
{
    public Customer $CustomerModel;

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Customer');
    }

    public function signinAction()
    {
        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
            Router::redirect('');
        }

        $validation = new Validate();
        if ($_POST) {
            $validation->check($_POST, [
                'username' => [
                    'display' => 'Username',
                    'required' => true,
                    'min' => 6,
                    'max' => 150,
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6,
                    'max' => 150,
                ]
            ]);
            if ($validation->passed()) {
                $user = $this->CustomerModel->findByUsername($_POST['username']);

                if ($user->username) {
                    if (password_verify(Input::get('password'), $user->password)) {
                        $remember = isset($_POST['rememberMe']) && Input::get('rememberMe');
                        $user->setId($user->customer_id);
                        $user->signin($remember);

                        Router::redirect('');
                    } else {
                        $validation->addError("Invalid password.");
                    }
                } else {
                    $validation->addError("Invalid username.");
                }

            }
        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->setLayout('account');
        $this->view->render('account/signin');
    }

    public function signupAction()
    {
        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
            Router::redirect('');
        }

        $validation = new Validate();

        if ($_POST) {
            $validation->check($_POST, [
                'first_name' => [
                    'display' => 'First Name',
                    'required' => true,
                    'min' => 2,
                    'max' => 50,
                ],
                'last_name' => [
                    'display' => 'Last Name',
                    'required' => true,
                    'min' => 2,
                    'max' => 50,
                ],
                'username' => [
                    'display' => 'Username',
                    'required' => true,
                    'unique' => 'customer',
                    'min' => 6,
                    'max' => 150
                ],
                'email' => [
                    'display' => 'Email',
                    'required' => true,
                    'unique' => 'customer',
                    'max' => 150,
                    'valid_email' => true
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6
                ]
            ]);
            if ($validation->passed()) {
                $db = DB::getInstance();

                $db->insert('customer', [
                    'first_name' => Input::get('first_name'),
                    'last_name' => Input::get('last_name'),
                    'username' => Input::get('username'),
                    'email' => Input::get('email'),
                    'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT),
                    'account_created_date' => date('Y-m-d H:i:s')
                ]);
                Router::redirect('account/signin');
            }
        }

        $this->view->displayErrors = $validation->displayErrors();
        $this->view->setLayout('account');
        $this->view->render('account/signup');
    }

    public function signoutAction()
    {
        if (Customer::currentLoggedInUser()) {
            Customer::currentLoggedInUser()->logout();
        }

        Router::redirect('');
    }
}