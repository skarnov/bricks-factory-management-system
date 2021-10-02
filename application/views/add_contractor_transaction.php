<script>
    function calculating()
    {
        var net = document.getElementById('net').value;
        var paid = document.getElementById('paid').value;
        var pDue = document.getElementById('pDue').value;
        document.getElementById('tDue').value = (pDue * 1) + (net * 1) - (paid * 1);
        document.getElementById('due_amount').value = (pDue * 1) + (net * 1) - (paid * 1);
    }

    function getState(val)
    {
        if (val !== 'null')
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>bricks/contractor_due/' + val,
                success: function (data) {
                    $("#dueAmount").html(data);
                }
            });
        }
    }
</script>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/add_contractor_transaction" class="btn btn-info">New Contractor Transaction</a>
                <a href="<?php echo base_url(); ?>bricks/manage_contractor_transaction" class="btn btn-success">Manage Contractor Transaction</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add New Transaction <small>Create New Contractor Transaction</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_contractor_transaction');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_contractor_transaction');
                    }
                    ?>
                </h3>
                <div class="x_content">
                    <form action="<?php echo base_url(); ?>bricks/save_contractor_transaction" method="POST" class="form-horizontal form-label-left" novalidate>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Contractor</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="contractor_id" id="contractor_id" onmouseout="getState(this.value);" class="form-control">
                                            <option value="null">Choose Contractor</option>
                                            <?php foreach ($all_contractor as $v_contractor) { ?>
                                                <option value="<?php echo $v_contractor->contractor_id; ?>"><?php echo $v_contractor->contractor_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Net Amount</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" name="net" id="net" onkeyup="calculating();" placeholder="Enter The Net Amount" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Paid Amount <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" name="paid" id="paid" onkeyup="calculating();" placeholder="Enter Current Paid Amount" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="1">
                                    </div>
                                </div>
                                <input type="hidden" name="balance" value="<?php echo $current_balance->cashbook_balance; ?>">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Transaction Time</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="time" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("F j, Y l") . date(' h:i A'); ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>   
                            </div>        
                            <div class="col-md-5">
                                <div class="item form-group">
                                    <label class="control-label col-md-5 col-sm-3 col-xs-12">Previous Due Amount</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12" id="dueAmount">
                                        <input type="text" disabled="disabled" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-5 col-sm-3 col-xs-12">Total Due Amount</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" id="tDue" disabled="disabled" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" id="due_amount" name="due_amount">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Execute</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>