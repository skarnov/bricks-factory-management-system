<div class="right_col" role="main">
    <div class="row">
        <div class="btn-group btn-breadcrumb">
            <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
            <a href="<?php echo base_url(); ?>bricks/add_contractor" class="btn btn-info">Add Contractor</a>
            <a href="<?php echo base_url(); ?>bricks/manage_contractor" class="btn btn-success">Manage Contractor</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Contractor</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form name="contractor" action="<?php echo base_url(); ?>bricks/update_contractor" method="POST" class="form-horizontal form-label-left" novalidate>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Contractor</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="contractor_category_id" class="form-control">
                                    <option>Choose Contractor</option>
                                    <?php foreach ($all_contractor_category as $v_contractor_category) { ?>
                                        <option value="<?php echo $v_contractor_category->contractor_category_id; ?>"><?php echo $v_contractor_category->contractor_category_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" value="<?php echo $contractor_info->contractor_name; ?>" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1">
                                <input type="hidden" name="id" value="<?php echo $contractor_info->contractor_id; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="address" required="required" class="form-control col-md-7 col-xs-12" id="textarea" style="margin: 0px; width: 465px; height: 54px; resize: none;"><?php echo $contractor_info->contractor_address; ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Mobile Number <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="mobile" value="<?php echo $contractor_info->contractor_mobile; ?>" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="11">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Number of Labor <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="quantity" value="<?php echo $contractor_info->number_of_labor; ?>" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="1">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Edit Contractor</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['contractor'].elements['contractor_category_id'].value = '<?php echo $v_contractor_category->contractor_category_id; ?>';
</script>