<?php $this->setSiteTitle('Sign Up'); ?>

<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>
    <div id="signUpPage">
        <div class="modal modal-signin position-static d-block  py-5" tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h1 class="fw-bold mb-0 fs-2">Sign up</h1>
                    </div>

                    <div class="modal-body p-5 pt-0">
                        <form class="" action="<?= PROOT ?>account/signup" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="form-floating mb-3 col" style="padding-left: 0">
                                        <input type="text" class="form-control" id="first_name" placeholder="First name"
                                               name="first_name">
                                        <label for="first_name">First Name</label>
                                    </div>
                                    <div class="form-floating mb-3 col" style="padding-left: 0; padding-right: 0;">
                                        <input type="text" class="form-control" id="last_name" placeholder="Last name"
                                               name="last_name">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="username" name="username"
                                       placeholder="Username">
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-3" id="floatingInput"
                                       placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-3" id="floatingPassword"
                                       placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div><?=$this->displayErrors?></div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign up</button>
                            <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->end(); ?>