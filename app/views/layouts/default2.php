<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->siteTitle(); ?></title>

    <?= $this->content('head'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel='stylesheet' href="<?= PROOT ?>css/custom.css?v=<?php echo time(); ?>" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">E-Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= PROOT ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                            $home = new Home('Home', '');
                            $details = [];
                            $categoryItems = $home->CategoryModel->find();
                            foreach ($categoryItems as $value) {
                                $categoryId = $value->category_id;
                                $categoryName = $value->category_name;
                                $subCategoryItems = $home->SubCategoryModel->getSubCategories($categoryId);
                                $details[$categoryId] = [$categoryName, $subCategoryItems];
                            }
                            foreach ($details as $key => $value) { ?>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#"><?= $value[0] ?><br></a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($value[1] as $id => $val) { ?>
                                            <div class="sub1">
                                                <a class="dropdown-item sub" href=<?= PROOT . "Home/productDisplay/" . $val->sub_category_id ?>>
                                                    <?= $val->sub_category_name ?><br>
                                                </a>
                                            </div>

                                        <?php } ?>
                                    </ul>
                                </li><?php
                                    } ?>
                        </ul>
                    </li>

                    <li class="form-action">
                        <div>
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search for Products" aria-label="Search">
                                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn" href="#" role="button">
                            <span class="material-icon"><i class="fa-solid fa-cart-shopping"></i></span>
                            <span class="icon-button__badge">3</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Name
                        </a>
                        <div class="dropdown-menu list" aria-labelledby="navbarDropdown">
                            <a class="dropdown_item sub" href=<?= PROOT . "Account/signout" ?>>
                                Sign Out<br>
                            </a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>

    </div>


    <?= $this->content('body') ?>
</body>

</html>