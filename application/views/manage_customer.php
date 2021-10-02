<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/manage_customer" class="btn btn-success">Manage Customer</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Customer Manager <small>Customer Management</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th style="color:red;">Due Amount</th>
                                <th>Due Bricks</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_customer as $v_customer) {
                                ?>
                                <tr>
                                    <td><?php echo $v_customer->customer_name; ?></td>
                                    <td style="color:red;"><?php echo $v_customer->due_amount; ?></td>
                                    <td><?php echo $v_customer->due_bricks; ?></td>
                                    <td><?php echo $v_customer->customer_address; ?></td>
                                    <td><?php echo $v_customer->customer_mobile; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>bricks/all_customer_transaction/<?php echo $v_customer->customer_id; ?>" class="btn btn-warning" data-toggle="tooltip" title="View This Customer Transaction"><i class="fa fa-calculator"></i> Transactions</a>
                                        <a href="<?php echo base_url(); ?>bricks/all_customer_sales/<?php echo $v_customer->customer_id; ?>" class="btn btn-dark" data-toggle="tooltip" title="View This Customer Total Sales"><i class="fa fa-shopping-cart"></i> Sales</a>
                                        <a href="<?php echo base_url(); ?>bricks/edit_customer/<?php echo $v_customer->customer_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Customer"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>bricks/delete_customer/<?php echo $v_customer->customer_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Customer" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>          
    </div>
</div>