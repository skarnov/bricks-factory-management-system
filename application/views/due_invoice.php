<?php
if ($due_invoice == NULL) {
    ?>
    <h1 style="color:red">Not Found</h1>
    <a href="<?php echo base_url(); ?>bricks/old_sale" class="btn btn-danger">Try Again</a>
    <?php
} else {
    ?>
    <script>
        function calculating()
        {
            var dueAmount = document.getElementById('dueAmount').value;
            var newPaidAmount = document.getElementById('newPaidAmount').value;
            document.getElementById('currentDueAmount').value = (dueAmount * 1) - (newPaidAmount * 1);
            var preDueBricks = document.getElementById('preDueBricks').value;
            var preProvideBricks = document.getElementById('preProvideBricks').value;
            var totalBricks = (preDueBricks * 1) + (preProvideBricks * 1);
            var preProvideBricks = document.getElementById('preProvideBricks').value;
            var newProvidedBricks = document.getElementById('newProvidedBricks').value;
            document.getElementById('newDueBricks').value = (totalBricks * 1) - (preProvideBricks * 1) - (newProvidedBricks * 1);
        }
    </script>
    <div class="col-md-7">
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ref No <span class="required">*</span></label>
            <div class="col-md-9 col-sm-6 col-xs-12">
                <input type="text" name="ref_no" onchange="searchRef(this.value);" value="<?php echo $due_invoice->ref_no; ?>" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
            <div class="col-md-9 col-sm-6 col-xs-12">
                <input type="text" name="name" value="<?php echo $due_invoice->customer_name; ?>" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1">
                <input type="hidden" name="customer_id" value="<?php echo $due_invoice->customer_id; ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span></label>
            <div class="col-md-9 col-sm-6 col-xs-12">
                <textarea name="address" required="required" class="form-control col-md-3 col-xs-12" id="textarea" style="margin: 0px; width: 398px; height: 54px; resize: none;"><?php echo $due_invoice->customer_address; ?></textarea>
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Mobile Number <span class="required">*</span></label>
            <div class="col-md-9 col-sm-6 col-xs-12">
                <input type="number" name="mobile" value="<?php echo $due_invoice->customer_mobile; ?>" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="11">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bricks Name</label>
            <div class="col-md-9 col-sm-6 col-xs-12">
                <input type="text" name="bricks_name" value="<?php echo $due_invoice->bricks_name; ?>" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Vehicle NO <span class="required">*</span></label>
            <div class="col-md-9 col-sm-6 col-xs-12">
                <input type="text" name="vehicle_no" value="<?php echo $due_invoice->vehicle_no; ?>" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Time <span class="required">*</span></label>
            <div class="col-md-9 col-sm-6 col-xs-12">
                <input type="text" name="time" value="<?php date_default_timezone_set("Asia/Dhaka");
    echo date("F j, Y l") . date(' h:i A'); ?>" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0">
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Total Price </label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="number" id="netPrice" name="total_price" value="<?php echo $due_invoice->net_price; ?>" onkeyup="calculating();" required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Discount</label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="number" name="discount" value="<?php echo $due_invoice->discount; ?>" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Note</label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="text" name="note" value="<?php echo $due_invoice->note; ?>" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Due Bricks</label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="text" id="preDueBricks" value="<?php echo $due_invoice->due_bricks; ?>" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="number">Provide Bricks <span class="required">*</span></label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="number" id="preProvideBricks" onkeyup="calculating();" value="<?php echo $due_invoice->quantity; ?>" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Last Paid Amount</label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="text" value="<?php echo $due_invoice->paid; ?>" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="number">Due Amount</label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="text" id="dueAmount" onkeyup="calculating();" value="<?php echo $due_invoice->due; ?>" class="form-control col-md-7 col-xs-12" style="background-color: lime; color: black;">
            </div>
        </div>
        <hr/>
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">New Paid <span class="required">*</span></label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="text" name="paid_amount" id="newPaidAmount" onkeyup="calculating();" required="required" class="form-control col-md-7 col-xs-12" style="background-color: black; color: white;">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Total Due</label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="text" name="due_amount" id="currentDueAmount" class="form-control col-md-7 col-xs-12" style="background-color: red; color: white;">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Provided Bricks<span class="required">*</span></label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="text" name="quantity" id="newProvidedBricks" onkeyup="calculating();" required="required" class="form-control col-md-7 col-xs-12" style="background-color: black; color: white;">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Due Bricks</label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="text" name="due_bricks" value="<?php echo $due_invoice->due_bricks; ?>" id="newDueBricks" class="form-control col-md-7 col-xs-12" style="background-color: red; color: white;">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary">Cancel</button>
            <button id="send" type="submit" class="btn btn-success">Done</button>
        </div>
    </div>
    <?php
}
?>