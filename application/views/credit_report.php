<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/credit_report" class="btn btn-success">Credit Report</a>
            </div>    
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form action="<?php echo base_url(); ?>bricks/search_credit_report" method="POST" class="form-horizontal form-label-left" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">From Date</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="from" value="<?php echo date("F j, Y 12:00 A", strtotime('yesterday')); ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">To Date</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="to" value="<?php echo date("F j, Y 12:00 A", strtotime('tomorrow')); ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-danger">See Credit Report</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>          
    </div>
</div>