<script>
    function calculating()
    {
        var unitPrice = document.getElementById('unitPrice').value;
        var quantity = document.getElementById('quantity').value;
        var discount = document.getElementById('discount').value;
        document.getElementById('totalPrice').value = (unitPrice * 1) * (quantity * 1) - (discount * 1);

        var totalPrice = document.getElementById('totalPrice').value;
        var paidAmount = document.getElementById('paidAmount').value;
        document.getElementById('dueAmount').value = (totalPrice * 1) - (paidAmount * 1);
        document.getElementById('totalDueAmount').value = (totalPrice * 1) - (paidAmount * 1);

        var provideBricks = document.getElementById('provideBricks').value;
        document.getElementById('dueBricks').value = (quantity * 1) - (provideBricks * 1);
        document.getElementById('totalDueBricks').value = (quantity * 1) - (provideBricks * 1);
    }

    function bricksPrice(val)
    {
        if (val !== 'null')
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>bricks/select_bricks_price/' + val,
                success: function (data) {
                    $("#priceAmount").html(data);
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
                <a href="<?php echo base_url(); ?>bricks/add_sale" class="btn btn-info">Add New Sale</a>
                <a href="<?php echo base_url(); ?>bricks/manage_sale" class="btn btn-success">Manage Sales</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add New Sale</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="<?php echo base_url(); ?>bricks/save_sale" method="POST" class="form-horizontal form-label-left" novalidate>
                        <input type="hidden" name="balance" value="<?php echo $current_balance->cashbook_balance; ?>">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ref No <span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="text" name="ref_no" onchange="searchRef(this.value);" value="<?php echo $last_customer->customer_id+'1'. $last_sale->sale_id+'1' . date_default_timezone_set("Asia/Dhaka"). date("dmy"); ?>" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="text" name="name" placeholder="Enter Customer Full Name" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                        <textarea name="address" required="required" class="form-control col-md-3 col-xs-12" id="textarea" style="margin: 0px; width: 398px; height: 54px; resize: none;"></textarea>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Mobile Number <span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="number" name="mobile" placeholder="Enter Customer Mobile Number" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="11">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Vehicle NO <span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="text" name="vehicle_no" placeholder="Enter Vehicle NO" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0">
                                    </div>
                                </div>
                                <input type="hidden" name="time" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("F j, Y l") . date(' h:i A'); ?>">
                            </div>
                            <div class="col-md-5">
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Select Bricks <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="bricks_name" onmouseout="bricksPrice(this.value);" class="form-control">
                                            <option value="null">Choose Bricks</option>
                                            <?php foreach ($all_bricks as $v_bricks) { ?>
                                                <option value="<?php echo $v_bricks->quality . ' [ ' . $v_bricks->price . ' BDT ] '; ?>"><?php echo $v_bricks->quality . ' [ ' . $v_bricks->price . ' BDT ] '; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="priceAmount"></div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Bricks Quantity </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="number" id="quantity" onkeyup="calculating();" placeholder="Enter Bricks Quantity" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Total Price <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="number" name="total_price" id="totalPrice" onkeyup="calculating();" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Discount</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="number" name="discount" id="discount" onkeyup="calculating();" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Note</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="note" placeholder="Enter Discount Note" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Due Bricks</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="dueBricks" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" name="due_bricks" id="totalDueBricks">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="number">Provide Bricks <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="number" name="quantity" id="provideBricks" onkeyup="calculating();" placeholder="Enter Provide Bricks" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="number">Paid Amount <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="paid_amount" id="paidAmount" onkeyup="calculating();" placeholder="Enter Paid Amount" required="required" id="number" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0" style="background-color: black; color: white;">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="number">Due Amount</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="dueAmount" class="form-control col-md-7 col-xs-12" style="background-color: red; color: white;">
                                        <input type="hidden" name="due_amount" id="totalDueAmount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Done</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>