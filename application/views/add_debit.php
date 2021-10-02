<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/add_debit" class="btn btn-info">Add Debit</a>
                <a href="<?php echo base_url(); ?>bricks/manage_debit" class="btn btn-success">Manage Debit</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add New Debit</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_debit');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_debit');
                    }
                    ?>
                </h3>
                <div class="x_content">
                    <form action="<?php echo base_url(); ?>bricks/save_debit" method="POST" class="form-horizontal form-label-left" novalidate>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="debit_category_name" class="form-control">
                                    <option>Choose Category</option>
                                    <?php foreach ($all_debit_category as $v_debit_category) { ?>
                                        <option value="<?php echo $v_debit_category->debit_category_name; ?>"><?php echo $v_debit_category->debit_category_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="balance" value="<?php echo $current_balance->cashbook_balance; ?>">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Paid Amount <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="paid" placeholder="Enter Paid Amount" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="1">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Transaction Time</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="time" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("F j, Y l") . date(' h:i A'); ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-danger">Execute</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>