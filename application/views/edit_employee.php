<div class="right_col" role="main">
    <div class="row">
        <div class="btn-group btn-breadcrumb">
            <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
            <a href="<?php echo base_url(); ?>bricks/add_employee" class="btn btn-info">Add Employee</a>
            <a href="<?php echo base_url(); ?>bricks/manage_employee" class="btn btn-success">Manage Employee</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Employee <small>Update Employee Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form name="employee" action="<?php echo base_url(); ?>bricks/update_employee" method="POST" class="form-horizontal form-label-left" novalidate>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Type <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="radio">
                                    <label><input type="radio" name="employee_type" value="1">Contractual</label>
                                    <label><input type="radio" name="employee_type" value="2">Permanent</label>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" value="<?php echo $employee_info->employee_name; ?>" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1">
                                <input type="hidden" name="id" value="<?php echo $employee_info->employee_id; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="address" required="required" class="form-control col-md-7 col-xs-12" id="textarea" style="margin: 0px; width: 465px; height: 54px; resize: none;"><?php echo $employee_info->employee_address; ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Mobile Number <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="mobile" value="<?php echo $employee_info->employee_mobile; ?>" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="11">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NID <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="nid" value="<?php echo $employee_info->employee_nid; ?>" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="11">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Salary Amount <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="salary" value="<?php echo $employee_info->employee_salary; ?>" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="1">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Edit Employee</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['employee'].elements['employee_type'].value = '<?php echo $employee_info->employee_type; ?>';
</script>