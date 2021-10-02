<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
        <!-- Bootstrap Progress Bar -->
        <link href="<?php echo base_url(); ?>asset/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>asset/css/custom.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo base_url(); ?>" class="site_title">
                                Bricks Factory 
                            </a>
                        </div>
                        <div class="clearfix"></div>
                        <br />
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li>
                                        <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-square"></i> Admin Manager <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url(); ?>bricks/add_admin">Add New Admin</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_admin">Manage Admins</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-shopping-cart"></i> Bricks Management <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url(); ?>bricks/add_price">Add New Bricks</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_price">Manage Bricks</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-book"></i> Cashbook <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url(); ?>bricks/add_debit">Add New Debit</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_debit">Manage Debit</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/add_debit_category">Add Debit Category</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_debit_category">Manage Debit Categories</a></li>
                                            <hr/>
                                            <li><a href="<?php echo base_url(); ?>bricks/add_credit">Add New Credit</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_credit">Manage Credit</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/add_credit_category">Add Credit Category</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_credit_category">Manage Credit Categories</a></li>
                                            <hr/>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_cashbook">Manage Cashbook</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-male"></i> Contractor Manager <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url(); ?>bricks/add_contractor_category">Add New Category</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_contractor_category">Manage Categories</a></li>
                                            <hr/>
                                            <li><a href="<?php echo base_url(); ?>bricks/add_contractor">Add New Contractor</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_contractor">Manage Contractors</a></li>
                                            <hr/>
                                            <li><a href="<?php echo base_url(); ?>bricks/add_contractor_transaction">New Transaction</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_contractor_transaction">Manage Transactions</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-windows"></i> Customer Manager <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_customer">Manage Customers</a></li>
                                            <hr/>
                                            <li><a href="<?php echo base_url(); ?>bricks/add_customer_transaction">New Transaction</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_customer_transaction">Manage Transactions</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-calculator"></i> Sales Management <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url(); ?>bricks/old_sale">Old Sale</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/add_sale">New Sale</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_sale">Manage Sales</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-university"></i> HR Management <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url(); ?>bricks/add_employee">New Employee</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_employee">Manage Employees</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-credit-card-alt"></i> Salary Management <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url(); ?>bricks/add_salary">New Salary</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/manage_salary">Manage Salaries</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-industry"></i> Total Report <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url(); ?>bricks/credit_report">Credit Report</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/debit_report">Debit Report</a></li>
                                            <li><a href="<?php echo base_url(); ?>bricks/cashbook_report">Cashbook Report</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-barcode"></i> About</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Top Navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Admin
                                        <span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> Profile</a></li>
                                        <li>
                                            <a href="javascript:;">
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li><a href="javascript:;">Help</a></li>
                                        <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>bricks/old_sale" class="btn btn-danger" aria-expanded="false">
                                        Old Sale
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>bricks/add_sale" class="btn btn-success" aria-expanded="false">
                                        New Sale
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Top Navigation -->
                <!-- Page Content -->
                <?php echo $dashboard; ?>
                <!-- Page Content -->
                <!-- Footer Content -->
                <footer>
                    <div class="pull-right">
                        &copy; Lights Communication
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- Footer Content -->
            </div>
        </div>

        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
        <!-- Custom JS -->
        <script src="<?php echo base_url(); ?>asset/js/custom.min.js"></script>
        <!-- Validator -->
        <script src="<?php echo base_url(); ?>asset/js/validator.min.js"></script>
        <script>
            // Start Validator
            validator.message.date = 'not a real date';
            $('form')
                    .on('blur', 'input[required], input.optional, select.required', validator.checkField)
                    .on('change', 'select.required', validator.checkField)
                    .on('keypress', 'input[required][pattern]', validator.keypress);
            $('.multi.required').on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });
            $('form').submit(function (e) {
                e.preventDefault();
                var submit = true;
                if (!validator.checkAll($(this))) {
                    submit = false;
                }
                if (submit)
                    this.submit();
                return false;
            });
        </script>

        <script>
            function check_delete()
            {
                var chk = confirm('Are You Want To Delete This');
                if (chk)
                {
                    return true;
                } else
                {
                    return false;
                }
            }
        </script>
    </body>
</html>