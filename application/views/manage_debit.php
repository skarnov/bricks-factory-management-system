<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/add_debit" class="btn btn-info">Add New Debit</a>
                <a href="<?php echo base_url(); ?>bricks/manage_debit" class="btn btn-dark">Total Debit</a>
                <a href="<?php echo base_url(); ?>bricks/add_credit" class="btn btn-danger">Add New Credit</a>
                <a href="<?php echo base_url(); ?>bricks/manage_credit" class="btn btn-primary">Total Credit</a>
                <a href="<?php echo base_url(); ?>bricks/manage_cashbook" class="btn btn-success">Manage Cashbook</a>
            </div>    
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Total Debit <small>Total Debit History. You can view and download debit report in the Total Report section</small></h2>
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
                                <th>Transaction ID</th>
                                <th>Description</th>
                                <th>Transaction Time</th>
                                <th>Debit</th>
                                <th>Debit Receivable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_debit as $v_debit) {
                                ?>
                                <tr>
                                    <td> # <?php echo $v_debit->cashbook_id; ?></td>
                                    <td><?php echo $v_debit->cashbook_description; ?></td>
                                    <td><?php echo $v_debit->transaction_time; ?></td>
                                    <td><?php echo $v_debit->cashbook_debit; ?></td>
                                    <td><?php echo $v_debit->cashbook_debit_receivable; ?></td>
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