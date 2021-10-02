<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/cashbook_report" class="btn btn-success">Search Cashbook Report</a>
                <a href="" class="btn btn-primary active">Total Cashbook</a>
            </div>    
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <?php
                if ($total_cashbook['0'] == NULL) {
                    ?>
                    <h1 style="color:red;">No Transaction Occur</h1>
                    <?php
                } else {
                    ?>
                    <div class="x_title">
                        <small><a href="<?php echo base_url(); ?>bricks/download_cashbook_report" class="btn btn-dark">Download PDF</a></small>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <a href="" class="btn btn-danger">Total Credit: <b><?php echo $total_credit->total; ?></b></a>
                            <a href="" class="btn btn-success">Total Debit: <b><?php echo $total_debit->total; ?></b></a>
                            <br/>
                            <br/>
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Description</th>
                                    <th>Transaction Time</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($total_cashbook as $v_cashbook) {
                                    ?>
                                    <tr>
                                        <td># <?php echo $v_cashbook->cashbook_id; ?></td>
                                        <td><?php echo $v_cashbook->cashbook_description; ?></td>
                                        <td><?php echo $v_cashbook->transaction_time; ?></td>
                                        <td><?php echo $v_cashbook->cashbook_debit; ?></td>
                                        <td><?php echo $v_cashbook->cashbook_credit; ?></td>
                                        <td><?php echo $v_cashbook->cashbook_balance; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>          
    </div>
</div>