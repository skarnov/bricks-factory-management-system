<div class="right_col" role="main">
    <div class="row">
        <div class="btn-group btn-breadcrumb">
            <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
            <a href="<?php echo base_url(); ?>bricks/add_price" class="btn btn-info">Add Price</a>
            <a href="<?php echo base_url(); ?>bricks/manage_price" class="btn btn-success">Manage Price</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Price <small>Edit Bricks Price</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="<?php echo base_url(); ?>bricks/update_price" method="POST" class="form-horizontal form-label-left" novalidate>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="quality" value="<?php echo $price_info->quality; ?>" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0">
                                <input type="hidden" name="id" value="<?php echo $price_info->price_id; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Price <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="price" value="<?php echo $price_info->price; ?>" required="required" id="number" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="0">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Edit Price</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>