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
    function searchRef(val)
    {
        if (val !== 'null')
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>bricks/search_ref/' + val,
                success: function (data) {
                    $("#dueInvoice").html(data);
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
                    <h2>Old Sale</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_sale');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_sale');
                    }
                    ?>
                </h3>
                <div class="x_content">
                    <form action="<?php echo base_url(); ?>bricks/save_old_sale" method="POST" class="form-horizontal form-label-left" novalidate>
                        <input type="hidden" name="balance" value="<?php echo $current_balance->cashbook_balance; ?>">
                        <div class="row" id="dueInvoice">
                            <div class="col-md-7">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ref No <span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="text" name="ref_no" onkeyup="searchRef(this.value);" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>