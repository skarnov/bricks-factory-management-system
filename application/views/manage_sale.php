<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/add_sale" class="btn btn-info">Add Sale</a>
                <a href="<?php echo base_url(); ?>bricks/manage_sale" class="btn btn-success">Manage Sale</a>
                <a href="<?php echo base_url(); ?>bricks/old_sale" class="btn btn-danger">Old Sale</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sale Manager <small>Sale Management</small></h2>
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
                                <th>ID</th>
                                <th>Invoice No</th>
                                <th>Customer Name</th>
                                <th>Mobile Number</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Total</th>
                                <th>Discount</th>
                                <th>Due</th>
                                <th>Paid Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_sale as $v_sale) {
                                ?>
                                <tr>
                                    <td># <?php echo $v_sale->sale_id; ?></td>
                                    <td><?php echo $v_sale->ref_no; ?></td>
                                    <td><?php echo $v_sale->customer_name; ?></td>
                                    <td><?php echo $v_sale->customer_mobile; ?></td>
                                    <td><?php echo $v_sale->quantity; ?></td>
                                    <td><?php echo $v_sale->bricks_name; ?></td>
                                    <td><?php echo $v_sale->net_price + $v_sale->discount; ?></td>
                                    <td><?php echo $v_sale->discount; ?></td>
                                    <td><?php echo $v_sale->due; ?></td>
                                    <td><?php echo $v_sale->paid; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>bricks/sale_detail/<?php echo $v_sale->sale_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Print Invoice And Gate Pass"><i class="fa fa-calculator"></i> Print</a>
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